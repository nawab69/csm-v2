@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Giftcard Trade History</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Giftcard Trade History</li>
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
                    <div class="card-title d-flex justify-content-between">

                        <h2>Giftcard Sell History</h2>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Trx ID</th>
                                    <th>Card Name</th>
                                    <th>Amount</th>
                                    <th>Sell Amount</th>
                                    <th>Currency</th>
                                    <th>Status</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sells as $key=>$bank)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$bank->trx_id}}</td>
                                        <td>{{$bank->giftcard->name}}</td>
                                        <td>{{$bank->amount}}</td>
                                        <td>{{$bank->get_amount}}</td>
                                        <td>{{$bank->currency}}</td>
                                        <td>{{$bank->status}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->


        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card">
                    <div class="card-title d-flex justify-content-between">

                        <h2>Giftcard Buy History</h2>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Trx ID</th>
                                    <th>Card Name</th>
                                    <th>Amount</th>
                                    <th>Buy Amount</th>
                                    <th>Currency</th>
                                    <th>Status</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($buys as $key=>$bank)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$bank->trx_id}}</td>
                                        <td>{{$bank->giftcardbuy->name}}</td>
                                        <td>{{$bank->amount}}</td>
                                        <td>{{$bank->get_amount}}</td>
                                        <td>{{$bank->currency}}</td>
                                        <td>{{$bank->status}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
