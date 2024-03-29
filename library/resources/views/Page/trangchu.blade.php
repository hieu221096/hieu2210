@extends('master')
@section('content')
@if(session()->has('message'))
	    <div class="alert alert-success" id ="none">
	        {{ session()->get('message') }}
	    </div>
@endif
<script type="text/javascript">
		var hidden = function(){
			document.getElementById('none').style.display = "none";
		}
		setTimeout(hidden,5000);
</script>
	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									@foreach($slide as $sl)
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="layout/image/slide/{{$sl->image}}" data-src="layout/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('layout/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						       		 </li>
						       		 @endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản Phẩm Mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm Thấy {{count($new_product)}} Sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_product as $new)
								<div class="col-sm-3">
									<div class="single-item">
											@if($new->promotion_price != 0)
											<div class="ribbon-wrapper" ><div class="ribbon sale">Sale</div></div>
											@endif
										<div class="single-item-header">
											<a href="{{route('detail',$new->id)}}"><img src="layout/image/product/{{$new->image}}" height="250px" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
											<p class="single-item-price" style="font-size: 15px">
												@if($new->promotion_price == 0)
													<span>{{number_format($new->unit_price)}} VND</span>
												@else
													<span class="flash-del">{{number_format($new->unit_price)}} VND |</span>
													<span class="flash-sale">{{number_format($new->promotion_price)}} VND</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left"  href="{{route('add-cart',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('detail',$new->id)}}">Xem Chi Tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
								<div class="row" style="margin-left: 450px;">{{$new_product->links()}}
								</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản Phẩm Khuyến Mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm Thấy {{count($sale_product)}} Sản Phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sale_product as $sale)
								<div class="col-sm-3">
									<div class="single-item">
											<div class="ribbon-wrapper" ><div class="ribbon sale">Sale</div></div>										
										<div class="single-item-header">
											<a href="{{route('detail',$sale->id)}}"><img src="layout/image/product/{{$sale->image}}" height="250px" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sale->name}}</p>
											<p class="single-item-price" style="font-size: 15px">
												<span class="flash-del">{{number_format($sale->unit_price)}} VND |</span>
													<span class="flash-sale">{{number_format($sale->promotion_price)}} VND</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('add-cart',$sale->id)}}"><i class="fa fa-shopping-cart"></i></a>											
											<a class="beta-btn primary" href="{{route('detail',$sale->id)}}">Xem Chi Tiết<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
								<div class="row" style="margin-left: 450px;">{{$sale_product->links()}}
								</div>							
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection