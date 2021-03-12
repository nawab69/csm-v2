@extends('layouts.user.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">ETH</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">ETH</li>
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
                        <h4 class="card-title">Eth Wallet</h4>
                        <div>
                            <div class="alert alert-info">
                                ETH wallet created Successfully. Please Keep this Secrets safely. Otherwise you will lost the access of your eth.
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">ETH Address :</div>
                                <div class="col-8"><code>{{\Illuminate\Support\Facades\Crypt::decryptString($wallet->address)}}</code></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">Public Key :</div>
                                <div class="col-8"><code>{{\Illuminate\Support\Facades\Crypt::decryptString($wallet->public_key)}}</code></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">Private Key :</div>
                                <div class="col-8"><code>{{\Illuminate\Support\Facades\Crypt::decryptString($wallet->private_key)}}</code></div>
                            </div>
                        </div>
                        <div>
                            <form action="{{route('eth.export')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-info"><i class="fa fa-download"></i> Export Key</button>
                            </form>
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
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script>
        $('.dropify').dropify();

        const selection = document.getElementById("payment_method");
        const payment = document.getElementById("details");
        selection.onchange = function(event){
            const details = event.target.options[event.target.selectedIndex].dataset.details;
            payment.innerHTML = "<br/> <strong> Please Pay to </strong> : <br/>"+details;
        };
    </script>
@endpush
