<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeminarEmail extends Mailable
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
        return $this->view('emails.seminar')
                    ->subject('Nomination for Honorary Fellow of the Institute of Business Development and Invitation to Attend the Business and Leadership Seminar')
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
                        'support_email' => "seminar@ibd.ng",
                    ]);
    }
    
}
