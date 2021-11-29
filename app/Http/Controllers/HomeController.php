<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Slider;
use Session;
use App\CatePost;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(Request $request){
         //category post
         $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        //slider
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Chuyên bán những loại túi sách hiệu như là Chanel , Gucci ,LV . Túi sách thể hiện sự thượng đẳng và sang trọng nhất ";
        $meta_keywords = "Chuyên bán túi sách hiệu";
        $meta_tittle = "Bán túi sách hiệu Chanel , Gucci ,LV";
        $url_canonical = $request->url();


        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
  
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
       
        //$all_product = DB::table('tbl_product')
       // -> join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
       // -> join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
       // ->orderby('tbl_product.product_id','desc')->get();

       $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(6); 
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_tittle',$meta_tittle)->with('url_canonical',$url_canonical)
        ->with('slider',$slider)->with('category_post',$category_post);
    }
    public function search(Request $request){
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        
        $meta_desc = "Tìm kiếm sản phẩm";
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_tittle = "Tìm kiếm sản phẩm  ";
        $url_canonical = $request->url();
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
  
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();

      $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
      return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)
      ->with('meta_keywords',$meta_keywords)->with('meta_tittle',$meta_tittle)
      ->with('url_canonical',$url_canonical)->with('slider',$slider)->with('category_post',$category_post);

    }

    
}
