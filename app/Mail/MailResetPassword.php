<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Lang;

class MailResetPassword extends Mailable
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
        $this->subject(Lang::get('messages.emailmessage_7') . ' - ' . $subject);
        return $this->markdown('components.mail.MailResetPassword')->with(['account'=> $this->account]);
    }
}
