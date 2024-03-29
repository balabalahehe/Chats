<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class smartMail extends Mailable
{
    use Queueable, SerializesModels;

    public $view;
    public $data;
    public $subject;

    public function __construct($view, $data, $subject)
    {
        $this->view = $view;
        $this->data = $data;
        $this->subject = $subject;
    }


    public function build()
    {
        return $this->from('bruce.181202@gmail.com')
                    ->view($this->view, ['data' => $this->data])
                    ->subject($this->subject);
    }

}
