<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShippingDetailsEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $shippingDetails; 
    private $shoppingCart;
    private $total;
    private $token;

    public function __construct($shippingDetails = [], $shoppingCart = [], $total = 0, $token = '')
    {
        $this->shippingDetails = $shippingDetails;
        $this->shoppingCart = $shoppingCart;
        $this->total = $total;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@luxspace.com')
                    ->view('send-email.shippingDetails')
                    ->with([
                        'shipping_details' => $this->shippingDetails,
                        'shopping_cart' => $this->shoppingCart,
                        'total' => $this->total,
                        'token' => $this->token
                    ]);
    }
}
