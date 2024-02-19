<?php

namespace App\Livewire\Backend;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $search;

    public function featured($id)
    {
        $product = Product::find($id);
        if ($product->featured == 1) {
            $product->featured = 0;
        } else {
            $product->featured = 1;
        }
        $product->save();
    }

    public function popular($id)
    {
        $product = Product::find($id);
        if ($product->popular == 1) {
            $product->popular = 0;
        } else {
            $product->popular = 1;
        }
        $product->save();
    }

    public function render()
    {

        $query = Product::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
                // ->orWhere('number', 'like', '%' . $this->search . '%');
                // Add more fields here for searching (e.g., 'email', 'description', etc.)
            });

        // if ($this->category !== '') {
        //     $query->where('category_id', $this->category); // Adjust 'category_id' with your actual column name
        // }

        $product = $query->where('status', 1)->orderBy('id', 'DESC')->paginate(10);


        $categories = ProductCategory::all();
        return view('livewire.backend.product-list', [
            'requests'      => $product,
            'categories'    => $categories
        ]);
    }
}
