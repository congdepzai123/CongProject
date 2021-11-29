@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
						

<h2 style="margin:0;position: inherit;font-size: 22px" class="title text-center">{{$meta_tittle}}</h2>

                      
<div class="fb-share-button" data-href="{{$url_canonical}}" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>

<div class="zalo-share-button" data-href="{{$url_canonical}}" data-oaid="579745863508352884" data-layout="1" data-color="blue" data-customize=false></div>
						<div class="product-image-wrapper" style="border: none;">
                          
                            @foreach($post_cate as $key => $p)
                                <div class="single-products" style="margin:10px 0;padding: 2px">
                                {!!$p->post_content!!}
                                </div>
                                <div class="clearfix"></div>
                             @endforeach
	
                  
@endsection