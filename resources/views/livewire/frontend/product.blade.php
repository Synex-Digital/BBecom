<section class="product-tabs section-padding wow fadeIn animated">
    {{-- Features --}}
    <div class="container">
        <div class="tab-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <h3>Hot Deal</h3>
            </ul>
            <a href="{{ route('features') }}" class="view-more d-none d-md-flex">View More<i
                    class="fi-rs-angle-double-small-right"></i></a>
        </div>
        <div class="tab-content wow fadeIn animated" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach ($featureds as $featured)
                        <div class="col-lg-3 col-md-4 col-6 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('product.view', $featured->slugs) }}">
                                            @if ($featured->images)
                                                @foreach ($featured->images->take(2) as $key => $image)
                                                    <img class="{{ $key + 1 == 1 ? 'default-img' : 'hover-img' }}"
                                                        src="{{ asset('files/product/' . $image->image) }}"
                                                        alt="">
                                                @endforeach
                                            @endif
                                            {{-- <img class="" src="assets/imgs/shop/product-2-2.jpg" alt=""> --}}
                                        </a>
                                    </div>

                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a
                                            href="#">{{ $featured->category ? $featured->category->category_name : 'Random' }}</a>
                                    </div>
                                    <h2><a
                                            href="{{ route('product.view', $featured->slugs) }}">{{ $featured->name }}</a>
                                    </h2>
                                    {{-- <div class="rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                                    </div> --}}
                                    <div class="product-price">
                                        <span>৳ {{ $featured->finalPrice }}</span>
                                        @if ($featured->discount != 0)
                                            <span class="old-price">{{ $featured->price }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-content-wrap d-lg-block d-none">
                                    <a href="{{ route('product.view', $featured->slugs) }}" class="btn btn-sm btn-primary" style="width: 100%"> Order now </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--End product-grid-4-->
            </div>
        </div>
    </div>

    {{-- Popular --}}
    <div class="container">
        <div class="tab-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <h3>Best Sale!</h3>
            </ul>
            {{-- Need link category base url --}}
            <a href="{{ route('hot') }}" class="view-more d-none d-md-flex">View More<i
                    class="fi-rs-angle-double-small-right"></i></a>
        </div>
        <div class="tab-content wow fadeIn animated" id="myTabContent">
            <div class="row product-grid-4">
                @foreach ($populars as $pupolar)
                    <div class="col-lg-3 col-md-4 col-6 col-sm-6">
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
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="new">Popular</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a
                                        href="">{{ $pupolar->category ? $pupolar->category->category_name : 'Random' }}</a>
                                </div>
                                <h2><a
                                        href="{{ route('product.view', $pupolar->slugs) }}">{{ $pupolar->name }}</a>
                                </h2>
                                {{-- <div class="rating-result" title="90%">
                                    <span>
                                        <span>90%</span>
                                    </span>
                                </div> --}}
                                <div class="product-price">
                                    <span>৳ {{ $pupolar->finalPrice }}</span>
                                    @if ($pupolar->discount != 0)
                                        <span class="old-price">{{ $pupolar->price }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap d-lg-block d-none">
                                <a href="{{ route('product.view', $pupolar->slugs) }}" class="btn btn-sm btn-primary" style="width: 100%"> Order now </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- New product --}}
    <div class="container">
        <div class="tab-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <h3>Latest Product</h3>
            </ul>
            {{-- Need link category base url --}}
            <a href="{{ route('shop') }}" class="view-more d-none d-md-flex">View More<i
                    class="fi-rs-angle-double-small-right"></i></a>
        </div>
        <div class="tab-content wow fadeIn animated" id="myTabContent">
            <div class="row product-grid-4">
                @foreach ($latests as $latest)
                    <div class="col-lg-3 col-md-4 col-6 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product.view', $latest->slugs) }}">
                                        @if ($latest->images)
                                            @foreach ($latest->images->take(2) as $key => $image)
                                                <img class="{{ $key + 1 == 1 ? 'default-img' : 'hover-img' }}"
                                                    src="{{ asset('files/product/' . $image->image) }}"
                                                    alt="">
                                            @endforeach
                                        @endif
                                        {{-- <img class="" src="assets/imgs/shop/product-2-2.jpg" alt=""> --}}
                                    </a>
                                </div>

                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">New</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a
                                        href="#">{{ $latest->category ? $latest->category->category_name : 'Random' }}</a>
                                </div>
                                <h2><a href="{{ route('product.view', $latest->slugs) }}">{{ $latest->name }}</a>
                                </h2>
                                {{-- <div class="rating-result" title="90%">
                                    <span>
                                        <span>90%</span>
                                    </span>
                                </div> --}}
                                <div class="product-price">
                                    <span>৳ {{ $latest->finalPrice }}</span>
                                    @if ($latest->discount != 0)
                                        <span class="old-price">{{ $latest->price }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap d-lg-block d-none">
                                <a href="{{ route('product.view', $latest->slugs) }}" class="btn btn-sm btn-primary" style="width: 100%"> Order now </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
