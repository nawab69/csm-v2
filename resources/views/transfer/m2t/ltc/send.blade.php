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
            <div class="col-lg-8">
                <div class="card py-5 px-5">
                    <div class="card-body">
                        <h4 class="card-title">TRANSFER LTC TO TRADE WALLET</h4>
                        <h6 class="card-subtitle">Send Litecoin from your Main LTC wallet to Trade Wallet</h6>
                        <form class="form-horizontal p-t-20" method="post" action="{{route('transfer.ltc.check')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 control-label">Amount</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="cc LTC"></i></div>
                                        <input type="text" class="form-control form-type" id="amount" name="amount" placeholder="Enter Amount">
                                    </div>
                                    <h6 class="card-subtitle">Available Balance : {{$balance}} LTC</h6>
                                </div>
                            </div>

                            <div id="send" class="form-group row m-b-0">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-dark waves-effect waves-light">Next</button>
                                    <a href="#" onclick="location.reload()" class="btn btn-dark waves-effect waves-light">Reset</a>
                                </div>
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
