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
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card py-5 px-5">
                    <div class="card-body">
                        <h4 class="card-title">Withdraw</h4>
                        @if($type=== 'bank')
                        <h6 class="card-subtitle">Withdraw balance to Your Bank</h6>
                        @endif
                        <!-- form start -->
                        <form role="form" class="form-horizontal p-t-20" id="bankForm" method="POST"
                              action="{{route('user.withdraw.store')}}"
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
                            @if($type==='bank')
                            <div class="form-group row">
                                <label for="bank" class="col-sm-3 control-label">Select Bank</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Select Bank</label>
                                        <select id="bank" name="bank" class="form-control">
                                            @foreach($banks as $bank)
                                            <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="form-group row">
                                    <label for="bank" class="col-sm-3 control-label">Select Payment Method</label>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label>Select Payment Method</label>
                                            <select id="payment_method" name="payment_method" class="form-control">
                                                @foreach($payment_methods as $pm)
                                                    <option value="{{$pm->id}}">{{$pm->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 control-label">Withdraw Amount*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <input type="text" name="amount"
                                               class="form-control form-type"
                                               id="amount"
                                               placeholder="Withdraw Amount"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="note" class="col-sm-3 control-label">Note *</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea type="text" rows="2" style="height: 100%" class="form-control" id="note" name="note" placeholder="Additional Note"></textarea>
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
