<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\CatePost;
use App\Slider;
use App\Contact;
use App\Icons;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ContactController extends Controller
{
    public function lien_he(Request $request){
        //category post
      $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

      //slide
      $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
      //seo 
      $meta_desc = "Liên hệ"; 
      $meta_keywords = "Liên hệ";
      $meta_tittle = "Liên hệ chúng tôi";
      $url_canonical = $request->url();
      //--seo
      
      $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
  
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

      $contact = Contact::where('info_id',1)->get();

      return view('pages.lienhe.contact')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)
      ->with('meta_keywords',$meta_keywords)->with('meta_tittle',$meta_tittle)->with('url_canonical',$url_canonical)->with('slider',$slider)
      ->with('category_post',$category_post)->with('contact',$contact);

  }
  
}
