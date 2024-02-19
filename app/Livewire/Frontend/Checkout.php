<?php

namespace App\Livewire\Frontend;

use App\Helpers\CookieSD;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Shipping;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;


class Checkout extends Component
{
    public $shipping_id = null;

    #[Validate('required')]
    public $shippingPrice = 0;

    #[Validate('required')]
    public $name = '';

    #[Validate('required')]
    public $number = '';

    #[Validate('required')]
    public $address = '';

    #[On('post-created')]
    public function updatePostList()
    {
    }


    public function increment($id){
        CookieSD::increment($id);
        $this->dispatch('post-created');

    }

    public function decrement($id){
        CookieSD::decrement($id);
        $this->dispatch('post-created');

    }

    public function remove($id)
    {
        CookieSD::removeFromCookie($id);
        $this->dispatch('post-created');
    }

    public function save(){
        $this->validate();
        if($this->shippingPrice == 0){
            return back();
        }

        if (CookieSD::data()['total'] == 0) {
            $this->addError('cart', 'Cart is empty');
            return;
        }

        //getting cookie data
        $cookieData = CookieSD::data();

        //dd($cookieData['products']);
        $orderID = 'ORD' . now()->format('YmdHis'). strtoupper(Str::random(4));

        $order = new Order();
        $order->order_id     = $orderID;
        $order->name         = $this->name;
        $order->number       = $this->number;
        $order->address      = $this->address;
        $order->shipping_id  = $this->shipping_id;
        $order->price        = $cookieData['price']+$this->shippingPrice;
        $order->status       = 'pending';
        $order->save();

        foreach ($cookieData['products'] as $key => $value) {
            $order_product = new OrderProduct();
            $order_product->order_id    = $order->id;
            $order_product->product_id  = $value->id;
            $order_product->price       = $value->price - ($value->price*$value->discount/100);
            $order_product->qnt         = $value->quantity;
            $order_product->save();

        }

        $this->name = '';
        $this->number = '';
        $this->address = '';
        $this->shippingPrice = 0;
        Cookie::queue(Cookie::forget('product_data'));
        $this->dispatch('post-created');
        return redirect()->route('thankyou');
    }

    public function ship($id){
        $this->shipping_id = $id;

        $shipping = Shipping::find($id);
        $this->shippingPrice = $shipping->price;
    }

    // public function wallet(){
    //     $total = CookieSD::data()['price'];
    //     $this->total = $total + $this->shippingPrice;
    // }

    public function render()
    {
        $product = CookieSD::data();
        $shipping = Shipping::all();
        return view('livewire.frontend.checkout', [
            'products'  => $product,
            'shippings' => $shipping,
            'total'     => $product['price'] + $this->shippingPrice,
        ]);
    }
}
