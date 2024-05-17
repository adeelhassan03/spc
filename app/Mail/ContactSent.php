<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSent extends Mailable
{
    use Queueable, SerializesModels;

    public Contact $contact;
    public string $logoUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(Contact $contact, string $logoUrl)
    {
        $this->contact = $contact;
        $this->logoUrl = $logoUrl; // Corrected assignment
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('MAIL.FROM.ADDRESS'), config('MAIL.FROM.NAME'))
            ->subject('A new message from ' . $this->contact->name . ' | ' . config('MAIL.FROM.NAME'))
            ->markdown('emails.contact.send-admin')
            ->with([
                'logoUrl' => $this->logoUrl, // Corrected variable name without the '$'
            ]);
    }
}
