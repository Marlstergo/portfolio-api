<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Headers;

class UserContactMail extends Mailable
{
  use Queueable, SerializesModels;

  public $data;

  public function __construct($data)
  {
    $this->data = $data;
  }

  public function envelope(): Envelope
  {
    return new Envelope(
      from: new Address('developer@abdulmaliq.dev', 'Portfolio'),
      replyTo: [new Address($this->data['email'], $this->data['name'])],
      subject: 'New Contact Form Submission',
    );
  }

  public function content(): Content
  {
    return new Content(
      view: 'email.user_contact',
      with: $this->data
    );
  }

  public function headers(): Headers
  {
    return new Headers(
      text: [
        'X-PM-Message-Stream' => 'outbound',
        'List-Unsubscribe' => '<mailto:developer@abdulmaliq.dev>',
      ],
    );
  }
}
