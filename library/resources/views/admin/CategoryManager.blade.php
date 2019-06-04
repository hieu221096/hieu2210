@extends('master-admin')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
      <!-- partial -->
        <div class="content-wrapper">
          <div class="page-header">
            <h1>Quản Lý Danh Mục</h1>
            </div>
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Category Table</h4>
                  <p class="card-description">
                    <a href="{{route('add-cate')}}"> Thêm Category </a>
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
                          Description
                        </th>
                        <th>
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($cate as $ct)
                      <tr>
                        <td class="py-1">
                          {{$ct->id}}
                        </td>
                        <td>
                          {{$ct->name}}
                        </td>
                        <td>
                          {{$ct->description}}
                        </td>
                        <td>
                        	<a href="{{route('edit-cate',$ct->id)}}">Edit</a>
                        </td>
                        <td>
                        	<a href="{{route('del-cate',$ct->id)}}" onclick="checkdelete()"> Delete </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
      <!-- main-panel ends -->
@endsection