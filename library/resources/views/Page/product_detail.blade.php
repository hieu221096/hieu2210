@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>Product</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="layout/image/product/{{$detail->image}}" height="250px" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h4>{{$detail->name}}</h4></p>
											<p class="single-item-price" style="font-size: 15px">Giá:
												@if($detail->promotion_price == 0)
													<span>{{number_format($detail->unit_price)}} VND</span>
												@else
													<span class="flash-del">{{number_format($detail->unit_price)}} VND |</span>
													<span class="flash-sale">{{number_format($detail->promotion_price)}} VND</span>
												@endif
											</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$detail->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số Lượng:</p>
							<form method="POST" action="{{route('add-many')}}">
								<div class="single-item-options">
									<select class="wc-select" name="quantity">
										<option value="">Số Lượng</option>
										@for($i=1 ; $i<=5 ; $i++ )
											<option value="{{$i}}"><?php echo $i; ?></option>
										@endfor
									</select>

									<input type="hidden" name="product_id" value="{{$detail->id}}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button class="add-to-cart" type="submit"><i class="fa fa-shopping-cart"></i></button>
							</form>
						@if ($errors->has('quantity'))
        						<p class="help is-danger" style="margin-left: 200px; color: red;">{{ $errors->first('quantity') }}</p>
    					@endif

								<div class="clearfix"></div>
							</div>
						</div>
						
							<div class="fb-share-button" data-href="https://localhost:8080/website/product-detail/{{$detail->id}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8080%2Fwebsite%2Fproduct-detail&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>						
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-comment">Comment</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p> {{$detail->description}} </p>
						</div>
						<div class="panel" id="tab-comment">
							<p><div type="submit" class="fb-comments" data-href="http://localhost:8080/website/product-detail/{{$detail->id}}" data-numposts="5"></div></p>
						</div>
					</div>

					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản Phẩm Tương Tự </h4>

						<div class="row">
							@foreach($same_product as $spd)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{route('detail',$spd->id)}}"><img src="layout/image/product/{{$spd->image}}" height="250px" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$spd->name}}</p>
											<p class="single-item-price" style="font-size: 15px">
												@if($spd->promotion_price == 0)
													<span>{{number_format($spd->unit_price)}} VND</span>
												@else
													<span class="flash-del">{{number_format($spd->unit_price)}} VND |</span>
													<span class="flash-sale">{{number_format($spd->promotion_price)}} VND</span>
												@endif
											</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('add-cart',$spd->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('detail',$spd->id)}}">Xem Chi Tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Danh Mục Sản Phẩm</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($category as $cate)
								<div class="media beta-sales-item">
									<div class="media-body">
										<a href="{{route('product', $cate->id)}}">{{$cate->name}}</a>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
