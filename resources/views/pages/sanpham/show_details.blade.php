@extends('layout')
@section('content')
@foreach($product_details as $key =>$value)
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="" />
								<h3>Hot</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="{{URL::to('/public/frontend/images/simi1.jpg')}}" style="width:25%;" alt=""></a>
										  <a href=""><img src="{{URL::to('/public/frontend/images/simi2.jpg')}}" style="width:25%;" alt=""></a>
										  <a href=""><img src="{{URL::to('/public/frontend/images/simi3.jpg')}}" style="width:25%;" alt=""></a>
										</div>
										
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

							

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->product_name}}</h2>
								<p>Mã ID: {{$value->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								
								<form action="{{URL::to('/save-cart')}}" method="POST">
									@csrf
									<input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                                            <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                                            <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
											<input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">
                                            <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                          
								<span>
									<span>{{number_format($value->product_price,0,',','.').'VNĐ'}}</span>
								
									<label>Số lượng:</label>
									<input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1" />
									<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
								</span>
								<input type="button" value="Add to cart" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
								</form>

								<p><b>Status:</b> In stock</p>
								<p><b>Condition:</b> New 100%</p>
								<p><b>Brand:</b> {{$value->brand_name}}</p>
								<p><b>Category:</b> {{$value->category_name}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
							</div>
					

                    <div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li ><a href="#details" data-toggle="tab">Product Description</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Product details</a></li>
								
								<li class="active" ><a href="#reviews" data-toggle="tab">Review (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane " id="details" >
								<p>{!!$value->product_desc!!}</p>
								
							</div>

							
							<div class="tab-pane fade" id="companyprofile" >
								
							<p>{!!$value->product_content!!}</p>
							</div>
							
							
							
							<div class="tab-pane fade active in " id="reviews" >
								<div class="col-sm-12">
								
									<ul>
										<li><a href=""><i class="fa fa-user"></i>Admin</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>1.10.2021</a></li>
									</ul>
									<style type="text/css">
										.style_comment {
										    border: 1px solid #ddd;
										    border-radius: 10px;
										    background: #F0F0E9;
										}
										
									</style>
									
									<form>
										@csrf
										<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
										<div id="comment_show"></div>
									
									</form>
									
									<p><b>Rating :</b></p>
									  <!------Rating here---------->
									  <ul class="list-inline rating"  title="Average Rating">
                                                	@for($count=1; $count<=5; $count++)
                                                		@php
	                                                		if($count<=$rating){
	                                                			$color = 'color:#ffcc00;';
	                                                		}
	                                                		else {
	                                                			$color = 'color:#ccc;';
	                                                		}
	                                                	
                                                		@endphp
                                                	
                                                    <li title="star_rating" id="{{$value->product_id}}-{{$count}}" data-index="{{$count}}"  data-product_id="{{$value->product_id}}" data-rating="{{$rating}}" class="rating" style="cursor:pointer; {{$color}} font-size:30px;">&#9733;</li>
                                                    @endfor

                                                </ul>
                                                
									
									<form action="#">
									<p><b>Write your review :</b></p>
										<span>
											<input style="width:100%;margin-left:0" type="text" class="comment_name" placeholder=" Name"/>
											
										</span>
										
										
										<textarea name="comment" class="comment_content"  placeholder=" Comment" ></textarea>
										<div id="notify_comment"></div>
										<b> </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right send-comment">
											Submit
										</button>
										
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					@endforeach
                    <div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Related products</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								@foreach($related as $key => $lienquan)	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
										<div class="single-products">
										<div class="productinfo text-center">
										
											<img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
											
											<h2>{{number_format($lienquan->product_price).' '.'VNĐ'}}</h2>
											<p>{{$lienquan->product_name}}</p>
										
											<a href ="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
								</div>
							</div>
										
					</div>
								@endforeach
									
					</div>
							</div>
									
						</div>
					</div><!--/recommended_items-->
					{{--   <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$relate->links()!!}
                      </ul> --}}

 @endsection