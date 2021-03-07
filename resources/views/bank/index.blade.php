@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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

                        <h2>Banks</h2>

                        <div class="d-inline-block dropdown">
                            <a href="{{ route('banks.create') }}" class="btn-shadow btn btn-primary">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-bank"></i>
                                </span>
                                {{ __('Add Bank') }}
                            </a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Bank Name</th>
                                    <th>Account Holder</th>
                                    <th>Account No</th>
                                    <th>Swift Code</th>
                                    <th>Routing Number</th>
                                    <th>Branch Details</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($banks as $key=>$bank)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$bank->bank_name}}</td>
                                        <td>{{$bank->account_holder}}</td>
                                        <td>{{$bank->account_no}}</td>
                                        <td>{{$bank->swift_code ?? ''}}</td>
                                        <td>{{$bank->routing_number ?? ''}}</td>
                                        <td>{{$bank->branch_details ?? ''}}</td>
                                        <td>
                                            <a href="{{route('banks.edit',$bank->id)}}" class="btn btn-sm round btn-outline-info"> Edit </a>
                                            <button onclick="deleteData({{ $bank->id }})" class="btn btn-sm round btn-outline-danger"> Delete </button>
                                        </td>
                                        <form id="delete-form-{{ $bank->id }}"
                                              action="{{ route('banks.destroy',$bank->id) }}" method="POST"
                                              style="display: none;">
                                            @csrf()
                                            @method('DELETE')
                                        </form>
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
