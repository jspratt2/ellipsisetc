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
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            // add name field later if you want
        ]);

        $email = strtolower(trim($data['email']));

        $listAddress = config('services.mailgun.list_address'); // we’ll add this in Step 6
        $endpoint = rtrim(config('services.mailgun.endpoint', 'https://api.mailgun.net'), '/');

        // Mailgun requires:
        // POST /v3/lists/{list_address}/members
        // Body: address, subscribed, upsert, (optional name/vars)
        // :contentReference[oaicite:4]{index=4}

        $url = "{$endpoint}/v3/lists/{$listAddress}/members";

        try {
            $response = Http::asForm()
                ->withBasicAuth('api', config('services.mailgun.secret'))
                ->post($url, [
                    'address'    => $email,
                    'subscribed' => true,
                    'upsert'     => true,
                ]);

            if ($response->successful()) {
                return back()->with('success', 'You’re subscribed. Welcome!');
            }

            // Helpful errors from Mailgun often come back in JSON
            Log::error('Mailgun list subscribe failed', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);

            return back()
                ->withErrors(['email' => 'Subscription failed. Please try again in a moment.'])
                ->withInput();
        } catch (\Throwable $e) {
            Log::error('Mailgun list subscribe exception', [
                'error' => $e->getMessage(),
            ]);

            return back()
                ->withErrors(['email' => 'Subscription failed (server error). Please try again.'])
                ->withInput();
        }
    }
}
