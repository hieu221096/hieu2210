@extends('master-admin')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
	    <div class="content-wrapper">
          <div class="page-header">
            <h1>Quản Lý Đơn Hàng</h1>
            </div>
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bill Table</h4>
                  <p class="card-description">
                  </p>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          ID
                        </th>
                        <th>
                          Customer Name
                        </th>
                        <th>
                          Address
                        </th>
                        <th>
                          Phone
                        </th>
                        <th>
                          date order
                        </th>                        
                        <th>
                          Note
                        </th>
                        <th>
                          Bill_Product
                        </th>                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($Bill as $B)
                      <tr>
                        <th>
                          {{$B->id1}}
                        </th>
                        <th>  
                          {{$B->name}}
                        </th>
                        <th>
                          {{$B->address}}
                        </th>
                        <th>
                          {{$B->phone_number}}
                        </th>
                        <th>
                          {{$B->date_order}}
                        </th> 
                        <th>
                          {{$B->note}}
                        </th>
                        <th>
                            <a href="{{route('Bill-Product',$B->id1)}}" onclick="checkdelete()">Bill Detail</a>
                        </th>                        
                      </tr>
                      @endforeach
                    </tbody>                    
                  </table>
                </div>
              </div>
        </div>
@endsection