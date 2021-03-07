@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Send Naira</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Send Naira</li>
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
                        <h4 class="card-title">Send NAIRA</h4>
                        <h6 class="card-subtitle">Send NAIRA from your NAIRA wallet to any User</h6>

                        <form id="sendUsd" class="form-horizontal p-t-20" method="post" action="{{route('naira.send')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="address" class="col-sm-3 control-label">Recipient's username*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                        <input required type="text" name="to" class="form-control form-type" id="address" placeholder="Recipient's Username">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 control-label">Amount*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-money"></i></div>
                                        <input required type="text" class="form-control form-type" id="amount" name="amount" placeholder="Enter Amount">
                                    </div>
                                    <h6 class="card-subtitle">Available Balance : {{$balance}} NAIRA</h6>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="note" class="col-sm-3 control-label">Note / Message</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea type="text" rows="2" style="height: 100%" class="form-control" id="note" name="note" placeholder="Enter Additional Message / Note"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fee" class="col-sm-3 control-label">Fee</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-money"></i></div>
                                        <input type="text" class="form-control form-type" id="fee" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="get" class="col-sm-3 control-label">Recipient Will Get</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-money"></i></div>
                                        <input type="text" class="form-control form-type" id="get" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="send" class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button onclick="popSendUsd()" class="btn btn-dark waves-effect waves-light">Send</button>
                                <a href="#" onclick="location.reload()" class="btn btn-dark waves-effect waves-light">Reset</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card">
                    <div class="card-title d-flex justify-content-between">

                        <h2>Send History</h2>


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Trx ID</th>
                                    <th>Recipient</th>
                                    <th>Amount</th>
                                    <th>Fee</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sends as $key=>$bank)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$bank->trx_id}}</td>
                                        <td>{{$bank->receive->user->username}}</td>
                                        <td>{{$bank->amount}}  {{$bank->currency}}</td>
                                        <td>{{$bank->fee}} {{$bank->currency}}</td>
                                        <td>{{$bank->total}} {{$bank->currency}}</td>
                                        <td>{{$bank->status}}</td>
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
    <script>
        const fee = {{$fee}} ?? 0;
        const balance = {{$balance}} ?? 0;
        const amount = document.getElementById('amount');
        const fees = document.getElementById('fee');
        const get = document.getElementById('get');
        const address = document.getElementById('address');

        amount.addEventListener('change',(e)=>{
            if(balance<e.target.value){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Insufficient Balance !',
                });
            }else {
                const calculated_fee = (e.target.value / 100) * fee;
                fees.value = calculated_fee;
                get.value = e.target.value - calculated_fee;
            }
        })

        function popSendUsd(){
            if(isNaN(amount.value) || amount.value < 1 || address.lenth <1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Fill the Input field correctly !',
                });
            }else {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Send Now!'
                }).then((result) => {
                    if (result.value) {
                        document.getElementById('sendUsd').submit();
                    }
                });
            }
        }



    </script>

@endpush
