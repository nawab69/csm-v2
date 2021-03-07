@extends('layouts.user.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
@endpush

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Trade Now</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Trade Now</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row justify-content-center">

            <div class="col-lg-6">
                <div class="card py-5 px-5">
                    <div class="card-body">
                        <h4 class="card-title">Trade Details</h4>

                        @if($trade->status == 'paid')
                                <div class="card">
                                    <span class="alert alert-info">
                                        Buyer has mark this trade as paid. Do you want to complete the trade ? if there any issue or not paid please click on dispute !
                                    </span>
                                    <div class="d-flex justify-content-around">
                                        <a href="#" onclick="completeTrade()" class="btn btn-success">Complete</a>
                                        <a href="#" onclick="disputeTrade()" class="btn btn-danger">Dispute</a>

                                        <form id="dispute-trade" action="{{route('trades.sell.update',$trade->trx_id)}}" method="post">
                                            @csrf
                                            <input type="text" hidden name="status" value="dispute">
                                        </form>

                                        <form id="complete-trade" action="{{route('trades.sell.update',$trade->trx_id)}}" method="post">
                                            @csrf
                                            <input type="text" hidden name="status" value="complete">
                                        </form>

                                    </div>

                                </div>
                        @endif
                        @if($trade->status == 'dispute')
                            <div class="card">
                                    <span class="alert alert-info">
                                        Order Has been Dispute. an admin staff will check this and back to you soon
                                    </span>
                            </div>
                        @endif
                        @if($trade->status == 'waiting')
                            <div class="card">
                                    <span class="alert alert-warning">
                                        Buyer didn't paid yet.
                                    </span>
                                <div class="d-flex justify-content-around">
                                    <a href="#" onclick="cancelTrade()" class="btn btn-danger">Cancel</a>
                                    <a href="#" onclick="completeTrade()" class="btn btn-warning">Complete</a>

                                    <form id="cancel-trade" action="{{route('trades.sell.update',$trade->trx_id)}}" method="post">
                                        @csrf
                                        <input type="text" hidden name="status" value="cancel">
                                    </form>

                                    <form id="complete-trade" action="{{route('trades.sell.update',$trade->trx_id)}}" method="post">
                                        @csrf
                                        <input type="text" hidden name="status" value="complete">
                                    </form>

                                </div>

                            </div>

                        @endif

                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">Offer Name</td>
                                <td>{{$trade->offer->title}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Offer Description</td>
                                <td>{{$trade->offer->extra_info ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Buyer Username</td>
                                <td>{{$trade->buyer->username ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Seller Username</td>
                                <td>{{$trade->seller->username ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Currency</td>
                                <td>{{$trade->offer->currency->name ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Sell For</td>
                                <td>{{$trade->offer->method->name ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Amount</td>
                                <td>{{$trade->amount ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Escrow Fee</td>
                                <td>{{$trade->fee ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Total Charge</td>
                                <td>{{$trade->total ?? 'N/A'}}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Rate</td>
                                <td>{{$trade->offer->rate ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Escrow Fee</td>
                                <td>{{ setting('trade_fee') .' %' ?? 0}}</td>
                            </tr>


                            <tr>
                                <td class="font-weight-bold">Payment Details</td>
                                <td>{{$trade->offer->payment_details ?? 'N/A'}}</td>
                            </tr>

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card py-5 px-5">
                    <div class="card-body">
                        <h4 class="card-title">Trade Now</h4>
                        <div id="app">
                            <v-container fluid>
                            <chat :user="{{auth()->user()}}" :trade="{{$trade->id}}"></chat>
                            </v-container>
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
    <script src="{{asset('js/app.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/dashboard/js/lib/webticker/jquery.webticker.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/lib/peitychart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dashboard-1.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>


@endpush
