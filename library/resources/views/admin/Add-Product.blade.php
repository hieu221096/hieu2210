@extends('master-admin')
@section('content')
	<div class="row">
	        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 >Add Product</h1>
                  <p class="card-description">
                    Form Add product
                  </p>
                  <form class="forms-sample" action="{{route('AddProduct')}}" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" name="name" value="{!!old('name')!!}" placeholder="name">
                    @if ($errors->has('name'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('name') }}</p>
                    @endif
                    </div>
                    <div class="form-group">
                      	<label for="exampleInputEmail1">ID_type</label>
                    	<select class="form-control" name="Type">
							@foreach($Product as $PD)
								<option value="{{$PD->id}}">{{$PD->name}}</option>
							@endforeach	
						</select>
                    @if ($errors->has('ID_type'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('ID_type')}} </p>
                    @endif  
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <input type="text" class="form-control" name="description" value="{!!old('description')!!}" placeholder="Description">
                    @if ($errors->has('description'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('description') }}</p>
                    @endif                                             
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Unit_price</label>
                      <input type="text" class="form-control" name="unit_price" value="{!!old('unit_price')!!}" placeholder="Unit_price">
                    @if ($errors->has('unit_price'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('unit_price') }}</p>
                    @endif                       
                    </div>
                    <div class="form-block">
                      <label for="phone">Promotion_price</label>
                      <input type="text" class="form-control" value="{!!old('Promotion_price')!!}"  placeholder="Promotion price" id="exampleInputEmail1" name="Promotion_price" ">
                      @if ($errors->has('Promotion_price'))
                            <p class="help is-danger" style=" color: red;">{{ $errors->first('Promotion_price') }}</p>
                        @endif  
                    </div>
                    <div class="form-block">
                      <label for="phone">Image</label>
                      <input type="file" class="form-control-file" id="exampleInputEmail1" name="Image">
                      @if ($errors->has('Image'))
                            <p class="help is-danger" style=" color: red;">{{ $errors->first('Image') }}</p>
                        @endif                
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">ADD</button>
                  </form>
                </div>
              </div>
            </div>
        </div>    
@endsection