@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Add Bank</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add Bank</li>
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
                        <h4 class="card-title">Send BTC</h4>
                        <h6 class="card-subtitle">Send Bitcoin from your BTC wallet to any btc address</h6>
                        <!-- form start -->
                        <form role="form" class="form-horizontal p-t-20" id="bankForm" method="POST"
                              action="{{ isset($bank) ? route('banks.update',$bank->id) : route('banks.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            @if (isset($bank))
                                @method('PUT')
                            @endif

                            <div class="form-group row">
                                <label for="bank_name" class="col-sm-3 control-label">Bank Name*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                        <input type="text" name="bank_name"
                                               class="form-control form-type"
                                               id="bank_name"
                                               placeholder="Bank Name"
                                               value="{{$bank->bank_name ?? ''}}"
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
                                               value="{{$bank->account_holder ?? ''}}"
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
                                               value="{{$bank->account_no ?? ''}}"
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
                                               value="{{$bank->swift_code ?? ''}}"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="branch_details" class="col-sm-3 control-label">Branch Details *</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea type="text" rows="2" style="height: 100%" class="form-control" id="branch_details" name="branch_details" placeholder="Enter your Branch / Bank Address">{{$bank->branch_details ?? ''}}</textarea>
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
@endpush
