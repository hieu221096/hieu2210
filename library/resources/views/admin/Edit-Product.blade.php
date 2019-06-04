@extends('master-admin')
@section('content')
	<div class="row">
	        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 >Edit Product</h1>
                  <p class="card-description">
                    Form Edit product
                  </p>
                  @foreach($OldProduct as $OPD)
                  <form class="forms-sample" action="{{route('EditProduct',$OPD->id)}}" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" name="name" value="{{$OPD->name}}" placeholder="name">
                    @if ($errors->has('name'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('name') }}</p>
                    @endif
                    </div>
                    <div class="form-group">
                      	<label for="exampleInputEmail1">ID_type</label>
                    	<select class="form-control" name="Type">
	                    		@foreach($ProductType as $PDT)
	                    			<option value="{{$PDT->id}}">{{$PDT->name}}</option>
								@endforeach	
								@foreach($TypeDif as $TD)
									<option value="{{$TD->id}}">{{$TD->name}}</option>
								@endforeach
						</select>
                    @if ($errors->has('ID_type'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('ID_type')}} </p>
                    @endif  
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" name="description" value="{{$OPD->description}}" placeholder="Description">
                    @if ($errors->has('description'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('description') }}</p>
                    @endif                                             
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Unit_price</label>
                      <input type="text" class="form-control" name="unit_price" value="{{$OPD->unit_price}}" placeholder="Unit_price">
                    @if ($errors->has('unit_price'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('unit_price') }}</p>
                    @endif                       
                    </div>
                    <div class="form-block">
                      <label for="phone">Promotion_price</label>
                      <input type="text" class="form-control" value="{{$OPD->promotion_price}}"  placeholder="Promotion price" id="exampleInputEmail1" name="Promotion_price" ">
                      @if ($errors->has('Promotion_price'))
                            <p class="help is-danger" style=" color: red;">{{ $errors->first('Promotion_price') }}</p>
                        @endif  
                    </div>
                    <div class="form-block">
                      <label for="phone">Image</label>
                      <input type="file" class="form-control-file"  id="exampleInputEmail1" name="Image"/>
                      <img src="layout/image/product/{{$OPD->image}}" width="250px">
                      @if ($errors->has('Image'))
                            <p class="help is-danger" style=" color: red;">{{ $errors->first('Image') }}</p>
                       @endif                
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">ADD</button>
                  </form>
                 @endforeach
                </div>
              </div>
            </div>
        </div>    
@endsection