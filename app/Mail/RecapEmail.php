<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RecapEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Recap Email',
        );
    }

    public function content()
    {
        $postCount = Post::count();
        $userCount = User::count();
        return new Content(
            view: 'recap-email',
            with: [
                'postCount' => $postCount,
                'userCount' => $userCount,
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
}