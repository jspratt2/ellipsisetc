<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    /**
     * Handle a newsletter subscription.
     */
    public function subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $name = $request->input('name');
        $body = "Newsletter Signup\n\n".
            (isset($name) && $name !== '' ? "Name: {$name}\n" : '') .
            "Email: {$data['email']}\n";

        // Send to the configured site email (MAIL_FROM_ADDRESS) and set reply-to
        Mail::raw($body, function ($message) use ($data, $name) {
            $to = config('mail.from.address');
            $message->to($to ?: 'hello@example.com')
                ->subject('Newsletter Signup')
                ->replyTo($data['email'], $name ?: null);
        });

        return back()->with('success', 'Thanks — you are subscribed.');
    }
}
