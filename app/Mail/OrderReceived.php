<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderReceived extends Mailable
{
    use Queueable, SerializesModels;

    public array $orderData;
    public string $logoUrl;

    /**
     * Create a new message instance.
     *
     * @param array $orderData
     * @param string $logoUrl
     */
    public function __construct(array $orderData, string $logoUrl)
    {
        $this->orderData = $orderData;
        $this->orderData['are_you'] = $orderData['areYou']; 
        unset($this->orderData['areYou']); 
        $this->logoUrl = $logoUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('MAIL.FROM.ADDRESS'), config('MAIL.FROM.NAME'))
            ->subject('New Order Received')
            ->markdown('emails.orders.received')
            ->with([
                'orderData' => $this->orderData,
                'logoUrl' => $this->logoUrl,
            ]);
    }
}
