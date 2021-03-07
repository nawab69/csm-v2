@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Trades History</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Trades History</li>
            </ol>
        </div>
    </div>


    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card">
                    <div class="card-title">
                        <h4>My Trades History</h4></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>TRADE ID</th>
                                    <th>Buyer Name</th>
                                    <th>Seller Name</th>
                                    <th>Trade Type</th>
                                    <th>Currency</th>
                                    <th>Method</th>
                                    <th>Amount</th>
                                    <th>Fee</th>
                                    <th>Total</th>
                                    <th>Created At</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trades as $trade)
                                    <tr>
                                        <td>{{$trade->trx_id}}</td>
                                        <td>{{$trade->buyer->username}}</td>
                                        <td>{{$trade->seller->username}}</td>
                                        <td>{{\Illuminate\Support\Str::upper($trade->offer->type)}}</td>
                                        <td>{{$trade->offer->currency->name}}</td>
                                        <td>{{$trade->offer->method->name}}</td>
                                        <td>{{$trade->amount}}</td>
                                        <td>{{$trade->fee}}</td>
                                        <td>{{$trade->total}}</td>
                                        <td>{{\Carbon\Carbon::parse($trade->created_at)->diffForHumans()}}</td>

                                        @if($trade->buyer->user_id === auth()->user()->id)
                                        <td>
                                            <a href="{{route('trades.buy.info',$trade->trx_id)}}" class="btn btn-sm round btn-outline-info"> Details</a>
                                        </td>
                                        @else
                                            <td>
                                                <a href="{{route('trades.sell.info',$trade->trx_id)}}" class="btn btn-sm round btn-outline-info"> Details</a>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                            <div class="d-flex justify-content-center">
                                <div>{{$trades->links()}}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->






    </div>
    <!-- End Container fluid  -->
@endsection

@push('js')
    <!--Custom JavaScript -->
    <script src="{{asset('assets/dashboard/js/lib/webticker/jquery.webticker.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/lib/peitychart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dashboard-1.js')}}"></script>
{{--    <script src="{{asset('js/delete.js')}}"></script>--}}
@endpush
