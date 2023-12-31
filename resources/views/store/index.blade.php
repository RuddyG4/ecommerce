<x-layouts.app>
    <x-categories />
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>New products</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".women">Women’s</li>
                        <li data-filter=".men">Men’s</li>
                        <li data-filter=".kid">Kid’s</li>
                        <li data-filter=".accessories">Accessories</li>
                        <li data-filter=".cosmetic">Cosmetics</li>
                    </ul>
                </div>
            </div>

            <!-- Product cards -->
            <div class="row property__gallery">
                @foreach ($inventory as $inventoryItem)
                <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('storage'). '/'. $inventoryItem->product->image_path }}">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="{{ asset('storage'). '/'. $inventoryItem->product->image_path }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li>
                                    <livewire:add-cart-button :inventory_item_id="$inventoryItem->id" />
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{ $inventoryItem->product->product_name }}</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ {{ $inventoryItem->sale_price }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Section End -->
</x-layouts.app>