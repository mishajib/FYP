<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function contactUs(Request $request)
    {
        $request->validate([
            "email"   => "bail|required|string|email",
            "subject" => "bail|required|string",
            "message" => "bail|required|string",
        ]);
        $email   = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        Mail::to("admin@admin.com")->send(new Contact($email, $subject, $message));
        return back()->with('success', 'Your mail is sent successfully');
    }
}
