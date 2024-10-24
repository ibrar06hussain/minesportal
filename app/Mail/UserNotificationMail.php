<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Transportation;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pending_user=User::where('email',$this->user)->FirstOrFail();
        return $this->from('mhd.naeem90@yahoo.com')
                    ->subject('Email Verification')
                    ->view('emails.verify')
                    ->with([
                        'pending_user'=>$pending_user
                    ]);
    }
}