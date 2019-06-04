@extends('master')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trangchu')}}">Trang chủ</a> 
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>

<div class="container">
	<div id="content">
		
		<form action="{{route('order')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">@if(Session::has('thongbao')){{Session::get('thongbao')}}@endif</div>
			<div class="row">
				<div class="col-sm-6">
					<h4>Đặt hàng</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="name">Họ tên*</label>
						<input type="text" name="name" value="{!!old('name')!!}" placeholder="Họ tên">
						    @if ($errors->has('name'))
        						<p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('name') }}</p>
    						@endif
					</div>
					<div class="form-block">
						<label>Giới tính </label>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>			
					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" value="{!!old('email')!!}" name="email" placeholder="expample@gmail.com">
					    @if ($errors->has('email'))
					        <p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('email') }}</p>
					    @endif
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" value="{!!old('address')!!}" name="address" placeholder="Street Address">
						    @if ($errors->has('address'))
        						<p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('address') }}</p>
   							@endif
					</div>
					

					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" value="{!!old('phone')!!}" name="phone">
    @if ($errors->has('phone'))
        <p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('phone') }}</p>
    @endif
					</div>
					
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea id="notes" value="{!!old('notes')!!}" name="notes"></textarea>
    @if ($errors->has('notes'))
        <p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('notes') }}</p>
    @endif
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
								@if(Session::has('cart'))
								@foreach($product_cart as $cart)
								<!--  one item	 -->
									<div class="media">
										<img width="25%" src="layout/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
										<div class="media-body">
											<p class="font-large">{{$cart['item']['name']}}</p>
											<span class="color-gray your-order-info">Đơn giá: {{number_format($cart['price'])}} VND</span>
											<span class="color-gray your-order-info">Số lượng: {{$cart['qty']}}</span>
										</div>
									</div>
								<!-- end one item -->
								@endforeach
								@endif
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
								<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif đồng</h5></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
						
						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="" name="payment">
									<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>						
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="" name="payment">
									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ TK: Nguyễn A
										<br>- Ngân hàng ACB, Chi nhánh TPHCM
									</div>						
								</li>
								
							</ul>
						</div>
						<div class="text-center">
							@if(Auth::check())
							<button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button>
							@else
							<button type="submit" onclick="return Login();" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button>
							@endif
						</div>
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection