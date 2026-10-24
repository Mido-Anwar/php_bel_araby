<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * view contact form
     */
    public function index()
    {
        return view('public_pages.emails.contact-us');
    }

    /**
     * استقبال الرسالة وإرسالها.
     */
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
        ], [
            'name.required' => 'الاسم مطلوب.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'البريد الإلكتروني غير صحيح.',
            'subject.required' => 'الموضوع مطلوب.',
            'message.required' => 'الرسالة مطلوبة.',
            'message.min' => 'الرسالة قصيرة جدًا (10 أحرف على الأقل).',
        ]);

         Mail::to('contact@whiscrashow.com')->send(new ContactMail($validated));

        return back()->with('success-sending-message', 'تم إرسال رسالتك بنجاح. هنرد عليك في أقرب وقت.');
    }
}
