<?php

namespace App\Jobs;

use App\Mail\NominationEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendNominationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $nominee;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($nominee)
    {
        $this->nominee = $nominee;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Send the email with nominee details including the generated ID
        Mail::to($this->nominee->email)->send(new NominationEmail($this->nominee));
    }
}
