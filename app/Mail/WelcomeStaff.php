<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeStaff extends Mailable
{
    use Queueable, SerializesModels;
	
	public $first_name;
	public $username;
	public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->first_name=$data['first_name'];
        $this->username=$data['username'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		
        return $this->from('no_reply@citybetsolutions.com','City Cyber Gaming Solutions')
			->subject('Welcome to City Cyber Management Portal!')
			->markdown('emails.welcomeStaff');
    }
}
