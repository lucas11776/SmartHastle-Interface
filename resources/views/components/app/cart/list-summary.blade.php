<div class="col-lg-6 cart_extra_col">
    <div class="cart_extra cart_extra_2">
        <div class="cart_extra_content cart_extra_total pl-4 pr-4">
            <div class="cart_extra_title">
                Cart Total
            </div>
            <ul class="cart_extra_total_list">
                <li class="d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_extra_total_title">
                        Shipping
                    </div>
                    <div class="cart_extra_total_value ml-auto">
                        R0.00
                    </div>
                </li>
                <li class="d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_extra_total_title">
                        Tax
                    </div>
                    <div class="cart_extra_total_value ml-auto">
                        R0.00
                    </div>
                </li>
                <li class="d-flex flex-row align-items-center justify-content-start">
                    <div class="cart_extra_total_title">
                        Total
                    </div>
                    <div class="cart_extra_total_value ml-auto">
                       R<?php
                        $cartTotal = $cart->sum(function ($item) {
                            return $item->cartable->price;
                        });
                        echo number_format($cartTotal, 2);
                        ?>
                    </div>
                </li>
            </ul>
            <div class="checkout_button trans_200">
                <a href="{{ url('checkout') }}">
                    Checkout
                </a>
            </div>
        </div>
    </div>
</div>
