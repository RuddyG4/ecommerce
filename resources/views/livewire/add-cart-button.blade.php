<button type="button" wire:click="addToCart">
    <span class="icon_bag_alt"></span>
    @if($cart_count)
    <div class="tip">{{ $cart_count }}</div>
    @endif
</button>