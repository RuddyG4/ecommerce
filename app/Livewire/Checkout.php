<?php

namespace App\Livewire;

use App\Mail\OrderUpdated;
use App\Models\City;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingMethod;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Checkout extends Component
{
    public $cities, $shipping_methods;
    public $first_name, $last_name, $shipping_address1, $shipping_address2, $city_id, $phone, $guest_email, $shipping_method_id = 1, $order_instructions;
    public $order_lines = [];

    public function render()
    {
        return view('livewire.checkout');
    }

    public function mount()
    {
        $this->cities = City::all();
        $this->shipping_methods = ShippingMethod::all();
    }

    public function createOrder()
    {
        $data = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'shipping_address1' => 'required|max:60',
            'shipping_address2' => 'max:60',
            'shipping_method_id' => 'required',
            'order_instructions' => 'max:255',
            'phone' => 'nullable|string|max:20',
            'city_id' => 'required',
            'guest_email' => 'required|email|max:60',
        ]);

        if (!Auth::guest()) {
            $data['customer_id'] = Auth::user()->customer->id;
        }

        $data['total'] = 0;
        $products = [];
        $cart = Cart::content();
        foreach ($cart as $item) {
            $orderItem = new OrderItem([
                'product_id' => $item->id,
                'qty' => $item->qty,
                'tax_amount' => 0,
                'unit_price' => $item->price,
                'sub_total' => $item->price * $item->qty,
                'total' => $item->price * $item->qty,
            ]);
            $data['total'] += $orderItem->total;
            $this->order_lines[] = $orderItem;
            $products[$item->id] = $item->qty;
        }

        $data['order_date'] = now();
        $data['branch_id'] = 1;

        DB::transaction(function () use ($data, $products) {
            foreach ($products as $productId => $qty) {
                Inventory::where('product_id', $productId)->where('branch_id', $data['branch_id'])->decrement('stock', $qty);
            }
            $order = Order::create($data);
            $order->shippingTrackings()->create([
                'tracking_name' => 'Sin procesar',
                'tracking_description' => 'El pedido se ha registrado, pero no se ha procesado',
                'tracking_datetime' => now(),
            ]);

            $order->orderItems()->saveMany($this->order_lines);
            Mail::to($data['guest_email'])->send(new OrderUpdated($order));
        });

        $this->reset('order_lines');
        Cart::destroy();

        return redirect('/store');
    }
}
