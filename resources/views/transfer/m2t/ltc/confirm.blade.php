@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">TRANSFER LTC TO TRADE WALLET</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">TRANSFER LTC TO TRADE WALLET</li>
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
                        <h4 class="card-title">TRANSFER LTC TO TRADE WALLET</h4>
                        <h6 class="card-subtitle">Send Litecoin from your Main LTC wallet to Trade Wallet</h6>
                        <form method="post" action="{{route('transfer.ltc.send')}}">
                            @csrf
                            <div class="row mb-2 justify-content-around">
                                <div class="col-md-4">Amount To Send</div>
                                <div class="col-md-4">{{sprintf('%.8f',$amount)}}</div>
                            </div>
                            <div class="row mb-2 justify-content-around">
                                <div class="col-md-4">Estimate Blockchain Fee</div>
                                <div class="col-md-4">{{sprintf('%.8f',$fee)}}</div>
                            </div>
                            <div class="row mb-2 justify-content-around">
                                <div class="col-md-4">Total</div>
                                <div class="col-md-4">{{sprintf('%.8f',$total)}}</div>
                            </div>

                            <div id="send" class="row mb-2 justify-content-around">

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-dark waves-effect waves-light">Confirm</button>
                                    <a href="#" onclick="location.reload()" class="btn btn-dark waves-effect waves-light">Reset</a>
                                </div>
                                <div class="col-md-4"></div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- End Container fluid  -->
@endsection

@push('js')
    <!--Custom JavaScript -->
    <script src="{{asset('assets/dashboard/js/lib/webticker/jquery.webticker.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/lib/peitychart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dashboard-1.js')}}"></script>

@endpush
