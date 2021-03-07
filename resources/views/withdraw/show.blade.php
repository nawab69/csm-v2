@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Withdraw</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Withdraw</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-lg-12">
                <div id="invoice" class="effect2">
                    <div id="invoice-top">
                        <div class="invoice-logo-wrap">
                            <div class="invoice-logo"></div>
                            <div class="invoice-info">
                                <h2>{{$withdraw->user->first_name}}  {{$withdraw->user->last_name}}</h2>
                                <p> {{$withdraw->user->email}} <br> {{$withdraw->user->phone}}
                                </p>
                            </div>
                        </div>

                        <!--End Info-->
                        <div class="title invoice-title">
                            <h4>Withdraw: {{$withdraw->trx_id}}</h4>
                            <p>Issued: {{\Carbon\Carbon::parse($withdraw->created_at)->toFormattedDateString()}}<br>
                            </p>
                        </div>
                        <!--End Title-->
                    </div>
                    <!--End InvoiceTop-->



                    <div class="d-flex justify-content-start">
                        <div class="fa fa-4x fa-bank mr-5"></div>
                            <div>
                                <p> <strong>Bank Name: </strong>{{$withdraw->bank->bank_name}} <br>
                                <strong>Account Holder: </strong>{{$withdraw->bank->account_holder}} <br>
                                <strong>Account No: </strong>{{$withdraw->bank->account_no}} <br>
                                <strong>Swift Code: </strong>{{$withdraw->bank->swift_code}} <br>
                                <strong>Branch Details: </strong>{{$withdraw->bank->branch_details}} <br>
                                </p>
                            </div>
                    </div>
                    <!--End Invoice Mid-->

                    <div id="invoice-bot">

                        <div id="invoice-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr class="tabletitle">
                                        <td class="table-item">
                                            <h2>Item Description</h2>
                                        </td>
                                        <td class="Hours">
                                            <h2>Amount</h2>
                                        </td>
                                        <td class="Rate">
                                            <h2>Fee</h2>
                                        </td>
                                        <td class="subtotal">
                                            <h2>Total</h2>
                                        </td>
                                    </tr>

                                    <tr class="service">
                                        <td class="tableitem">
                                            <p class="itemtext">Bank Withdraw</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">{{$withdraw->amount}} {{$withdraw->currency->display}}</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">{{$withdraw->fee}} {{$withdraw->currency->display}}</p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">{{$withdraw->total}} {{$withdraw->currency->display}}</p>
                                        </td>
                                    </tr>


                                    <tr class="tabletitle">
                                        <td></td>
                                        <td></td>
                                        <td class="Rate">
                                            <h2>Total</h2>
                                        </td>
                                        <td class="payment">
                                            <h2>{{$withdraw->total}} {{$withdraw->currency->display}}</h2>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <!--End Table-->


                        <div id="legalcopy">
                            <p class="legal"><strong>Thank you for your business!</strong> Withdraw will be completed to your bank within 3 days;
                            </p>
                        </div>

                    </div>
                    <!--End InvoiceBot-->
                </div>
                <!--End Invoice-->
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
    <script src="{{asset('js/delete.js')}}"></script>
@endpush
