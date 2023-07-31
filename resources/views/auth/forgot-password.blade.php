@extends('includes.master2')
@section('title')
نسيت كلمه السر - MOTIVATION RECREATED
@stop
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<!-- /Loader -->
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<h6><img src="{{URL::asset('assets/img/logo1.PNG')}}" style="width: 150px; height: 120px;" class="main-logo" alt="logo"></h6>
										<h5 class="main-logo">MOTIVATION RECREATED</h5><br><br>
									<div class="main-card-signin d-md-flex">
										<div class="wd-100p">
											<div class="main-signin-header">
												<div class="">
													<h2>مرحبا مجدد !</h2>
													<h4 class="text-left">هل نسيت كلمه السر ؟</h4>
													<form method="POST" action="{{ route('password.email') }}">
                                                        @csrf
														<div class="form-group text-left">
															<label>البريد الالكترونى</label>
															<input class="form-control" placeholder="أدخل البريد الالكترونى" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus>
														</div>
														
														<button type="submit" class="btn ripple btn-main-primary btn-block">ارسال ايميل</button>
													</form>
												</div>
											</div>
											<div class="main-signup-footer mg-t-20">
												<p>هل لديك حساب بالفعل ؟ <a href="{{ route('login') }}">تسجيل الدخول </a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('assets/img/welcome.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
			</div>
		</div>
	
		@endsection
@section('js')
@endsection
		

