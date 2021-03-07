@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">My Offers</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">My Offers</li>
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
                    <div class="card-title d-flex justify-content-between">
                        <h4>My Offers </h4>
                        <a href="#" class="btn btn-success"> Create New Offer </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>

                                <tr>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Currency</th>
                                    <th>Payment Method</th>
                                    <th>Rate</th>
                                    <th>Min</th>
                                    <th>Max</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($offers as $offer)
                                <tr>
                                    <td>
                                        <span class="badge badge-success px-3 py-2">{{$offer->type}}</span>
                                    </td>
                                    <td> <strong> {{$offer->title}} </strong> <br />
                                        {{$offer->extra_info ?? ''}}
                                    </td>

                                    <td><span class="badge badge-info px-3 py-2">{{$offer->currency->name}}</span></td>
                                    <td>{{$offer->method->name}}</td>
                                    <td><span>{{$offer->currency->display}} {{$offer->rate}}</span></td>
                                    <td><span>{{$offer->currency->display}} {{$offer->min}}</span></td>
                                    <td><span>{{$offer->currency->display}} {{$offer->max}}</span></td>
                                    <td><a href="#" class="btn btn-info">Edit</a>
                                    <a href="javascript:void(0)" onclick="deleteData({{$offer->id}})" class="btn btn-danger">Delete</a></td>
                                    <form id="delete-form-{{$offer->id}}" action="{{route('offers.destroy',$offer->id)}}" method="post" style="display: none"> @csrf @method('DELETE') </form>
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
