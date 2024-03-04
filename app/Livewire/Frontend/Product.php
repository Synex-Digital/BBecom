<?php

namespace App\Livewire\Frontend;

use App\Helpers\CookieSD;
use App\Models\Campaign;
use App\Models\Product as ModelsProduct;
use App\Models\ProductCategory;
use Livewire\Component;


class Product extends Component
{
    public function addToCart($productId,$qnt)
    {
        CookieSD::addToCookie($productId, $qnt);
        // Emit an event to notify other components
        $this->dispatch('post-created');

    }


    public function render()
    {
        $latest     = ModelsProduct::where('status','active')->latest()->get()->take(8);
        $featured   = ModelsProduct::where('status','active')->where('featured', 1)->latest()->get()->take(8);
        $popular    = ModelsProduct::where('status','active')->where('popular', 1)->latest()->get()->take(8);
        $category   = ProductCategory::all();
        $vertical   = Campaign::where('image_type','vertical')->first();
        return view('livewire..frontend.product', [
            'latests'       => $latest,
            'featureds'     => $featured,
            'populars'      => $popular,
            'categories'    => $category,
            'ads'           => $vertical,
        ]);
    }
}
