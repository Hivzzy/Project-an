<?php

namespace App\Mail;

use App\Models\Payroll;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $payroll;
    public $periode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, Payroll $payroll, $periode)
    {
        $this->details = $details;
        $this->payroll = $payroll;
        $this->periode = $periode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->details['title'])
            ->view('mail.hello')->with([$this->payroll, $this->periode]);

        foreach ($this->details['files'] as $file) {
            $this->attach($file);
        }

        return $this;
    }
}
