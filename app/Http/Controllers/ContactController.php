<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validate inputs
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'company' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
            'budget' => 'required|string',
            'retainer' => 'required|string',
        ]);

        // Build email content
        $emailBody = "New Contact Inquiry\n";
        $emailBody .= "==================\n\n";
        $emailBody .= "Name: {$validated['name']}\n";
        $emailBody .= "Email: {$validated['email']}\n";
        $emailBody .= "Company: {$validated['company']}\n";
        
        if (!empty($validated['phone'])) {
            $emailBody .= "Phone: {$validated['phone']}\n";
        }
        
        $emailBody .= "Budget: {$validated['budget']}\n";
        $emailBody .= "Retainer: {$validated['retainer']}\n";
        $emailBody .= "\nProject Description:\n";
        $emailBody .= "{$validated['message']}\n";

        // Send email to your configured email address
        Mail::raw($emailBody, function ($message) use ($validated) {
            $message->to(config('mail.from.address'))
                ->replyTo($validated['email'])
                ->subject('New Inquiry from ' . $validated['name']);
        });

        return back()->with('success', 'Your inquiry has been sent! We\'ll get back to you shortly.');
    }
}
