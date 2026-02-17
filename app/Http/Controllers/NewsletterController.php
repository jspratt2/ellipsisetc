<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        $email = strtolower(trim($data['email']));

        $store   = config('services.shopify.store_domain');     // e.g. ellipsis-etcetera.myshopify.com
        $token   = config('services.shopify.admin_access_token'); // shpat_...
        $version = config('services.shopify.api_version', '2025-01');

        if (!$store || !$token) {
            Log::error('Shopify newsletter subscribe missing config', [
                'store_domain_present' => (bool) $store,
                'token_present' => (bool) $token,
            ]);

            return back()
                ->withErrors(['email' => 'Newsletter is not configured yet. Please try again later.'])
                ->withInput();
        }

        $base = "https://{$store}/admin/api/{$version}";

        try {
            // 1) Search customer by email
            $search = Http::withHeaders([
                'X-Shopify-Access-Token' => $token,
                'Accept' => 'application/json',
            ])->get("{$base}/customers/search.json", [
                'query' => "email:{$email}",
                'limit' => 1,
            ]);

            if (!$search->successful()) {
                Log::error('Shopify customer search failed', [
                    'status' => $search->status(),
                    'body'   => $search->body(),
                ]);

                return back()
                    ->withErrors(['email' => 'Subscription failed. Please try again in a moment.'])
                    ->withInput();
            }

            $customers = $search->json('customers') ?? [];
            $existing  = $customers[0] ?? null;

            if ($existing) {
                // 2a) Update existing customer to be subscribed
                $customerId = $existing['id'];

                // Merge tags safely
                $existingTags = array_filter(array_map('trim', explode(',', (string)($existing['tags'] ?? ''))));
                $tagSet = array_unique(array_merge($existingTags, ['newsletter']));
                $tags = implode(', ', $tagSet);

                $update = Http::withHeaders([
                    'X-Shopify-Access-Token' => $token,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])->put("{$base}/customers/{$customerId}.json", [
                    'customer' => [
                        'id' => $customerId,
                        // Keep both for compatibility across Shopify changes:
                        'accepts_marketing' => true,
                        'email_marketing_consent' => [
                            'state' => 'subscribed',
                            'opt_in_level' => 'single_opt_in',
                        ],
                        'tags' => $tags,
                    ],
                ]);

                if ($update->successful()) {
                    return back()->with('success', 'You’re subscribed. Welcome!');
                }

                Log::error('Shopify customer update failed', [
                    'status' => $update->status(),
                    'body'   => $update->body(),
                ]);

                return back()
                    ->withErrors(['email' => 'Subscription failed. Please try again in a moment.'])
                    ->withInput();
            }

            // 2b) Create new customer as subscribed
            $create = Http::withHeaders([
                'X-Shopify-Access-Token' => $token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post("{$base}/customers.json", [
                'customer' => [
                    'email' => $email,
                    'accepts_marketing' => true,
                    'email_marketing_consent' => [
                        'state' => 'subscribed',
                        'opt_in_level' => 'single_opt_in',
                    ],
                    'tags' => 'newsletter',
                ],
            ]);

            if ($create->successful()) {
                return back()->with('success', 'You’re subscribed. Welcome!');
            }

            Log::error('Shopify customer create failed', [
                'status' => $create->status(),
                'body'   => $create->body(),
            ]);

            return back()
                ->withErrors(['email' => 'Subscription failed. Please try again in a moment.'])
                ->withInput();
        } catch (\Throwable $e) {
            Log::error('Shopify newsletter subscribe exception', [
                'error' => $e->getMessage(),
            ]);

            return back()
                ->withErrors(['email' => 'Subscription failed (server error). Please try again.'])
                ->withInput();
        }
    }
}
