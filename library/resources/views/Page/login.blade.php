@extends('master')
@section('content')
@if(session()->has('message'))
	    <div class="alert alert-success">
	        {{ session()->get('message') }}
	    </div>
@endif

</div>
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>
					<form method="POST" action="{{route('login1')}}" class="beta-form-checkout">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="form-block">
								<label for="email">Email*</label>
								<input type="text" name="email"  class="form-control">
							@if ($errors->has('email'))
        						<p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('email') }}</p>
    					@endif
							</div>
							<div class="form-block">
								<label for="phone">Password*</label>
								<input type="password" name="password"  class="form-control">
							@if ($errors->has('password'))
        						<p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('password') }}</p>
    						@endif	
							</div>
							<div class="form-block">
								<button type="submit" class="btn btn-primary">Login</button>
							</div>

					</form>

	<div style="width: 40%;">
	  <a class="btn btn-block btn-social btn-facebook" href="{{ route('facebook.login')}}" >
    		<span class="fa fa-facebook"></span> Sign in with Facebook
  		</a>
  	</div>
  	<div style="width: 40%; margin-top: 5px;">
  		  <a class="btn btn-block btn-social btn-google" href="{{url('/redirect')}}" >
    		<span class="fa fa-google"></span> Sign in with Google
  		</a>
	</div>

					</div>
					<div class="col-sm-3"></div>
				</div>
			
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
