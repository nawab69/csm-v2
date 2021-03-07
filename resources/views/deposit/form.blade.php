@extends('layouts.user.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Deposit</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Deposit</li>
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
                        <h4 class="card-title">Deposit</h4>
                        @if($type==='bank')
                        <h6 class="card-subtitle">Deposit Your wallet from Your Bank</h6>
                        <div>
                            Deposit Details:
                            <br>
                            <code style="font-size:1.2em;color: gray;">
                                Bank Name : {{setting('bank_name')}}
                                <br>
                                Bank Account Holder : {{setting('account_holder')}}
                                <br>
                                Bank Account No : {{setting('account_no')}}
                                <br>
                                Swift code : {{setting('swift_code')}}
                                <br>
                                Bank Details : {{setting('bank_details')}}
                            </code>
                        </div>
                        @endif
                        <!-- form start -->
                        <form role="form" class="form-horizontal p-t-20" id="bankForm" method="POST"
                              action="{{route('user.deposit.store')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="sell_currency" class="col-sm-3 control-label">Select Currency</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Select Currency</label>
                                        <select id="sell_currency" name="currency" class="form-control">

                                            @foreach($currency as $cc)
                                            <option value="{{$cc->id}}">{{$cc->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 control-label">Deposit Amount*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <input type="text" name="amount"
                                               class="form-control form-type"
                                               id="amount"
                                               placeholder="Deposit Amount"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>

                            @if($type === 'bank')

                            <div class="form-group row">
                                <label for="bank_name" class="col-sm-3 control-label">Bank Name*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                        <input type="text" name="bank_name"
                                               class="form-control form-type"
                                               id="bank_name"
                                               placeholder="Bank Name"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="account_holder" class="col-sm-3 control-label">Account Holder*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user-o"></i></div>
                                        <input type="text" name="account_holder"
                                               class="form-control form-type"
                                               id="account_holder"
                                               placeholder="Account Holder"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="account_no" class="col-sm-3 control-label">Account No*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                        <input type="text" name="account_no"
                                               class="form-control form-type"
                                               id="account_no"
                                               placeholder="Account No"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="swift_code" class="col-sm-3 control-label">Swift Code*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-hashtag"></i></div>
                                        <input type="text" name="swift_code"
                                               class="form-control form-type"
                                               id="swift_code"
                                               placeholder="Swift Code"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="branch_details" class="col-sm-3 control-label">Branch Details *</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea type="text" rows="2" style="height: 100%" class="form-control" id="branch_details" name="branch_details" placeholder="Enter your Branch / Bank Address"></textarea>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="form-group row">
                                    <label for="sell_currency" class="col-sm-3 control-label">Select Payment Method</label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>Select Payment Method</label>
                                            <select id="payment_method" name="payment_method" class="form-control">
                                                <option data-details=" ">Select a Payment Method</option>
                                                @foreach($payment_methods as $pm)
                                                    <option data-details="{{$pm->details}}" value="{{$pm->id}}">{{$pm->name}}</option>
                                                @endforeach
                                            </select>
                                            <div id="details"></div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="note" class="col-sm-3 control-label">Your Payment Details</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea type="text" rows="2" style="height: 100%" class="form-control" id="note" name="note" placeholder="Additional Note"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-3 control-label">Deposit Image*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="file" name="image"
                                               class="dropify"
                                               id="image"
                                               required autofocus>
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
