@extends('layouts.user.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
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
                        <h4 class="card-title">Offer Details</h4>

                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">Offer Name</td>
                                <td>{{$offer->title}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Offer Description</td>
                                <td>{{$offer->extra_info ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Seller Username</td>
                                <td>{{$offer->user->username ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Currency</td>
                                <td>{{$offer->currency->name ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Buy For</td>
                                <td>{{$offer->method->name ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Rate</td>
                                <td>{{$offer->rate ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Escrow Fee</td>
                                <td>{{ setting('trade_fee') .' %' ?? 0}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Payment Details</td>
                                <td>{{$offer->payment_details ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Total Trades</td>
                                <td>{{$offer->trades()->count() ?? 'N/A'}}</td>
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
                        <!-- form start -->
                        <form role="form" class="form-horizontal p-t-20" id="bankForm" method="POST"
                              action="{{route('trades.buy.store',$offer->id)}}"
                              enctype="multipart/form-data">
                            @csrf


                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 control-label">Amount*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-sticky-note"></i></div>
                                        <input type="number" name="amount"
                                               step="0.1"
                                               min="{{$offer->min}}"
                                               max="{{$offer->max}}"
                                               class="form-control form-type"
                                               id="amount"
                                               placeholder="Amount to Trade"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="payment_details" class="col-sm-3 control-label">Default Message</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea type="text" rows="3" style="height: 100%" class="form-control" id="payment_details" name="payment_details" placeholder="Set a default message for Traders &#10;&#10;Ex. Payment Details or Warning"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row m-b-0">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-dark waves-effect waves-light">Submit</button>
                                    <a href="#" onclick="location.reload()" class="btn btn-dark waves-effect waves-light">Reset</a>
                                </div>
                            </div>

                        </form>
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
