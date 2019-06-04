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
            <h1>Quản Lý User</h1>
            </div>
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Table</h4>
                  <p class="card-description">
                    <a href="{{route('add-user')}}"> Thêm User </a>
                  </p>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          ID
                        </th>
                        <th>
                          Name Customer
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Phone
                        </th>
                        <th>
                          Level
                        </th>
                        <th>
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($User as $us)
                      <tr>
                        <td class="py-1">
                          {{$us->id}}
                        </td>
                        <td>
                          {{$us->name}}
                        </td>
                        <td>
                          {{$us->email}}
                        </td>
                        <td>
                          @if($us->phone == Null)
                            Chưa Nhập SDT
                          @else
                          {{$us->phone}}
                          @endif
                        </td>
                        <td>
                          {{$us->level}}
                        </td>
                        <td>
                          <a href="{{route('del-user', $us->id)}}" onclick="checkdelete()"> Delete </a>
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