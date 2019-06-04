@extends('master-admin')
@section('content')
<div class="row">
	        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 >Edit Category</h1>
                  <p class="card-description">
                    Form Edit Category
                  </p>
                  @foreach($EditCate as $EC)
                  <form class="forms-sample" action="{{route('EditCate', $EC->id)}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input type="text" class="form-control" name="name" value="{{$EC->name}}" placeholder="Full Name">
                    @if ($errors->has('name'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('name') }}</p>
                    @endif  
                    </div>
                    <div class="form-block">
                      <label for="description">Description</label>
                      <textarea type="text" style="height: 300px" class="form-control" id="exampleInputEmail1" name="description"  placeholder="Description For Your Category">{{$EC->description}}</textarea>
                      @if ($errors->has('description'))
                            <p class="help is-danger" style=" color: red;">{{ $errors->first('description') }}</p>
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