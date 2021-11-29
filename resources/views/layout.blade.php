<!DOCTYPE html>
<html lang="en">

	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">
    <link  rel="icon" type="image/x-icon" href="" />

	{{--<meta property="og:image" content="{{$image_og}}" />
    <meta property="og:site_name" content="http://localhost/shop/trang-chu" />
    <meta property="og:description" content="{{$meta_desc}}" />
    <meta property="og:title" content="{{$meta_tittle}}" />
    <meta property="og:url" content="{{$url_canonical}}" />
    <meta property="og:type" content="website" />--}}

	<meta name="csrf-token" content="{{csrf_token()}}">

    <title>{{$meta_tittle}}</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/lightgallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/lightslider.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettify.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/vlite.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{('public/frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +096647124</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> nguyenchicong02091999@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/Jonhny.Cong"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://mobile.twitter.com/congnguyen0209"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/in/c%C3%B4ng-nguy%E1%BB%85n-107210209"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="logo pull-left">
							<a href="http://localhost/shop/trang-chu"><img src="{{('public/frontend/images/logofs1.png')}}" style="width:90%;" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VN
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VNĐ
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="#"><i class="fa fa-star"></i> Favorite</a></li>
								
								<?php
									$customer_id = Session::get('customer_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id != NULL && $shipping_id==NULL){
								?>
								<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-money"></i> Pay</a></li>
								<?php
								}elseif($customer_id != NULL && $shipping_id!=NULL){
									?>
									<li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Pay</a></li>
								<?php
								}else{
								?>
								<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-money"></i> Pay</a></li>
								<?php
								}
								?>
							

								
								<li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>


								@php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL){ 
                                    @endphp

                                    <li>
                                        <a href="{{URL::to('history')}}"><i class="fa fa-bell"></i> Order history </a>

                                    </li>

                                    
                                   @php
                                    }
                                   @endphp
								<?php
									$customer_id = Session::get('customer_id');
									if($customer_id != NULL){
								?>
								<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-sign-out"></i> Log out</a>
								<img width="15%" src="{{Session::get('customer_picture')}}"> {{Session::get('customer_name')}}
								
							</li>
								
								<?php
								}else{
									?>
								<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-sign-in"></i> Login</a></li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang-chu')}}" class="active">Home</a></li>
								<li class="dropdown"><a href="{{URL::to('/trang-chu')}}">Product<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu"  class ="sub-menu">
                                         
									
										@foreach($category as $key => $danhmuc)
                                        <li><a href="{{URL::to('danh-muc-san-pham/'.$danhmuc->category_id)}}">{{$danhmuc->category_name}}</a></li>
                                        @endforeach
										
										
                                    </ul>
                                </li> 
								
								<li class="dropdown"><a href="#">News<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                       @foreach($category_post as $key => $danhmucbaiviet)
                                        <li><a href="{{URL::to('/danh-muc-bai-viet/'.$danhmucbaiviet->cate_post_slug)}}">{{$danhmucbaiviet->cate_post_name}}</a></li>
                                    @endforeach
                                      
                                    </ul>
                                </li>  
								<li><a href="{{URL::to('/gio-hang')}}">Cart</a></li>
								<li><a href="{{URL::to('/lien-he')}}">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<form action="{{URL::to('/tim-kiem')}}" method="POST">
						{{@csrf_field()}}
						<div class="search_box pull-right">
						
							<input type="text" name="keywords_submit" placeholder="Search" />
							<input type="submit" style="margin-top:0; color:#666" name="search_items" class="btn btn-primary btn-sm " value="Search">
						</div>
							</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							<li data-target="#slider-carousel" data-slide-to="3"></li>
						</ol>
						
						<div class="carousel-inner">
						@php 
                            $i = 0;
                        @endphp
                        @foreach($slider as $key => $slide)
                            @php 
                                $i++;
                            @endphp
                            <div class="item {{$i==1 ? 'active' : '' }}">
                               
                                <div class="col-sm-12">
                                    <img alt="{{$slide->slider_desc}}" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" height="200" width="99%" class="img img-responsive">
                                   
                                </div>
                            </div>
                        @endforeach  
								
							</div>
							
							
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category product</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($category as $key => $cate)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
								</div>
							</div>
							@endforeach
						</div><!--/category-products-->
						<div class="brands_products"><!--brands_products-->
							<h2>Brand</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								@foreach($brand as $key => $brand)
									<li><a href="{{URL::to('thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
								@endforeach	
								</ul>
							</div>
						</div><!--/brands_products-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					
					@yield('content')
					

					
					
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="companyinfo">
							<h2><span>Fashion</span>-shop</h2>
							<p>FashionShop - fun, reliable, safe and free online shopping app! Shop is the leading online trading platform in Vietnam. With Shopee's guarantee, you'll shop online with peace of mind and faster than ever!</p>
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Customer care</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Shopping guide</a></li>
								<li><a href="#">Returns & Refunds</a></li>
								<li><a href="#">Warranty Policy </a></li>
								<li><a href="#">Payment</a></li>
								<li><a href="#">Terms of Service</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Shop system</h2>
							<ul class="nav nav-pills nav-stacked">
								<p>Địa chỉ 1:55C Trần Nhật Duật, P Tân Định, Q1</p>
								<p>Email:FashionshopQ1@gmail.com</p>
								<p>Phone:0909686868</p>
								<p>Địa chỉ 2:34 Trần Quang Diệu, P14, Q3, HCM</p>
								<p>Email:FashionshopQ3@gmail.com</p>
								<p>Phone:0909868668</p>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Contact</h2>
							<ul class="nav nav-pills nav-stacked">
							   <li><a href="https://www.facebook.com/Jonhny.Cong"><i class="fa fa-facebook"></i>Facebook</a></li>
								<li><a href="https://mobile.twitter.com/congnguyen0209"><i class="fa fa-twitter"></i>Twitter</a></li>
							   <li><a href="https://www.linkedin.com/in/c%C3%B4ng-nguy%E1%BB%85n-107210209"><i class="fa fa-linkedin"></i>Linkedin</a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i>Google</a></li>
								
							</ul>
						</div>
					</div>

						

					<div class="col-sm-1">
						<div class="single-widget">
							<h2>About FashionShop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Email</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Sign up for email information to be notified by the store that information such as promotions, new services will be notified via email customers</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<center>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright @2021 FashionShop.com</p>
					<!-- <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p> -->
				</div>
			</div>
		</div></center>
	</footer><!--/Footer-->

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="DfD3lxiQ"></script>


<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script type="text/javascript">
        function Huydonhang(id){
            var order_code = id;
            var lydo = $('.lydohuydon').val();
          
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url:'{{url('/huy-don-hang')}}',
                method:"POST",

                data:{order_code:order_code, lydo:lydo, _token:_token},
                success:function(data){
                    alert('Canceled order successfully');
                    location.reload(); 
                }

            }); 
        }
    </script>
