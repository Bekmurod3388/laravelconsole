<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;
    protected $xabar;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($xabar)
    {
        $this->xabar = $xabar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('task3388@gmail.com')->view('email',[
            'xabar' => $this->xabar
        ]);
    }
}
