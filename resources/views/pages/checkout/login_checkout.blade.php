@extends('layout')
@section('content')
<center><a style="color:Orange"><h1>Account login page</h1></a></center>
<section id="form"><!--form-->

		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
					@if(session()->has('message'))
							<div class="alert alert-success">
								{!! session()->get('message') !!}
							</div>
							@elseif(session()->has('error'))
							<div class="alert alert-danger">
								{!! session()->get('error') !!}
							</div>
							@endif
						<h2>Login</h2>
						<form action="{{URL('/login-customer')}}" method="POST">
						{{@csrf_field()}}
							<input type="text" name="email_account" placeholder="Account" />
							<input type="password" name="password_account" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Remember login
							</span>
							<span>
								<!-- <a href="{{url('/quen-mat-khau')}}">Forget password</a> -->
							</span>

							<button type="submit" class="btn btn-default">Login</button>
						</form>


						<style type="text/css">

							ul.list-login {
							    margin: 10px;
							    padding: 0;
							}
							ul.list-login li {
							    display: inline;
							    margin: 5px;
							}
							
						</style>

						<ul class="list-login">

							<li>
								<a href="{{url('login-customer-google')}}">
									<img width="10%" alt="Đăng nhập bằng tài khoản google"  src="{{asset('public/frontend/images/gg.png')}}">
								</a>
							</li>
							
							<li>
								<a href="{{url('login-facebook-customer')}}">
									<img width="10%" alt="Đăng nhập bằng tài khoản facebook"  src="{{asset('public/frontend/images/fb1.png')}}">
								</a>
							</li>
						</ul>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Or</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Register</h2>
						<form action="{{URL::to('/add-customer')}}" method="POST">
						
						{{@csrf_field()}}
							<input type="text" name="customer_name" placeholder="Name"/>
							<input type="email" name="customer_email" placeholder="Email"/>
							<input type="password" name="customer_password" placeholder="Password"/>
							<input type="text" name="customer_phone" placeholder="Phone"/>
							
							@if($errors->has('g-recaptcha-response'))
							<span class="invalid-feedback" style="display:block">
								<strong>{{$errors->first('g-recaptcha-response')}}</strong>
							</span>
							@endif
						<div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
						<br/>
							<button type="submit" class="btn btn-default">Register</button>
						</form>
					
							

					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->



@endsection