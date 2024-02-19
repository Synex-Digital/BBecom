<?php
    use App\Models\ProductCategory;
    use App\Models\Campaign;
    $categories = ProductCategory::All();
    $camps       = Campaign::All();
?>
<!-- Quick view -->
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend') }}/imgs/shop/product-16-2.jpg" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend') }}/imgs/shop/product-16-1.jpg" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend') }}/imgs/shop/product-16-3.jpg" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend') }}/imgs/shop/product-16-4.jpg" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend') }}/imgs/shop/product-16-5.jpg" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend') }}/imgs/shop/product-16-6.jpg" alt="product image">
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="{{ asset('frontend') }}/imgs/shop/product-16-7.jpg" alt="product image">
                                </figure>
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails pl-15 pr-15">
                                <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-3.jpg" alt="product image">
                                </div>
                                <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-4.jpg" alt="product image">
                                </div>
                                <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-5.jpg" alt="product image">
                                </div>
                                <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-6.jpg" alt="product image">
                                </div>
                                <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-7.jpg" alt="product image">
                                </div>
                                <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-8.jpg" alt="product image">
                                </div>
                                <div><img src="{{ asset('frontend') }}/imgs/shop/thumbnail-9.jpg" alt="product image">
                                </div>
                            </div>
                        </div>
                        <!-- End Gallery -->
                        <div class="social-icons single-share">
                            <ul class="text-grey-5 d-inline-block">
                                <li><strong class="mr-10">Share this:</strong></li>
                                <li class="social-facebook"><a href="#"><img
                                            src="{{ asset('frontend') }}/imgs/theme/icons/icon-facebook.svg"
                                            alt=""></a></li>
                                <li class="social-twitter"> <a href="#"><img
                                            src="{{ asset('frontend') }}/imgs/theme/icons/icon-twitter.svg"
                                            alt=""></a></li>
                                <li class="social-instagram"><a href="#"><img
                                            src="{{ asset('frontend') }}/imgs/theme/icons/icon-instagram.svg"
                                            alt=""></a></li>
                                <li class="social-linkedin"><a href="#"><img
                                            src="{{ asset('frontend') }}/imgs/theme/icons/icon-pinterest.svg"
                                            alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info">
                            <h3 class="title-detail mt-30">Colorful Pattern Shirts HD450</h3>
                            <div class="product-detail-rating">
                                <div class="pro-details-brand">
                                    <span> Brands: <a href="shop-grid-right.html">Bootstrap</a></span>
                                </div>
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width:90%">
                                        </div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <ins><span class="text-brand">$120.00</span></ins>
                                    <ins><span class="old-price font-md ml-15">$200.00</span></ins>
                                    <span class="save-price  font-md color3 ml-15">25% Off</span>
                                </div>
                            </div>
                            <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                            <div class="short-desc mb-30">
                                <p class="font-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam
                                    rem officia, corrupti reiciendis minima nisi modi,!</p>
                            </div>

                            <div class="attr-detail attr-color mb-15">
                                <strong class="mr-10">Color</strong>
                                <ul class="list-filter color-filter">
                                    <li><a href="#" data-color="Red"><span
                                                class="product-color-red"></span></a></li>
                                    <li><a href="#" data-color="Yellow"><span
                                                class="product-color-yellow"></span></a></li>
                                    <li class="active"><a href="#" data-color="White"><span
                                                class="product-color-white"></span></a></li>
                                    <li><a href="#" data-color="Orange"><span
                                                class="product-color-orange"></span></a></li>
                                    <li><a href="#" data-color="Cyan"><span
                                                class="product-color-cyan"></span></a></li>
                                    <li><a href="#" data-color="Green"><span
                                                class="product-color-green"></span></a></li>
                                    <li><a href="#" data-color="Purple"><span
                                                class="product-color-purple"></span></a></li>
                                </ul>
                            </div>
                            <div class="attr-detail attr-size">
                                <strong class="mr-10">Size</strong>
                                <ul class="list-filter size-filter font-small">
                                    <li><a href="#">S</a></li>
                                    <li class="active"><a href="#">M</a></li>
                                    <li><a href="#">L</a></li>
                                    <li><a href="#">XL</a></li>
                                    <li><a href="#">XXL</a></li>
                                </ul>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="detail-extralink">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <span class="qty-val">1</span>
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart">Add to cart</button>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                </div>
                            </div>
                            <ul class="product-meta font-xs color-grey mt-50">
                                <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a
                                        href="#" rel="tag">Women</a>, <a href="#"
                                        rel="tag">Dress</a> </li>
                                <li>Availability:<span class="in-stock text-success ml-5">8 Items In Stock</span></li>
                            </ul>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<header class="header-area header-style-1 header-height-2">
    {{-- Top Header --}}
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><i class="fi-rs-smartphone"></i> <a href="#">1888477155</a></li>
                            <li><i class="fi-rs-marker"></i><a href="{{ route('contact') }}">Our location</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                @foreach ($camps as $camp)
                                    <li>{{ $camp->campaign_name }} <a href="{{ route('campaign.product.list',$camp->id) }}">Shop now</a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>
                                <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i>
                                    English <i class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li><a href="#"><img src="{{ asset('frontend') }}/imgs/theme/flag-fr.png"
                                                alt="">Français</a></li>
                                    <li><a href="#"><img src="{{ asset('frontend') }}/imgs/theme/flag-dt.png"
                                                alt="">Deutsch</a></li>
                                    <li><a href="#"><img src="{{ asset('frontend') }}/imgs/theme/flag-ru.png"
                                                alt="">Pусский</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Header Bottom --}}
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    @if ($config)
                        {{-- <link rel="shortcut icon" href="" type="image/x-icon"> --}}
                        <a href="{{route('index')}}"><img src="{{ asset('files/config/'.$config->logo) }}" alt="logo"></a>
                    @endif
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <div class="logo logo-width-1">
                            @if ($config)
                                <a href="{{route('index')}}"><img src="{{ asset('files/config/'.$config->logo) }}" alt="logo"></a>
                            @endif
                        </div>
                        {{-- <div class="categori-dropdown-wrap categori-dropdown-active-large">
                            <ul>
                                <li class="has-children">
                                    <a href="shop-grid-right.html"><i class="evara-font-dress"></i>Women's
                                        Clothing</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Hot & Trending</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Dresses</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Blouses & Shirts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Hoodies & Sweatshirts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Women's Sets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Suits & Blazers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Bodysuits</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Tanks & Camis</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Coats & Jackets</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Bottoms</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Leggings</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Skirts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Shorts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Jeans</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Pants & Capris</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Bikini Sets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Cover-Ups</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Swimwear</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="{{ asset('frontend') }}/imgs/banner/menu-banner-2.jpg"
                                                        alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="header-banner2">
                                                    <img src="{{ asset('frontend') }}/imgs/banner/menu-banner-3.jpg"
                                                        alt="menu_banner2">
                                                    <div class="banne_info">
                                                        <h6>15% Off</h6>
                                                        <h4>Hot Deals</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-children">
                                    <a href="shop-grid-right.html"><i class="evara-font-tshirt"></i>Men's Clothing</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Jackets & Coats</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Down Jackets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Jackets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Parkas</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Faux Leather Coats</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Trench</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Wool & Blends</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Vests & Waistcoats</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Leather Coats</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Suits & Blazers</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Blazers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Suit Jackets</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Suit Pants</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Suits</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Vests</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Tailor-made Suits</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Cover-Ups</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="{{ asset('frontend') }}/imgs/banner/menu-banner-4.jpg"
                                                        alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has-children">
                                    <a href="shop-grid-right.html"><i class="evara-font-smartphone"></i>
                                        Cellphones</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Hot & Trending</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Cellphones</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">iPhones</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Refurbished Phones</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Mobile Phone</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Mobile Phone Parts</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Phone Bags & Cases</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Communication Equipments</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Walkie Talkie</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li><span class="submenu-title">Accessories</span></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Screen Protectors</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Wire Chargers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Wireless Chargers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Car Chargers</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Power Bank</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Armbands</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Dust Plug</a></li>
                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                    href="#">Signal Boosters</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="{{ asset('frontend') }}/imgs/banner/menu-banner-5.jpg"
                                                        alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="header-banner2">
                                                    <img src="{{ asset('frontend') }}/imgs/banner/menu-banner-6.jpg"
                                                        alt="menu_banner2">
                                                    <div class="banne_info">
                                                        <h6>15% Off</h6>
                                                        <h4>Hot Deals</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-desktop"></i>Computer &
                                        Office</a></li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-cpu"></i>Consumer
                                        Electronics</a></li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-diamond"></i>Jewelry &
                                        Accessories</a></li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-home"></i>Home & Garden</a>
                                </li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-high-heels"></i>Shoes</a></li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-teddy-bear"></i>Mother &
                                        Kids</a></li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-kite"></i>Outdoor fun</a></li>
                                <li>
                                    <ul class="more_slide_open" style="display: none;">
                                        <li><a href="shop-grid-right.html"><i class="evara-font-desktop"></i>Beauty,
                                                Health</a></li>
                                        <li><a href="shop-grid-right.html"><i class="evara-font-cpu"></i>Bags and
                                                Shoes</a></li>
                                        <li><a href="shop-grid-right.html"><i class="evara-font-diamond"></i>Consumer
                                                Electronics</a></li>
                                        <li><a href="shop-grid-right.html"><i class="evara-font-home"></i>Automobiles
                                                & Motorcycles</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="more_categories">Show more...</div>
                        </div> --}}
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{ route('index') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('shop') }}">Shop</a>
                                </li>
                                <li><a href="shop-grid-right.html">Category <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        @foreach ($categories as $category)
                                        <li><a href="{{ route('front.category',$category->slugs) }}">{{ $category->category_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                                <li>
                                    <a href="{{ route('aboutus') }}">About</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-action-right d-none d-lg-block">
                    <div class="header-action-2">

                        @livewire('frontend.shopping-cart')
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        {{-- shpping cart --}}
                        @livewire('frontend.shopping-cart')
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ route('index') }}"><img src="{{ asset('files/config/'.$config->logo) }}" alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <nav>
                    <ul class="mobile-menu">
                        <li>
                            <a href="{{ route('index') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('shop') }}">Shop</a>
                        </li>
                        <li><a href="shop-grid-right.html">Category <i class="fi-rs-angle-down"></i></a>
                            <ul class="sub-menu">
                                @foreach ($categories as $category)
                                <li><a href="{{ route('front.category',$category->slugs) }}">{{ $category->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li>
                            <a href="{{ route('aboutus') }}">About</a>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>


        </div>
    </div>
</div>
