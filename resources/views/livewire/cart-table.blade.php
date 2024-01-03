<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">

    @php
    $cart = Cart::content();
    @endphp
    <div class="container">

        @if ( $cart->count() == 0)
        <div class="row">
            <div class="col-lg-12 text-danger">
                Uppsss... your cart is empty!!!
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                            <tr>
                                <td class="cart__product__item">
                                    <img src="{{ asset('storage'). '/'. $products[$item->id] }}" alt="" width="80">
                                    <div class="cart__product__item__title">
                                        <h6>{{ $item->name}}</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">$ {{ $item->price }}</td>
                                <td class="cart__quantity">
                                    <div class="pro-qty">
                                        @if ($item->qty > 1)
                                        <span class="dec qtybtn" wire:click="decrement( '{{ $item->rowId }}', {{ $item->qty }} )">-</span>
                                        @else
                                        <span class="dec qtybtn" style="cursor: not-allowed;">-</span>
                                        @endif
                                        {{--- <input type="text" wire:focusin="focusInInput($event.target.value)" wire:focusout="focusOutInput($event.target)" wire:model.live="qtys.{{ $item->rowId }}"> ---}}
                                        <input type="text" wire:focusout="focusOutInput('{{ $item->rowId }}')" wire:model.live="qtys.{{ $item->rowId }}">
                                        <span class="inc qtybtn" wire:click="increment( '{{ $item->rowId }}', {{ $item->qty }})">+</span>
                                    </div>
                                </td>
                                <td class="cart__total">$ {{ $item->price * $item->qty}}</td>
                                <td class="cart__close"><span class="icon_close" wire:click="remove('{{ $item->rowId }}')"></span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="{{ route('store.index') }}"><i class="fa fa-chevron-left"></i> &nbsp;&nbsp;&nbsp;Continue Shopping</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">Apply</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>$ {{ $total }}</span></li>
                        <li>Total <span>$ {{ $total }}</span></li>
                    </ul>
                    <a href="{{ route('store.checkout') }}" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- Shop Cart Section End -->