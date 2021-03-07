@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">SEND ETH</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">SEND ETH</li>
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
                        <h4 class="card-title">Send ETH</h4>
                        <h6 class="card-subtitle">Send Ethereum from your ETH wallet to any eth address</h6>
                        @if ($balance < (weiToEth($res['tx']['fees']) + weiToEth($res['tx']['total'])))
                            <div class="alert alert-warning">
                                Error : Insufficient Balance
                            </div>
                        @endif

                        <form class="form-horizontal p-t-20" method="post" action="{{route('eth.send.sign')}}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-3">Recipient's Address</div>
                                <div class="col-sm-9">
                                    {{$res['tx']['outputs'][0]['addresses'][0]}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">Amount</div>
                                <div class="col-sm-9">
                                    {{weiToEth($res['tx']['total'])}} ETH
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">Fee</div>
                                <div class="col-sm-9">
                                    {{weiToEth($res['tx']['fees'])}} ETH
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">Total Charge</div>
                                <div class="col-sm-9">
                                    {{weiToEth($res['tx']['fees']) + weiToEth($res['tx']['total'])}} ETH

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">Available Balance</div>
                                <div class="col-sm-9">
                                    {{$balance ?? 0}} ETH

                                </div>
                            </div>


                            <input type="text" name="to_sign" value="{{$res['tosign'][0]}}" hidden/>

                            <div id="send" class="form-group row m-b-0">
                                <div class="offset-sm-3 col-sm-9">
{{--                                    @if ($balance >= (weiToEth($res['tx']['fees']) + weiToEth($res['tx']['total'])))--}}
                                    <button type="submit" class="btn btn-dark waves-effect waves-light">Confirm</button>
{{--                                    @endif--}}
                                    <a href="{{route('eth.send')}}"  class="btn btn-dark waves-effect waves-light">Back</a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-lg-11">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-title d-flex justify-content-between">--}}
{{--                        <h2>Sent History</h2>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="table table-de mb-0">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>Transactions ID</th>--}}
{{--                                    <th>Recipient Address</th>--}}
{{--                                    <th>Amount</th>--}}
{{--                                    <th>Confirmations</th>--}}
{{--                                    <th>Timestamp</th>--}}
{{--                                    <th>Details</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($transactions as $key=>$trx)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $key + 1 }}</td>--}}
{{--                                        <td>{{$trx->txid}}</td>--}}
{{--                                        <td>{{$trx->amounts_sent[0]->recipient}}</td>--}}
{{--                                        <td>{{$trx->amounts_sent[0]->amount}}</td>--}}
{{--                                        <td>{{$trx->confirmations}}</td>--}}
{{--                                        <td>{{\Carbon\Carbon::parse($trx->time)}}</td>--}}
{{--                                        <td>--}}
{{--                                                                                        <a href="https://sochain.com/tx/BTC/{{$trx->txid}}" class="btn btn-sm round btn-outline-info"> Details </a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


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
