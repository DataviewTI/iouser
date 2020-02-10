<?php

namespace Dataview\IOUser\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserActivation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $email = filled(config("iouser.activation.email")) ? config("iouser.activation.email") : config("iouser.mainEmail");
        return $this->view('User::mail.user-activation')
                    ->from($email, config("iouser.activation.from"))
                    ->subject(config("iouser.activation.subject"))
                    ->with(['data' => $this->data]);
    }
}
