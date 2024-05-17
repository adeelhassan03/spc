<?php

namespace App\Jobs;

use App\Models\FaqMessages;
use App\Mail\FaqReceived;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendFaqEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $faq;

    /**
     * Create a new job instance.
     *
     * @param \App\Models\FaqMessages $faq
     */
    public function __construct(FaqMessages $faq)
    {
        $this->faq = $faq;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new FaqReceived($this->faq->toArray());
        Mail::to(config('mail.from.address'))->send($email);
    }
}
