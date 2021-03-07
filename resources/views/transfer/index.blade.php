@extends('layouts.user.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('title','Transfer Crypto between main and Trade wallet')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Transfer</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Transfer</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card py-5 px-5">
                    <div class="card-body">
                        <h4 class="card-title text-center">Transfer Crypto between main and Trade wallet</h4>
                        <div>
                            <div class="alert alert-info">
                                You can make Internal Transaction , Trade Crypto with Fiat and other crypto , make p2p trade from your Trade wallet.
                            </div>

                        </div>
                        <hr>
                        <div class="text-center mt-5">
                            MAIN WALLET TO TRADE WALLET
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-outline-warning m-5" href="{{route('transfer.btc')}}"><i style="font-size: 40px" class="cc BTC mr-2"></i>TRANSFER BTC</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-outline-secondary m-5" href="{{route('transfer.eth')}}"><i style="font-size: 40px" class="cc ETH mr-2"></i>TRANSFER ETH</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-outline-info m-5" href="{{route('transfer.ltc')}}"><i style="font-size: 40px" class="cc LTC mr-2"></i>TRANSFER LTC</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-outline-success m-5" href="{{route('transfer.doge')}}"><i style="font-size: 40px" class="cc DOGE mr-2"></i>TRANSFER DOGE</a>
                            </div>

                        </div>
                        <hr>
                        <div class="text-center mt-5">
                             TRADE WALLET TO MAIN WALLET
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-outline-warning m-5" href="{{route('transfer.btc.reverse')}}"><i style="font-size: 40px" class="cc BTC mr-2"></i>TRANSFER BTC</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-outline-secondary m-5" href="{{route('transfer.eth.reverse')}}"><i style="font-size: 40px" class="cc ETH mr-2"></i>TRANSFER ETH</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-outline-info m-5" href="{{route('transfer.ltc.reverse')}}"><i style="font-size: 40px" class="cc LTC mr-2"></i>TRANSFER LTC</a>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-outline-success m-5" href="{{route('transfer.doge.reverse')}}"><i style="font-size: 40px" class="cc DOGE mr-2"></i>TRANSFER DOGE</a>
                            </div>

                        </div>
                        <hr>

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
    <script src="{{asset('js/dashboard.js')}}"></script>
@endpush
