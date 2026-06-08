<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data =$request->validate([
            'sender_name' => 'required|max:255',
            'sender_email' => 'required|max:255',
            'sender_message' => 'required|max:5000',
        ]);
Mail::send([], [], function ($message) use ($data) {

    $message->to('GaGoAgency0@gmail.com')
        ->replyTo($data['sender_email'], $data['sender_name'])
        ->subject('New Contact Form Message')
        ->html("
           
    <div style='max-width:700px;margin:auto;background:#ffffff;border-radius:20px;overflow:hidden;border:1px solid #e2e8f0;'>

        <div style='background:#0f172a;padding:30px;text-align:center;'>
            <h1 style='margin:0;color:white;font-size:28px;'>
                GaGo Agency
            </h1>

            <p style='margin-top:8px;color:#cbd5e1;font-size:14px;'>
                New website inquiry
            </p>
        </div>

        <div style='padding:35px;'>

            <div style='margin-bottom:25px;'>
                <p style='font-size:12px;color:#64748b;text-transform:uppercase;margin-bottom:6px;'>
                    Client Name
                </p>

                <p style='font-size:18px;font-weight:600;color:#0f172a;margin:0;'>
                    {$data['sender_name']}
                </p>
            </div>

            <div style='margin-bottom:25px;'>
                <p style='font-size:12px;color:#64748b;text-transform:uppercase;margin-bottom:6px;'>
                    Email
                </p>

                <p style='font-size:16px;color:#0f172a;margin:0;'>
                    {$data['sender_email']}
                </p>
            </div>

            <div>
                <p style='font-size:12px;color:#64748b;text-transform:uppercase;margin-bottom:10px;'>
                    Message
                </p>

                <div style='background:#f8fafc;border:1px solid #e2e8f0;padding:20px;border-radius:14px;color:#334155;line-height:1.7;'>
                    {$data['sender_message']}
                </div>
            </div>

        </div>

        <div style='padding:20px 35px;background:#f8fafc;border-top:1px solid #e2e8f0;'>
            <p style='margin:0;color:#64748b;font-size:13px;'>
                Sent from the GaGo Agency website contact form.
            </p>
        </div>

    </div>
        ");
});
Mail::html("
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
</head>
<body style='margin:0;padding:0;background:#f6f4ef;font-family:Arial,sans-serif;'>

<table width='100%' cellpadding='0' cellspacing='0' style='padding:40px 0;background:#f6f4ef;'>
<tr>
<td align='center'>

<table width='600' cellpadding='0' cellspacing='0'
style='background:#ffffff;border-radius:16px;overflow:hidden;border:1px solid #e5e7eb;'>

<tr>
<td style='background:#0f172a;padding:24px;text-align:center;'>
<h1 style='margin:0;color:#ffffff;font-size:24px;'>
GaGo Agency
</h1>
</td>
</tr>

<tr>
<td style='padding:40px;'>

<h2 style='margin-top:0;color:#111827;'>
Hello {$data['sender_name']},
</h2>

<p style='color:#4b5563;line-height:1.7;'>
Thank you for contacting <strong>GaGo Agency</strong>.
</p>

<p style='color:#4b5563;line-height:1.7;'>
We have successfully received your message and will review it shortly.
</p>

<p style='color:#4b5563;line-height:1.7;'>
Our team usually responds within <strong>24 hours</strong>.
</p>

<div style='margin:30px 0;padding:20px;background:#f8fafc;border-left:4px solid #0f172a;border-radius:8px;'>
<p style='margin:0;color:#374151;'>
We appreciate your interest and look forward to speaking with you.
</p>
</div>

<p style='margin-top:40px;color:#111827;'>
Best regards,<br>
<strong>GaGo Agency</strong>
</p>

</td>
</tr>

<tr>
<td style='background:#f8fafc;padding:18px;text-align:center;font-size:12px;color:#6b7280;'>
© ".date('Y')." GaGo Agency. All rights reserved.
</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>
", function ($message) use ($data) {

    $message->to($data['sender_email'])
            ->subject('We received your message');
});

        return back()->with('success', 'Message sent successfully.');
    }
}