<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    /**
     * Handle a newsletter subscription.
     */
    public function subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email:rfc,dns|max:255',
            'name'  => 'nullable|string|max:120',
        ]);

        // ---- Mailchimp subscribe (recommended) ----
        $apiKey     = config('services.mailchimp.key');
        $audienceId = config('services.mailchimp.audience');
        $dc         = config('services.mailchimp.dc');

        if (!$apiKey || !$audienceId || !$dc) {
            // If you prefer to hard-fail, replace with: abort(500, 'Mailchimp not configured');
            Log::warning('Mailchimp missing configuration.');
        } else {
            $email = strtolower($data['email']);
            $subscriberHash = md5($email);

            // Split name into FNAME/LNAME (optional)
            $fullName = trim($data['name'] ?? '');
            [$firstName, $lastName] = $this->splitName($fullName);

            $url = "https://{$dc}.api.mailchimp.com/3.0/lists/{$audienceId}/members/{$subscriberHash}";

            // Choose one:
            // - 'pending' = double opt-in (user must confirm email)
            // - 'subscribed' = instant subscribe (no confirmation)
            $status = 'subscribed';

            $response = Http::withBasicAuth('anystring', $apiKey)
                ->timeout(10)
                ->put($url, [
                    'email_address' => $email,
                    'status_if_new' => $status,
                    'status'        => $status,
                    'merge_fields'  => [
                        'FNAME' => $firstName,
                        'LNAME' => $lastName,
                    ],
                ]);

            if ($response->failed()) {
                Log::warning('Mailchimp subscribe failed', [
                    'status' => $response->status(),
                    'body'   => $response->json(),
                ]);

                return back()
                    ->withErrors(['email' => 'Could not subscribe you right now. Please try again.'])
                    ->withInput();
            }
        }

        // ---- Your existing email notification (optional) ----
        $body = "Newsletter Signup\n\n" .
            (!empty($data['name']) ? "Name: {$data['name']}\n" : '') .
            "Email: {$data['email']}\n";

        Mail::raw($body, function ($message) use ($data) {
            $to = config('mail.from.address');
            $message->to($to ?: 'hello@example.com')
                ->subject('Newsletter Signup')
                ->replyTo($data['email'], $data['name'] ?? null);
        });

        return back()->with('success', 'Thanks — check your email to confirm your subscription.');
    }

    private function splitName(string $fullName): array
    {
        $fullName = trim(preg_replace('/\s+/', ' ', $fullName));
        if ($fullName === '') return ['', ''];

        $parts = explode(' ', $fullName);
        $first = array_shift($parts);
        $last  = implode(' ', $parts);

        return [$first ?? '', $last ?? ''];
    }
}
