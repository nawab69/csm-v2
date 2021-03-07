@extends('layouts.user.app')

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
            <div class="col-lg-11">
                <div class="card" style="min-height: 60vh">
                    <div class="card-title d-flex justify-content-between">

                        <h2>KYC Verification</h2>

                    </div>
                    <div class="card-body" style="transform: translateY(30%)">
                        @if($kyc->id_status == 'not_submit')
                        <h3 class="text-center"> You didn't submit your kyc document.</h3>
                            <div class="d-flex justify-content-center">
                                <a href="{{route('user.kyc.start')}}" class="btn btn-warning btn-lg"> Start Your KYC Verification </a>
                            </div>
                        @elseif($kyc->id_status == 'declined')
                            <h3 class="text-center"> Your Document Has been Declined.</h3>
                            <div class="d-flex justify-content-center">
                                <a href="{{route('user.kyc.start')}}" class="btn btn-warning btn-lg"> Submit KYC Verification Again</a>
                            </div>
                        @elseif($kyc->id_status == 'submitted')
                            <h3 class="text-center"> Your have Already submitted your document. We will verify it as soon as possible</h3>
                        @else
                            <h3 class="text-center"> Your are verified !</h3>
                        @endif
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
    <script src="{{asset('js/delete.js')}}"></script>
@endpush
