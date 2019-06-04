@extends('master-admin')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
	    <div class="content-wrapper">
          <div class="page-header">
            <h1>Quản Lý Sản Phẩm</h1>
            </div>
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product Table</h4>
                  <p class="card-description">
                    <a href="{{route('Add-Product')}}"> Thêm Product </a>
                  </p>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Id-type
                        </th>
                        <th>
                          description
                        </th>
                        <th>
                          unit-price
                        </th>
                        <th>
                          promotion-price
                        </th>
                        <th>
                          Action
                        </th>                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($Product as $Pro)
                      <tr>
                      	<td>
                        	{{$Pro->id}}
                        </td>
                        <td>
                        	{{$Pro->name}}
                        </td>
                      	<td>
                        	{{$Pro->id_type}}
                        </td>
                      	<td>
                        	{{$Pro->description}}
                        </td>
                      	<td>
                        	{{$Pro->unit_price}}
                        </td>
                      	<td>
                        	{{$Pro->promotion_price}}
                        </td> 
                        <td>
                        	<a href="{{route('Edit-Product',$Pro->id)}}">Edit</a>
                        </td>
                        <td>
                        	<a href="{{route('Del-Product',$Pro->id)}}" onclick="checkdelete()"> Delete </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
@endsection