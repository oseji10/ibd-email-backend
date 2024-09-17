<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NominationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $nominee_detail;
  

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nominee_detail)
    {
        $this->nominee_detail = $nominee_detail;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.nomination-email')
                    ->subject('Nomination for Fellow Of The Institute Of Business Development')
                    ->with([
                        'id' => $this->nominee_detail['id'],
                        'email' => $this->nominee_detail['email'], // Use array syntax
                        'first_name' => $this->nominee_detail['first_name'], // Use array syntax for these as well
                        'othernames' => $this->nominee_detail['othernames'],
                        'phone_number' => $this->nominee_detail['phone_number'],
                        'nomination_date' => $this->nominee_detail['nomination_date'],
                        'title' => $this->nominee_detail['title'],
                        'action_url' => "https://app.ibd.ng/auth/signin/",
                        'login_url' => "https://app.ibd.ng/auth/signin/",
                        'support_email' => "info@ibd.ng",
                    ]);
    }
    
}
