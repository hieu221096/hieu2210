@extends('master')
@section('content')
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
							<h4>Sản Phẩm Các Loại</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($all_product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($all_product as $all)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('detail',$all->id)}}"><img src="layout/image/product/{{$all->image}}" height="250px" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$all->name}}</p>
											<p class="single-item-price" style="font-size: 15px">
												@if($all->promotion_price == 0)
													<span>{{number_format($all->unit_price)}} VND</span>
												@else
													<span class="flash-del">{{number_format($all->unit_price)}} VND |</span>
													<span class="flash-sale">{{number_format($all->promotion_price)}} VND</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('add-cart',$all->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('detail',$all->id)}}">Xem Chi Tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>						
						</div> <!-- .beta-products-list -->
						<div class="space50">&nbsp;</div>
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection