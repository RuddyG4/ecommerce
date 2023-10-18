<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">

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
                                    <img src="img/shop-cart/cp-1.jpg" alt="">
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
                                        <span class="dec qtybtn" wire:click="decrement( {{ $item->id }})">-</span>
                                        <input type="text" value="{{ $item->qty}}">
                                        <span class="inc qtybtn" wire:click="increment( {{ $item->id }})">+</span>
                                    </div>
                                </td>
                                <td class="cart__total">$ {{ $item->price * $item->qty}}</td>
                                <td class="cart__close"><span class="icon_close" wire:click="remove({{ $item->id }})"></span></td>
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
                    <a href="#">Continue Shopping</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                    <a href="#"><span class="icon_loading"></span> Update cart</a>
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
                    <a href="#" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- Shop Cart Section End -->