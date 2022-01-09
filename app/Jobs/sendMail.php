<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\smartMail; 

class sendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   protected $mail;
   protected $view;
   protected $data;
   protected $subject;
    public function __construct($mail, $view, $data, $subject)
    {
        $this->mail    = $mail;
        $this->view    = $view;
        $this->data    = $data;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->mail)->send(new smartMail($this->view, $this->data, $this->subject)); 
    }

    // public function handle()
    // {
    //     $email = new smartMail($this->view, $this->data, $this->subject);
    //     Mail::to($this->data['email'])->send($email);
    // }
}
