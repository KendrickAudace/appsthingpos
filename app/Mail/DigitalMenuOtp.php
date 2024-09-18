<?php

namespace App\Mail;

use Config;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DigitalMenuOtp extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from_email = Config::get('mail.from.address');
        
        return $this->from($from_email)
        ->subject('Email OTP Verification')
        ->view('email_templates.digital_menu_otp')
        ->with([
            'otp' => $this->data['otp'],
        ]);
    }
}
