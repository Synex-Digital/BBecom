<?php

namespace App\Livewire\Frontend;

use App\Helpers\CookieSD;
use App\Models\Product as ModelsProduct;
use Livewire\Component;


class Product extends Component
{
    public function addToCart($productId,$qnt = null)
    {
        if (ModelsProduct::find($productId)->stock_status == 0) {
            return back();
        }
        $quantity = $qnt?$qnt:1;
        CookieSD::addToCookie($productId, $quantity);
        // Emit an event to notify other components
        $this->dispatch('post-created');
    }


    public function render()
    {
        $latest     = ModelsProduct::latest()->get()->take(8);
        $featured   = ModelsProduct::where('featured', 1)->latest()->get()->take(8);
        $popular    = ModelsProduct::where('popular', 1)->latest()->get()->take(8);
        return view('livewire..frontend.product', [
            'latests'       => $latest,
            'featureds'     => $featured,
            'populars'      => $popular,
        ]);
    }
}
