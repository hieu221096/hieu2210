@extends('master')
@section('content')
	</div> <!-- #header -->
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<h4>Danh Mục</h4>
						<ul class="aside-menu">
							@foreach($list_type as $list)
							<li><a href="{{route('product', $list->id)}}">{{$list->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							@foreach($loai as $l)
							<h4>{{$l->name}}</h4>
							@endforeach
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($product_type)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product_type as $pdt)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('detail',$pdt->id)}}"><img src="layout/image/product/{{$pdt->image}}" height="250px" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pdt->name}}</p>
											<p class="single-item-price" style="font-size: 15px">
												@if($pdt->promotion_price == 0)
													<span>{{number_format($pdt->unit_price)}} VND</span>
												@else
													<span class="flash-del">{{number_format($pdt->unit_price)}} VND |</span>
													<span class="flash-sale">{{number_format($pdt->promotion_price)}} VND</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('add-cart',$pdt->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('detail',$pdt->id)}}">Xem Chi Tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
								<div class="row" style="margin-left: 350px;">{{$product_type->links()}}
								</div>							
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản Phẩm Khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($other_product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($other_product as $other)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('detail',$other->id)}}"><img src="layout/image/product/{{$other->image}}" height="250px" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$other->name}}</p>
											<p class="single-item-price" style="font-size: 15px">
												@if($other->promotion_price == 0)
													<span>{{number_format($other->unit_price)}} VND</span>
												@else
													<span class="flash-del">{{number_format($other->unit_price)}} VND |</span>
													<span class="flash-sale">{{number_format($other->promotion_price)}} VND</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('add-cart',$other->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('detail',$other->id)}}">Xem Chi Tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
								<div class="row" style="margin-left: 200px;">{{$other_product->links()}}
								</div>							
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
