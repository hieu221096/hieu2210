@extends('master-admin')
@section('content')
  <div class="row">
	        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 >Add Category</h1>
                  <p class="card-description">
                    Form Add Category
                  </p>
                  <form class="forms-sample" action="{{route('addCate')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input type="text" class="form-control" name="name" value="{!!old('name')!!}" placeholder="Full Name">
                    @if ($errors->has('name'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('name') }}</p>
                    @endif  
                    </div>
                    <div class="form-block">
                      <label for="description">Description</label>
                      <textarea type="text" style="height: 300px" class="form-control" id="exampleInputEmail1" name="description"  placeholder="Description For Your Category">{!!old('description')!!}</textarea>
                      @if ($errors->has('description'))
                            <p class="help is-danger" style=" color: red;">{{ $errors->first('description') }}</p>
                        @endif                
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">ADD</button>
                  </form>
                </div>
              </div>
            </div>
  </div>    
@endsection