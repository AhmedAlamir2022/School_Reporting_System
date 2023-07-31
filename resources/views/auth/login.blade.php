@extends('includes.master2')
@section('title')
تسجيل الدخول - MOTIVATION RECREATED
@stop
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid" style="">
			<div class="row no-gutter">
                
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-6 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<h6><img src="{{URL::asset('assets/img/logo1.PNG')}}" style="width: 150px; height: 120px;" class="main-logo" alt="logo"></h6>
										<h5 class="main-logo">MOTIVATION RECREATED</h5><br><br>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>مرحبا بك سوبر ادمن !!</h2><br><br>
												<h5 class="font-weight-semibold mb-4">من فضللك ادخل بيانات تسجيل الدخول !</h5>
												<form method="POST" action="{{ route('login') }}">
                                                    @csrf
													<div class="form-group">
														<label>البريد الالكترونى</label> 
                                                        <input placeholder="أدخل البريد الالكترونى" type="email" name="email" required="" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" autofocus>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
													</div>
													<div class="form-group">
														<label>كلمه المرور</label> 
                                                        <input placeholder="أدخل كلمه المرور" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
													</div><button type="submit" class="btn btn-main-primary btn-block">تسجيل الدخول</button>
													<!--<div class="flex items-center justify-end mt-4">
														@if (Route::has('password.request'))
															<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
																{{ __('هل نسيت كلمه السر ؟') }}
															</a>
														@endif
											
														
													</div>-->
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-6 d-none d-md-flex bg-primary-transparent">
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