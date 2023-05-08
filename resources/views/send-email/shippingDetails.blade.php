@extends('layouts.struktur-html')
@section('title', 'Pay Now ~ Luxspace')
@push('include-css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        table tbody tr td.pay-now a {
            text-decoration: none;
            background-color: #F9CADA;
            color: black;
            border-radius: 999px;
            text-align: center;
            padding: 10px 15px;
            display: block;
        }

        table tbody tr td.pay-now a:hover {
            color: #F9CADA;
            background-color: black;
        }

        /* responsive untuk tablet & handphone */
        @media (max-width: 768px) {

            .shipping-details,
            .shopping-cart {
                font-size: 1rem !important;
            }

            table tbody tr td.pay-now a {
                padding-left: 5px;
                padding-right: 5px;
            }
        }

        .total td {
            border-top: 1px solid black;
        }

        footer {
            display: flex;
            justify-content: center;
            padding-left: 1rem
                /* 16px */
            ;
            padding-right: 1rem
                /* 16px */
            ;
            text-align: center;
            padding-top: 2rem
                /* 32px */
            ;
            padding-bottom: 2rem
                /* 32px */
            ;
        }

        footer p {
            font-size: 0.875rem
                /* 14px */
            ;
            line-height: 1.25rem
                /* 20px */
            ;
        }
    </style>
@endpush

@section('content')
    {{-- START: header --}}
    <header style="text-align: center">
        <img src="{{ asset('images/design/logo.svg') }}"
            alt="Luxspace ~ Adalah sebuah website yang menjual barang-barang kece" />
    </header>
    {{-- END: header --}}

    {{-- START: Shipping Details --}}
    <section style="text-align: center">
        <h3 style="font-size: 1.5rem">Shipping Details</h3>
    </section>
    <table class="shipping-details" style="font-size: 1.125rem; margin: 0 auto;" cellpadding="5" cellspacing="4">
        <tbody>
            {{-- your name --}}
            <tr>
                <td>
                    Your name
                </td>
                <td>
                    <b>
                        {{ $shipping_details['your_name'] }}
                    </b>
                </td>
            </tr>
            {{-- your email --}}
            <tr>
                <td>
                    Your email
                </td>
                <td>
                    <b>
                        {{ $shipping_details['email_address'] }}
                    </b>
                </td>
            </tr>
            {{-- address --}}
            <tr>
                <td>
                    Address
                </td>
                <td style="width: calc(20vw + 100px);">
                    <b>
                        {{ $shipping_details['address'] }}
                    </b>
                </td>
            </tr>
            {{-- Phone number --}}
            <tr>
                <td>
                    Phone number
                </td>
                <td>
                    <b>
                        {{ $shipping_details['phone_number'] }}
                    </b>
                </td>
            </tr>
            {{-- Courier --}}
            <tr>
                <td>
                    Courier
                </td>
                <td>
                    <img src="{{ asset('images/content/courier/' . $shipping_details['image_courier']) }}"
                        alt=" {{ $shipping_details['courier'] }}" style="max-width: 117px; max-height: 50px;" />
                </td>
            </tr>
            {{-- Payment --}}
            <tr>
                <td>
                    Payment
                </td>
                <td>
                    <img src="{{ asset('images/content/payment/' . $shipping_details['image_payment']) }}"
                        alt="{{ $shipping_details['payment'] }}" style="max-width: 117px; max-height: 50px;" />
                </td>
            </tr>
        </tbody>
    </table>
    {{-- END: Shipping Details --}}

    {{-- START: shopping cart --}}
    <section style="text-align: center; margin-bottom: 0.75rem;">
        <h3 style="font-size: 1.5rem">Shopping Cart</h3>
    </section>
    <table style="font-size: 1.25rem; margin: 0 auto;" cellpadding="8" cellspacing="0" class="shopping-cart">
        <thead align="center">
            <tr>
                <td>Photo</td>
                <td>Name product</td>
                <td>Price</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($shopping_cart as $cart)
                <tr align="center">
                    <td>
                        <img src="{{ asset('images/upload_images/' . $cart['photo']) }}" alt="shopping cart" width="80"
                            height="80" />
                    </td>
                    <td>
                        <b>
                            {{ $cart['name_product'] }}
                        </b>
                    </td>
                    <td>
                        <b>
                            IDR {{ number_format($cart['price'], 0, ',', '.') }}
                        </b>
                    </td>
                </tr>
            @endforeach
            {{-- START: Total --}}
            <tr class="total">
                {{-- kosongkan bagian image --}}
                <td style="display: none"></td>
                <td align="center">
                    <b>Total</b>
                </td>
                <td align="center">termasuk ppn 11%</td>
                <td align="center">
                    <b>IDR {{ number_format($total, 0, ',', '.') }}</b>
                </td>
            </tr>
            {{-- END: Total --}}
            <tr>
                <td></td>
                <td></td>
                <td class="pay-now">
                    <a href="{{ url("/success/$token") }}">
                        <b>
                            Pay Now
                        </b>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- END: shopping cart --}}
    <!-- START: Footer -->
    <footer>
        <p class="text-sm">
            Copyright {{ date('Y') }} • All Rights Reserved LuxSpace by Lukman Harun
        </p>
    </footer>
    <!-- END: Footer -->
@endsection