<script>
	var usd = document.getElementById("vnd_to_usd").value;
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'ARdN0yjyd-1RooP1G17i16WwWwNTZJ-hgE6ebFuCib1wWVBMNYYMU9uk2zbTE_aTPU8TQaWkoq8zooui',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${usd}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

</script>


<script type="text/javascript">
    function remove_background(product_id)
     {
      for(var count = 1; count <= 5; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ccc');
      }
    }
    //hover chuột đánh giá sao
   $(document).on('mouseenter', '.rating', function(){
      var index = $(this).data("index");
      var product_id = $(this).data('product_id');
    // alert(index);
    // alert(product_id);
      remove_background(product_id);
      for(var count = 1; count<=index; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ffcc00');
      }
    });
   //nhả chuột ko đánh giá
   $(document).on('mouseleave', '.rating', function(){
      var index = $(this).data("index");
      var product_id = $(this).data('product_id');
      var rating = $(this).data("rating");
      remove_background(product_id);
      //alert(rating);
      for(var count = 1; count<=rating; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ffcc00');
      }
     });

    //click đánh giá sao
    $(document).on('click', '.rating', function(){
          var index = $(this).data("index");
          var product_id = $(this).data('product_id');
            var _token = $('input[name="_token"]').val();
          $.ajax({
           url:"{{url('insert-rating')}}",
           method:"POST",
           data:{index:index, product_id:product_id,_token:_token},
           success:function(data)
           {
            if(data == 'done')
            {
             alert("Bạn đã đánh giá "+index +" trên 5");
            }
            else
            {
             alert("Lỗi đánh giá");
            }
           }
    });
          
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        
        load_comment();

        function load_comment(){
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/load-comment')}}",
              method:"POST",
              data:{product_id:product_id, _token:_token},
              success:function(data){
              
                $('#comment_show').html(data);
              }
            });
        }
        $('.send-comment').click(function(){
            var product_id = $('.comment_product_id').val();
            var comment_name = $('.comment_name').val();
            var comment_content = $('.comment_content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/send-comment')}}",
              method:"POST",
              data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content, _token:_token},
              success:function(data){
                
                $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>');
                load_comment();
                $('#notify_comment').fadeOut(9000);
                $('.comment_name').val('');
                $('.comment_content').val('');
              }
            });
        });
    });
