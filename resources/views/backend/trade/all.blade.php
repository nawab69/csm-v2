@extends('layouts.backend.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">All Offers</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">All Offers</li>
            </ol>
        </div>
    </div>


    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>

                                <tr>
                                    <th>Type</th>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Currency</th>
                                    <th>Payment Method</th>
                                    <th>Rate</th>
                                    <th>Min</th>
                                    <th>Max</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($offers as $offer)
                                    <tr>
                                        <td>
                                            <span class="badge badge-success px-3 py-2">{{$offer->type}}</span>
                                        </td>
                                        <td>
                                            <span>{{$offer->user->username}}</span>
                                        </td>
                                        <td> <strong> {{$offer->title}} </strong> <br />
                                            {{$offer->extra_info ?? ''}}
                                        </td>

                                        <td><span class="badge badge-info px-3 py-2">{{$offer->currency->name}}</span></td>
                                        <td>{{$offer->method->name}}</td>
                                        <td><span>{{$offer->currency->display}} {{$offer->rate}}</span></td>
                                        <td><span>{{$offer->currency->display}} {{$offer->min}}</span></td>
                                        <td><span>{{$offer->currency->display}} {{$offer->max}}</span></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


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
    <script src="{{asset('js/delete.js')}}"></script>
@endpush
