<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Order $order) {}

    public function envelope(): Envelope
    {
        $type = match($this->order->order_type) {
            'custom' => 'Custom Order',
            'now'    => 'Regular Order',
            default  => 'General Inquiry',
        };

        $subject = "New {$type}";
        if ($this->order->product_name) {
            $subject .= " — {$this->order->product_name}";
        }

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        return new Content(view: 'emails.new-order');
    }
}