</script>
<script type="text/javascript">

          $(document).ready(function(){
            $('.send_order').click(function(){
				swal({
					title: "Order confirmation?",
					text: "Orders are non-refundable, do you want to place an order?",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "Cảm ơn đã đặt hàng",
					cancelButtonText: "Hủy!",
					closeOnConfirm: false,
					closeOnCancel: false
					},
					
					function(isConfirm){
						if (isConfirm) {
							var shipping_email = $('.shipping_email').val();
                        var shipping_name = $('.shipping_name').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_notes = $('.shipping_notes').val();
                        var shipping_method = $('.payment_select').val();
                      
                        var order_fee = $('.order_fee').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();

                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,
							shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                            success:function(){
								swal("Đơn hàng", "Đơn hàng của bạn đã gửi thành công", "success");
                            }
                        });
						window.setTimeout(function(){ 
							window.location.href = "{{url('/history')}}";
                        } ,3000);
							
					} else {
						swal("Đơn hàng hủy", "Đặt lại đơn hàng", "error");
					}
					
					});
                        
                       
              
                });

               
            });
        
    

    </script>

<script type="text/javascript">
$(document).ready(function(){
	$('.add-to-cart').click(function(){
	var id = $(this).data('id_product');
	var cart_product_id =$('.cart_product_id_'+ id).val();
	var cart_product_name =$('.cart_product_name_'+ id).val();
	var cart_product_image =$('.cart_product_image_'+ id).val();
	var cart_product_quantity =$('.cart_product_quantity_'+ id).val();
	var cart_product_price =$('.cart_product_price_'+ id).val();
	var cart_product_qty =$('.cart_product_qty_'+ id).val();
	var _token =$('input[name="_token"]').val();
	if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
            alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
     }else{

	$.ajax ({
		url: '{{url('/add-cart-ajax')}}',
		method: 'POST',
		data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,
			cart_product_price:cart_product_price, cart_product_qty: cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity },
			success:function(data){
				swal({
                                title: "Product added to cart",
                                text: "You can continue to purchase or go to the shopping cart to proceed to checkout",
                                showCancelButton: true,
                                cancelButtonText: "See more",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Go to cart",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });
							
			}
	});
				}
});
});
</script>

<script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
        });
          
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh =='' && xaid ==''){
                    alert('Làm ơn chọn để tính phí vận chuyển');
                }else{
                    $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                       location.reload(); 
                    }
                    });
                } 
        });
    });
    </script>
  
</body>
</html>