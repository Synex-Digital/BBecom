@extends('frontend.layouts.app')
@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> {{ $product->name }}
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        @foreach ($product->images as $key => $image)
                                            <figure class="border-radius-10">
                                                <img src="{{ asset('files/product/'.$image->image) }}" alt="product image">
                                            </figure>
                                        @endforeach
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15">
                                        @foreach ($product->images as $key => $image)
                                            <div><img src="{{ asset('files/product/'.$image->image) }}" alt="product image"></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail">{{ $product->name }}</h2>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <ins><span class="text-brand">৳ {{ $product->finalPrice }}</span></ins>
                                            <ins><span class="old-price font-md ml-15">{{ $product->price }}</span></ins>
                                            <span class="save-price  font-md color3 ml-15">{{ $product->discount }}% Off</span>
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p>{{ $product->short_description }}</p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            @if ($product->services)
                                                @foreach ($product->services as $service)
                                                    <li class="mb-10"><i class="fi-rs-crown mr-5"></i> {{ $service->service?$service->service->message:null }}</li>
                                                @endforeach
                                            @endif
                                            {{-- <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                            <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li> --}}
                                        </ul>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <form class="detail-extralink" method="POST" action="{{ route('addtocart') }}">
                                        @csrf
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val" >1</span>
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                        <input type="hidden" name="qnt" id="inputQntValue" value="1">
                                        <input type="hidden" name="id" class="inputQntValue" value="{{ $product->id }}">
                                        <div class="w-100 d-flex gap-3 flex-sm-row flex-column">
                                            <button type="submit" name="btn" value="cart"  class=" button d-block mb-md-3 button-add-to-cart">Add to cart</button>
                                            <button type="submit" name="btn" value="buy" class=" button d-block mb-3 button-add-to-cart">Order Now</button>
                                            {{-- <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a> --}}
                                        </div>
                                    </form>
                                    <a href="tel:+8801888477155" class="btn btn-outline btn-sm text-primary">Call Us : 01888477155</a>
                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li>Availability:<span class="in-stock text-{{ $product->stock_status == 1 ? 'success':'danger' }} ml-5">{{ $product->stock_status == 1 ? 'Available':'Stock Out' }}</span></li>
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Additional-info">
                                    ক্যাশ অন ডেলিভারি - প্রডাক্ট হাতে পেয়ে মূল্য পরিশোধ করবেন <br>

                                    ৭২ ঘণ্টার মধ্যে সারা বাংলাদেশে হোম ডেলিভারি<br>

                                    Delivery time: 24 or 48 hours.<br>

                                    ১০০ % অরিজিনাল প্রডাক্ট এবং যে কোনো সমস্যায় শতভাগ সমাধানের নিশ্চয়তা<br>

                                     রিটার্ন এবং রি-ফান্ড পলিসিঃ<br>

                                    আমরা famillybazar.com এর মাধ্যমে যেহেতু ঢাকা সহ সারা বাংলাদেশ এ ডেলিভারি করে থাকি, যদি কোন প্রকার সমস্যা হয় যেমনঃ কালার বা ডিজাইনের কোন সমস্যা অথবা একটা প্রডাক্ট এর জায়গায় অন্য একটা প্রডাক্ট চলে যাওয়া অথবা প্রডাক্টে কোন সমস্যা থাকে, আপনি ২৪ ঘন্টার মধ্যে আমাদের সাথে যোগাযোগ করবেন এবং আপনার সমস্যাটি আমাদেরকে বললে আমাদের কাছে যদি উক্ত প্রডাক্টটি stock এ থাকে তখন আমরা আপনাদের হাতে উক্ত প্রডাক্ট টি পৌঁছে যাবে ৫ কর্মদিবসের মধ্যে এবং উক্ত প্রডাক্ট টি যদি available না থাকে সে ক্ষেত্রে আমরা ৫ কর্মদিবসের মধ্যে বিকাশ বা ব্যাংকের মাধ্যমে আপনার টাকা আপনার কাছে পৌছে দিব।
                                    <br>


                                    বিশেষ দ্রষ্টব্যঃ<br>



                                    ২৪ ঘন্টার মধ্যে যোগাযোগ না করা হলে, সেক্ষেত্রে আপনার কোন অভিযোগ ই গ্রহনযোগ্য হবে না।



                                    প্রডাক্ট এর কোন সমস্যা ব্যাতিতো আমরা কখনই প্রডাক্ট রিটার্ন বা এক্সচেঞ্জ করে থাকিনা।
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h3 class="section-title style-1 mb-30">Related products</h3>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    @if ($related)
                                        @foreach ($related as $pupolar)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap mb-30">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{ route('product.view', $pupolar->slugs) }}">
                                                            @if ($pupolar->images)
                                                                @foreach ($pupolar->images->take(2) as $key => $image)
                                                                    <img class="{{ $key + 1 == 1 ? 'default-img' : 'hover-img' }}"
                                                                        src="{{ asset('files/product/' . $image->image) }}"
                                                                        alt="">
                                                                @endforeach
                                                            @endif
                                                            {{-- <img class="" src="assets/imgs/shop/product-2-2.jpg" alt=""> --}}
                                                        </a>
                                                    </div>
                                                    @if ($pupolar->featured == 1)
                                                        <div class="product-badges product-badges-position product-badges-mrg">
                                                            <span class="best">Featured</span>
                                                        </div>
                                                    @elseif ($pupolar->popular == 1)
                                                        <div class="product-badges product-badges-position product-badges-mrg">
                                                            <span class="new">Popular</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a
                                                            href="">{{ $pupolar->category ? $pupolar->category->category_name : 'Random' }}</a>
                                                    </div>
                                                    <h2><a
                                                            href="{{ route('product.view', $pupolar->slugs) }}">{{ $pupolar->name }}</a>
                                                    </h2>
                                                    <div class="product-price">
                                                        <span>৳ {{ $pupolar->finalPrice }}</span>
                                                        @if ($pupolar->discount != 0)
                                                            <span class="old-price">{{ $pupolar->price }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <a href="{{ route('product.view', $pupolar->slugs) }}" class="btn btn-sm btn-primary" style="width: 100%"> Order now </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
