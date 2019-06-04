@extends('master-admin')
@section('content')
<div class="row">
	        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 >Add User</h1>
                  <p class="card-description">
                    Form Add user
                  </p>
                  <form class="forms-sample" action="{{route('adduser')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Email</label>
                      <input type="email" class="form-control" name="email" value="{!!old('email')!!}" placeholder="Email">
                    @if ($errors->has('email'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('email') }}</p>
                    @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Full Name</label>
                      <input type="text" class="form-control" name="name" value="{!!old('name')!!}" placeholder="Full Name">
                    @if ($errors->has('name'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('name')}} </p>
                    @endif  
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Address</label>
                      <input type="text" class="form-control" name="address" value="{!!old('address')!!}" placeholder="Address">
                    @if ($errors->has('address'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('address') }}</p>
                    @endif                                             
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phone</label>
                      <input type="text" class="form-control" name="phone" value="{!!old('phone')!!}" placeholder="Phone">
                    @if ($errors->has('phone'))
                    <p class="help is-danger" style=" color: red;">{{ $errors->first('phone') }}</p>
                    @endif                       
                    </div>
                    <div class="form-block">
                      <label for="phone">Password*</label>
                      <input type="password" class="form-control" placeholder="Password" id="exampleInputEmail1" name="password" ">
                      @if ($errors->has('password'))
                            <p class="help is-danger" style=" color: red;">{{ $errors->first('password') }}</p>
                        @endif  
                    </div>
                    <div class="form-block">
                      <label for="phone">Re password*</label>
                      <input type="password" class="form-control" id="exampleInputEmail1" placeholder="RePassword" name="Repassword"">
                      @if ($errors->has('Repassword'))
                            <p class="help is-danger" style=" color: red;">{{ $errors->first('Repassword') }}</p>
                        @endif                
                    </div>
                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Level</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="level" id="membershipRadios1" value="admin" checked>
                                Admin
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="level" id="membershipRadios2" value="user">
                                User
                              </label>
                            </div>
                          </div>
                        </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">ADD</button>
                  </form>
                </div>
              </div>
            </div>
        </div>    
@endsection