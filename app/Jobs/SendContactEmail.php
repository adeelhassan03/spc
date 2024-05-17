<?php

namespace App\Jobs;

use App\Models\Contact;
use App\Mail\ContactSent;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Queue;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Settings\ContactSettings;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Exception;  

class SendContactEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function handle()
    {
        $email = new ContactSent($this->contact);
        Mail::to($email->contact->email)->send($email);
        
    }
}