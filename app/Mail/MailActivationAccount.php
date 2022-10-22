<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Lang;
use Illuminate\Mail\Mailables\Address;

class MailActivationAccount extends Mailable
{
    use Queueable, SerializesModels;

    private $account;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($account)
    {
        $this->account = $account;
    }

        /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        $subject = mb_convert_case( env('WEB_NAME'), MB_CASE_TITLE , 'UTF-8' );
        $this->subject(Lang::get('messages.accountActivationMessage') . ' - ' . $subject);
        return $this->markdown('components.mail.MailActivationAccount')->with(['account'=> $this->account]);
    }
}
