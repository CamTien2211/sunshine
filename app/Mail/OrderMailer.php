<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
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
        $dh_ma = $this->data['donhang']['dh_ma'];
        return $this->from(env('MAIL_FROM_ADDRESS', 'hotro@sunshine.com'), env('MAIL_FROM_NAME', 'HoTro'))
            ->subject("Đơn hàng [$dh_ma] hoàn tất")
            ->view('emails.order-email')
            ->with('data', $this->data);
    }
}
