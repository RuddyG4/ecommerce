<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
            </div>
        </div>
        <form wire:submit="createOrder" class="checkout__form">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Billing detail</h5>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>First Name <span>*</span></p>
                                <input type="text" wire:model="first_name" id="first_name">
                                @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Last Name <span>*</span></p>
                                <input type="text" wire:model="last_name" id="last_name">
                                @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Address <span>*</span></p>
                                <input type="text" placeholder="Street Address" wire:model="shipping_address1" id="shipping_address1">
                                @error('shipping_address1')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <input type="text" id="shipping_address2" placeholder="Apartment. suite, unite ect ( optinal )" wire:model="shipping_address2">
                                @error('shipping_address2')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="checkout__form__input">
                                <p>Town/City <span>*</span></p>
                                <select class="form-control" wire:model="city_id" id="city">
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                    @endforeach
                                </select>
                                @error('$city_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Shipping Method <span>*</span></p>
                                <select class="form-control" style="margin-bottom: 10px;" wire:model.live="shipping_method_id" id="shipping_method">
                                    @foreach ($shipping_methods as $method)
                                    <option value="{{ $method->id }}">{{ $method->method_name }}</option>
                                    @endforeach
                                </select>
                                @error('shipping_method_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @foreach ($shipping_methods as $method)
                            @if($method->id == $shipping_method_id)
                            <span class="text-info">Envíos gratis: {{ $method->method_description }}</span>
                            <br>
                            <span class="text-info">Costo: Bs {{ $method->price_per_kg }} por Kg + Bs {{ $method->price_per_km }} por Km</span>
                            @endif
                            @endforeach

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6" style="margin-top: 10px;">
                            <div class="checkout__form__input">
                                <p>Phone</p>
                                <input type="number" wire:model="phone" id="phone">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6" style="margin-top: 10px;">
                            <div class="checkout__form__input">
                                <p>Email <span>*</span></p>
                                <input type="email" wire:model="guest_email" id="email">
                                @error('guest_email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Oder notes <span>*</span></p>
                                <input type="text" id="order_instructions" wire:model="order_instructions" placeholder="Note about your order, e.g, special noe for delivery">
                                @error('order_instructions')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout__order">
                        <h5>Your order</h5>
                        <div class="checkout__order__product">
                            <ul>
                                <li>
                                    <span class="top__text">Product</span>
                                    <span class="top__text__right">Total</span>
                                </li>
                                @php
                                $cart = Cart::content();
                                $total = 0;
                                @endphp
                                @foreach ($cart as $item)
                                @php
                                $totalItem = $item->qty * $item->price;
                                $total+= $totalItem;
                                @endphp
                                <li>0{{ $loop->index + 1 }}. {{ $item->name }} <span>$ {{ $totalItem }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="checkout__order__total">
                            <ul>
                                <li>Subtotal <span>$ {{ $total }}</span></li>
                                <li>Total <span>$ {{ $total }}</span></li>
                            </ul>
                        </div>
                        <div class="checkout__order__widget">
                            <label for="check-payment">
                                Cheque payment
                                <input type="checkbox" id="check-payment">
                                <span class="checkmark"></span>
                            </label>
                            <label for="paypal">
                                PayPal
                                <input type="checkbox" id="paypal">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        @if ($cart->count() == 0)
                        <button type="submit" class="site-btn" style="opacity: 0.6;" disabled>Place order</button>
                        <span class="text-danger">El carro está vacio, por favor agregue un producto</span>
                        @else
                        <button type="submit" class="site-btn">Place order</button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Checkout Section End -->