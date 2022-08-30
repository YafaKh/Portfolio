<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactInfo;

class ContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        
        $this->email=$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contactInfo=  ContactInfo::get();
        
        return $this->from($this->email['email'],$this->email['name'])
        ->subject($this->email['subject'])
        ->view('publicPage.contactMe',['contactInfo'=>$contactInfo]); 
    }
}
