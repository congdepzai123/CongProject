@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Home</a></li>
				  <li class="active">Your cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
            <?php
            $content = Cart::content();
            
            ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    @foreach($content as $v_content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}"
                                width="100" alt="" /></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->price).' '.'VNĐ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form active="{{URL::to('/update-cart-quantity')}}" method="get">
									{{@csrf_field()}}
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}"  size="2">
									<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
                                <?php
                                $subtotal = $v_content->price * $v_content->qty ;
                                echo number_format($subtotal).' '.'VNĐ';
                                ?>
                                
                                </p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						@endforeach 
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	 <section id="do_action">
		<div class="container">
			<div class="heading">
				{{--<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>--}}
			</div> 
			<div class="row">
		
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng  <span>{{Cart::total(0).' '.'VNĐ'}}</span></li>
							<li>Thuế <span>{{Cart::tax(0).' '.'VNĐ'}}</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành tiền <span>{{Cart::total(0).' '.'VNĐ'}}</span></li>
						</ul>
						{{--	<a class="btn btn-default update" href="">Update</a> --}}
						<?php
									$customer_id = Session::get('customer_id');
									if($customer_id != NULL){
								?>
								<center><a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a></center>
								<?php
								}else{
									?>
								<center><a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a></center>
								<?php
								}
								?>
						
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection