<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama, $kode, $link)
    {
       $this->nama = $nama;
       $this->kode = $kode;
       $this->link = $link;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('alldii1956@gmail.com')
                   ->view('email/template')
                   ->with(
                    [
                        'nama' => $this->nama,
                        'link' => "$this->link/$this->kode",
                    ]);
    }
}
