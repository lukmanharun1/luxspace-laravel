<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuccessTransactionEmail extends Mailable
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

    public function __construct($shippingDetails = [], $shoppingCart = [], $total)
    {
        $this->shippingDetails = $shippingDetails;
        $this->shoppingCart = $shoppingCart; 
        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@luxspace.com')
                    ->view('send-email.successTransaction')
                    ->with([
                        'shipping_details' => $this->shippingDetails,
                        'shopping_cart' => $this->shoppingCart,
                        'total' => $this->total
                    ]);
    }
}
