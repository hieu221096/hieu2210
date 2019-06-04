@extends('master')
@section('content')
@if(session()->has('alert'))
	    <div class="alert alert-success">
	        {{ session()->get('alert') }}
	    </div>
@endif
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('sign-up')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" class="form-control" value="{!!old('email')!!}" >
						    @if ($errors->has('email'))
        						<p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('email') }}</p>
    						@endif							
						</div>

						<div class="form-block">
							<label for="your_last_name">Họ Tên*</label>
							<input type="text" name="name" value="{!!old('name')!!}" class="form-control">
						    @if ($errors->has('name'))
        						<p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('name') }}</p>
    						@endif							
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" name="address" value="{!!old('address')!!}" class="form-control">
						    @if ($errors->has('address'))
        						<p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('address') }}</p>
    						@endif							
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" value="{!!old('phone')!!}" class="form-control" >
						    @if ($errors->has('phone'))
        						<p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('phone') }}</p>
    						@endif							
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" class="form-control" name="password" ">
							@if ($errors->has('password'))
        						<p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('password') }}</p>
    						@endif	
						</div>
						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" class="form-control" name="Repassword"">
							@if ($errors->has('Repassword'))
        						<p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('Repassword') }}</p>
    						@endif								
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
