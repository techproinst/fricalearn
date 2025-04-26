<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DemoCourseEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $parent;
    public $parentCourse;
    public $demoCourseLinks;

    /**
     * Create a new message instance.
     */
    public function __construct($parent, $parentCourse, $demoCourseLinks )
    {
        $this->parent = $parent;
        $this->parentCourse = $parentCourse;
        $this->demoCourseLinks = $demoCourseLinks;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from : new Address(config('mail.from.address'), config('mail.from.name')),
            subject: 'Your Demo Course Class Links',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {  
         
          
        return new Content(
            view: 'mails.demo_course_mail',
            with: [
                   'parent' => $this->parent,
                   'parentCourse' => $this->parentCourse,
                   'demoCourseLinks' => $this->demoCourseLinks,
                
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
