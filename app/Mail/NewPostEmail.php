<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewPostEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Site Recap',
        );
    }

    public function content()
    {
        return new Content(
            view: 'new-post-email',
            with: [
                'title' => $this->data['title'],
                'name' => $this->data['name'],
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
}