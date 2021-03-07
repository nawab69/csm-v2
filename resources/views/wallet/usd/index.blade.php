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
            <div class="col-lg-8">
                <div class="card py-5 px-5">
                    <div class="card-body">
                        <h4 class="card-title">Send Fiat</h4>
                        <h6 class="card-subtitle">Send Fiat currency from your wallet to any User</h6>

                        <form id="sendUsd" class="form-horizontal p-t-20" method="post" action="{{route('usd.send')}}">
                            @csrf

                            <div class="form-group row">
                                <label for="currency" class="col-sm-3 control-label">Select Currency</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Select Currency</label>
                                        <select id="currency" name="currency" class="form-control">

                                            @foreach($balance as $cc)
                                                <option data-details="{{$cc->balance}}" data-currency="{{$cc->currency->name}}" value="{{$cc->currency_id}}">{{$cc->currency->name}}  ({{$cc->balance.' '.$cc->currency->display}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


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
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <input required type="number" step="0.1" min="0" class="form-control form-type" id="amount" name="amount" placeholder="Enter Amount">
                                    </div>
                                    <h6 class="card-subtitle" id="details"></h6>
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
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <input type="text" class="form-control form-type" id="fee" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="get" class="col-sm-3 control-label">Recipient Will Get</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
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
                                    <th>Currency</th>
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
                                        <td><span class="badge badge-info">{{$bank->currency->name}}</span></td>
                                        <td>{{$bank->amount}}  {{$bank->currency->display}}</td>
                                        <td>{{$bank->fee}} {{$bank->currency->display}}</td>
                                        <td>{{$bank->total}} {{$bank->currency->display}}</td>
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
        const selection = document.getElementById("currency");
        const payment = document.getElementById("details");
        let balance = selection.options[selection.selectedIndex].dataset.details;
        let currency = selection.options[selection.selectedIndex].dataset.currency;
        selection.onchange = function(event){
            balance = event.target.options[event.target.selectedIndex].dataset.details;
            currency = event.target.options[event.target.selectedIndex].dataset.currency;
            payment.innerHTML = "<br/> <strong> Available Balance </strong> : "+balance+" "+currency+"<br/>";
        };
        payment.innerHTML = "<br/> <strong> Available Balance </strong> : "+balance+" "+currency+"<br/>";

        const fee = {{$fee}} ?? 0;

        const amount = document.getElementById('amount');
        amount.setAttribute("max", balance);
        const fees = document.getElementById('fee');
        const get = document.getElementById('get');

        amount.addEventListener('change',(e)=>{
            if(parseFloat(balance) < parseFloat(e.target.value)){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Insufficient Balance !',
                });
                amount.value = 0;
            }else {
                const calculated_fee = (e.target.value / 100) * fee;
                fees.value = calculated_fee;
                get.value = e.target.value - calculated_fee;
            }
        })

        function popSendUsd(){
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
            })
        }


    </script>

@endpush
