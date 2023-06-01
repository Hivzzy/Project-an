<?php

namespace App\Mail;

use App\Models\Payroll;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;

class HelloMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $payroll;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $subject, Payroll $payroll, String $periode)
    {
        $this->subject = $subject;
        $this->payroll = $payroll;
        $this->periode = $periode;
        // dd($this->payroll);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.hello',
            with: [$this->payroll, $this->periode],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        $file = public_path('file_payroll/PAYROLL 10 JAN 23 -  09 FEB 23 - Copy.xlsx');
        return [$file];
    }
}
