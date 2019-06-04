@extends('master-admin')
@section('content')
	    <div class="content-wrapper">
          <div class="page-header">
            <h1>Chi Tiết Đơn Hàng Của Người Dùng :@foreach($total as $T) {{$T->name}} @endforeach</h1>
            </div>
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bill Detail Table</h4>
                  <p class="card-description">
                  </p>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          ID_Bill
                        </th>
                        <th>
                          Product name
                        </th>
                        <th>
                          Số Lượng
                        </th>
                        <th>
                          Đơn Giá
                        </th>
                        <th>
                          Tổng Tiền Mỗi Loại
                        </th>                                                
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($BillProduct as $BPD)
                      <tr>
                        <th>
                          {{$BPD->id_bill}}
                        </th>
                        <th>  
                          {{$BPD->name}}
                        </th>
                        <th>
                          {{$BPD->quantity}}
                        </th>
                        <th>
                          @if($BPD->promotion_price == 0)
                            {{$BPD->unit_price}}
                          @else
                            {{$BPD->promotion_price}}
                          @endif
                        </th>
                        <th>
                          @if($BPD->promotion_price == 0)
                            {{$BPD->unit_price * $BPD->quantity}}
                          @else
                            {{$BPD->promotion_price * $BPD->quantity}}
                          @endif
                        </th> 
                      	</tr>
                        @endforeach
                        <th>
                          <h4>
                            Tổng Tiền Hóa Đơn: @foreach($total as $T)
                              {{number_format($T->total)}}VND
                            @endforeach
                          </h4>
                        </th>
                    </tbody>                    
                  </table>
                </div>
              </div>
        </div>
@endsection
