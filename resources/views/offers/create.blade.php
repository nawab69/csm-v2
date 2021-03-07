@extends('layouts.user.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Create Offer</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Create Offer</li>
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
                        <h4 class="card-title">Create Offer</h4>
                        <!-- form start -->
                        <form role="form" class="form-horizontal p-t-20" id="bankForm" method="POST"
                              action="{{route('offers.store')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="card" class="col-sm-3 control-label">Select Giftcard</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label for="type">Select Offer Type</label>
                                        <select id="type" name="type" class="form-control">
                                            <option value="buy">BUY</option>
                                            <option value="sell">SELL</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="currency" class="col-sm-3 control-label">Select Currency</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Select Currency</label>
                                        <select id="currency" name="currency" class="form-control">
                                            @foreach($currencies as $currency)
                                            <option value="{{$currency->id}}">{{$currency->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="currency" class="col-sm-3 control-label">Select Buy Method</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label for="method">Select Method</label>
                                        <select id="method" name="method" class="form-control">
                                            @foreach($methods as $method)
                                                <option value="{{$method->id}}">{{$method->name}} - {{$method->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 control-label">Title*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-sticky-note"></i></div>
                                        <input type="text" name="title"
                                               class="form-control form-type"
                                               id="title"
                                               placeholder="Offer Title"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="extra_info" class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea type="text" rows="2" style="height: 100%" class="form-control" id="extra_info" name="extra_info" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rate" class="col-sm-3 control-label">Rate*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-sticky-note"></i></div>
                                        <input type="number" name="rate"
                                               step="0.01"
                                               min="0.1"
                                               max="1.9"
                                               class="form-control form-type"
                                               id="rate"
                                               placeholder="Offer Rate"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="min" class="col-sm-3 control-label">Min*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-sticky-note"></i></div>
                                        <input type="number" name="min"
                                               step="0.1"
                                               min="1"
                                               class="form-control form-type"
                                               id="min"
                                               placeholder="Minimum"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="max" class="col-sm-3 control-label">Max*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-sticky-note"></i></div>
                                        <input type="number" name="max"
                                               step="0.1"
                                               min="10"
                                               max="99999999"
                                               class="form-control form-type"
                                               id="max"
                                               placeholder="Minimum"
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

    <script>




    </script>
@endpush
