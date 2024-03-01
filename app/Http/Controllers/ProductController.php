<?php

namespace App\Http\Controllers;

use App\Helpers\CookieSD;
use App\Models\Product;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;

class ProductController extends Controller
{
    public function single($slugs){

        $product = Product::where('slugs',$slugs)->first();
        $relatedProduct = null;
        if ($product->category) {
            $relatedProduct = Product::where('category_id', $product->category->id)->get();
        }

        if ($product) {
            SEOMeta::setTitle('Product');
            SEOMeta::addMeta('title', $product->seo_title);
            SEOTools::setDescription($product->seo_description);
            SEOMeta::addKeyword($product->seo_tags);
        }

        SEOMeta::setCanonical('https://synexdigital.com' . request()->getPathInfo());

        return view('frontend.productView',[
            'product' => $product,
            'related' => $relatedProduct
        ]);
    }

    public function cart(Request $request){
        // dd($request->all());
        $request->validate([
            'qnt'   => 'required',
            'id'    => 'required',
            'btn'   => 'required',
        ]);

        try {
            CookieSD::addToCookie($request->id, $request->qnt);
        } catch (\Exception $e) {
            // Catch the exception and redirect back with a warning message
            return back()->with('err', 'Warning: ' . $e->getMessage());
        }

        if ($request->btn == 'cart') {
            return back();
        }
        if ($request->btn == 'buy') {
            return redirect()->route('checkout');
        }
    }

}
