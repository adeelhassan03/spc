<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FaqReceived extends Mailable
{
    use Queueable, SerializesModels;

    public array $faqData;

    /**
     * Create a new message instance.
     *
     * @param array $faqData
     */
    public function __construct(array $faqData)
    {
        $this->faqData = $faqData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject('New Faq Received')
            ->markdown('emails.faqs.received')
            ->with([
                'faqData' => $this->faqData,
            ]);
    }
}
