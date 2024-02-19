<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductPhoto;
use App\Models\ProductService;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Photo;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service = Service::all();
        $categories = ProductCategory::all();
        return view('backend.product.create_product', [
            'categories' => $categories,
            'services'   => $service,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'btn'               => 'required',
            'category_id'       => 'required',
            'product_name'      => 'required',
            'short_description' => 'required',
            'description'       => 'required',
            'price'             => 'required',
            'discount'          => 'required',
            'stock_status'      => 'required',
            // 'service'           => 'required',

        ]);

        //create a unique slugs for product

        DB::beginTransaction();

        try {

            $product = new Product();
            $product->category_id       = $request->category_id;
            $product->name              = $request->product_name;
            $product->slugs             = Str::slug($request->product_name);
            $product->short_description = $request->short_description;
            $product->description       = $request->description;
            $product->discount          = $request->discount;
            $product->price             = $request->price;
            $product->link              = $request->link;
            $product->stock_status      = $request->stock_status;
            $product->status            = $request->btn;
            $product->featured          = $request->featured == 'on' ? 1 : 0;
            $product->popular           = $request->popular == 'on' ? 1 : 0;
            $product->seo_title         = $request->seo_title;
            $product->seo_description   = $request->seo_description;
            $product->seo_tags          = $request->seo_tags;
            $product->save();

            $product_id = $product->id;

            if ($product) {
                foreach ($request->service as $service) {
                    ProductService::insert([
                        'product_id' => $product_id,
                        'service_id' => $service,
                        'created_at' => Carbon::now(),
                    ]);
                }

                foreach ($request->images as  $image) {
                    Photo::upload($image, 'files/product',  $product_id . 'PRO', [1100, 1100]);
                    ProductPhoto::insert([
                        'product_id'    => $product_id,
                        'image'         => Photo::$name,
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('err', 'Failed to add product, try again.');
        }

        return back()->with('succ', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $services = Service::all();
        $request = Product::find($id);
        $categories = ProductCategory::all();
        return view('backend.product.edit_product', compact('request', 'categories', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'btn'               => 'required',
            'category_id'       => 'required',
            'product_name'      => 'required',
            'short_description' => 'required',
            'description'       => 'required',
            'price'             => 'required',
            'discount'          => 'required',
            'stock_status'      => 'required',

        ]);

        // $slugs = Str::slug($request->product_name);


        $product = Product::find($id);
        $product->category_id       = $request->category_id;
        $product->name              = $request->product_name;
        $product->slugs             = Str::slug($request->product_name);
        $product->short_description = $request->short_description;
        $product->description       = $request->description;
        $product->discount          = $request->discount;
        $product->price             = $request->price;
        $product->link              = $request->link;
        $product->stock_status      = $request->stock_status;
        $product->status            = $request->btn;
        $product->seo_title         = $request->seo_title;
        $product->seo_description   = $request->seo_description;
        $product->seo_tags          = $request->seo_tags;
        $product->save();


        return back()->with('succ', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
