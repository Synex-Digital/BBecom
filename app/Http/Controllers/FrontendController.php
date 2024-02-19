<?php

namespace App\Http\Controllers;

use App\Helpers\CookieSD;
use App\Models\ProductCategory;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;

class FrontendController extends Controller
{
     //home
     function home(){
        //Meta SEO
        //SEOMeta::addMeta('title', 'Synex Digital | IT Solutions For Your Business Online Presence');
        SEOMeta::setTitle('Home');
        SEOTools::setDescription('We are the Synex Digital Team and are Highly Motivated to Give You The Best and effective on-time Results for Your Online Presence and Traffic Growth.');
        SEOMeta::addKeyword(['business it solutions', 'service business definition', 'business communication solution']);
        SEOMeta::setCanonical('https://synexdigital.com' . request()->getPathInfo());
        $category = ProductCategory::all();
        // dd($header_one);
        return view('frontend.index',[
            'categories'    => $category,
        ]);
    }
}
