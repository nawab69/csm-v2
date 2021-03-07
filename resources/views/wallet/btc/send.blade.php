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
                        <h4 class="card-title">Send BTC</h4>
                        <h6 class="card-subtitle">Send Bitcoin from your BTC wallet to any btc address</h6>

                        <form class="form-horizontal p-t-20" method="post" action="{{route('btc.send.now')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="address" class="col-sm-3 control-label">Recipient's Address*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-wallet"></i></div>
                                        <input type="text" name="to_address" class="form-control form-type" id="address" placeholder="Recipient's Address">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 control-label">Amount</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="cc BTC"></i></div>
                                        <input type="text" class="form-control form-type" id="amount" name="amount" placeholder="Enter Amount">
                                        <input type="number" hidden id="uid" value="{{auth()->user()->id}}">
                                    </div>
                                    <h6 class="card-subtitle">Available Balance : {{$balance}} BTC</h6>
                                </div>
                            </div>
                            <div id="status" style="display: none">
                                <div class="row" >
                                    <div class="col-sm-3">Estimate Fee</div>
                                    <div class="col-sm-9">
                                        <span id="fee"></span> <span> BTC</span>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3">
                                    <div class="col-sm-3">Estimate Total</div>
                                    <div class="col-sm-9">
                                        <span id="total"></span> <span> BTC</span>
                                    </div>
                                </div>
                            </div>
                            <div id="message" class="row mt-3 mb-3" style="display: none">
                                <div class="col-sm-3">Error</div>
                                <div class="col-sm-9">
                                    <span id="error_message"></span>
                                </div>
                            </div>

                            <div id="send" class="form-group row m-b-0" style="display: none">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-dark waves-effect waves-light">Send</button>
                                    <a href="#" onclick="location.reload()" class="btn btn-dark waves-effect waves-light">Reset</a>
                                </div>
                            </div>

                        </form>

                            <div class="form-group row m-b-0" id="calculate">
                                <div class="offset-sm-3 col-sm-9">
                                    <button onclick="calculateFee('btc')" class="btn btn-dark waves-effect waves-light">Calculate Fee</button>
                                    <button onclick="calculateMax('btc')" class="btn btn-dark waves-effect waves-light">Max</button>
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
                        <h2>Sent History</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Transactions ID</th>
                                    <th>Recipient Address</th>
                                    <th>Amount</th>
                                    <th>Confirmations</th>
                                    <th>Timestamp</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $key=>$trx)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$trx->txid}}</td>
                                        <td>{{$trx->amounts_sent[0]->recipient}}</td>
                                        <td>{{$trx->amounts_sent[0]->amount}}</td>
                                        <td>{{$trx->confirmations}}</td>
                                        <td>{{\Carbon\Carbon::parse($trx->time)}}</td>
                                        <td>
                                                                                        <a href="https://sochain.com/tx/BTC/{{$trx->txid}}" class="btn btn-sm round btn-outline-info"> Details </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- End Container fluid  -->
@endsection

@push('js')
    <!--Custom JavaScript -->
    <script src="{{asset('assets/dashboard/js/lib/webticker/jquery.webticker.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/lib/peitychart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dashboard-1.js')}}"></script>
    <script src="{{asset('js/calculation.js')}}"></script>

@endpush
