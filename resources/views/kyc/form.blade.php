@extends('layouts.user.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">KYC</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">KYC</li>
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
                        <h4 class="card-title">KYC</h4>
                        <h6 class="card-subtitle">Start Your Kyc Verification to unlock all Features</h6>
                        <!-- form start -->
                        <form role="form" class="form-horizontal p-t-20" id="bankForm" method="POST"
                              action="{{route('user.kyc.submit')}}"
                              enctype="multipart/form-data">
                            @csrf



                            <div class="form-group row">
                                <label for="nid_no" class="col-sm-3 control-label">NID / Pssport / Driving Lisence No*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
                                        <input type="text" name="nid_no"
                                               class="form-control form-type"
                                               id="nid_no"
                                               placeholder="ID NO"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_front" class="col-sm-3 control-label">Front Page of ID</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="file" name="id_front"
                                               class="dropify"
                                               id="id_front"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_back" class="col-sm-3 control-label">Back Page of ID</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="file" name="id_back"
                                               class="dropify"
                                               id="id_back"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address_1" class="col-sm-3 control-label">Primary Address *</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea type="text" rows="2" style="height: 100%" class="form-control" id="address_1" name="address_1" placeholder="Enter your Primary Address"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address_2" class="col-sm-3 control-label">Secondary Address</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea type="text" rows="2" style="height: 100%" class="form-control" id="address_2" name="address_2" placeholder="Secondary Address"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="city" class="col-sm-3 control-label">City*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
                                            <input type="text" name="city"
                                                   class="form-control form-type"
                                                   id="city"
                                                   placeholder="City"
                                                   required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="state" class="col-sm-3 control-label">State*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
                                            <input type="text" name="state"
                                                   class="form-control form-type"
                                                   id="state"
                                                   placeholder="State"
                                                   required autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="post_code" class="col-sm-3 control-label">Post Code*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
                                            <input type="text" name="postcode"
                                                   class="form-control form-type"
                                                   id="post_code"
                                                   placeholder="Post Code"
                                                   required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="country" class="col-sm-3 control-label">Country*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
                                            <input type="text" name="country"
                                                   class="form-control form-type"
                                                   id="country"
                                                   placeholder="Country"
                                                   required autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="address_document" class="col-sm-3 control-label">Address Verification Document (utility bill / Bank statement)</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="file" name="address_document"
                                               class="dropify"
                                               id="address_document"
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
    </script>
@endpush
