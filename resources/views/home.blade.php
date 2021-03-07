@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="crypto-ticker m-b-15">
                    <ul id="webticker-dark-icons">
                        <li data-update="item1"><i class="cc BTC"></i> BTC <span class="coin-value"> ${{$rate['btc']['usd']}}</span></li>
                        <li data-update="item1"><i class="cc BTC"></i> BTC <span class="coin-value"> €{{$rate['btc']['euro']}}</span></li>
                        <li data-update="item1"><i class="cc BTC"></i> BTC <span class="coin-value"> £{{$rate['btc']['gbp']}}</span></li>
                        <li data-update="item5"><i class="cc BTC"></i> BTC <span class="coin-value"> {{$rate['btc']['naira']}} NAIRA</span></li>
                        <li data-update="item4"><span>&nbsp</span></li>


                        <li data-update="item2"><i class="cc LTC"></i> LTC <span class="coin-value"> ${{$rate['ltc']['usd']}}</span></li>
                        <li data-update="item1"><i class="cc LTC"></i> LTC <span class="coin-value"> €{{$rate['ltc']['euro']}}</span></li>
                        <li data-update="item1"><i class="cc LTC"></i> LTC <span class="coin-value"> £{{$rate['ltc']['gbp']}}</span></li>
                        <li data-update="item6"><i class="cc LTC"></i> LTC <span class="coin-value"> {{$rate['ltc']['naira']}} NAIRA</span></li>
                        <li data-update="item4"><span>&nbsp</span></li>

                        <li data-update="item3"><i class="cc DOGE"></i> DOGE <span class="coin-value"> ${{$rate['doge']['usd']}}</span></li>
                        <li data-update="item1"><i class="cc DOGE"></i> DOGE <span class="coin-value"> €{{$rate['doge']['euro']}}</span></li>
                        <li data-update="item1"><i class="cc DOGE"></i> DOGE <span class="coin-value"> £{{$rate['doge']['gbp']}}</span></li>
                        <li data-update="item7"><i class="cc DOGE"></i> DOGE <span class="coin-value"> {{$rate['doge']['naira']}} NAIRA</span></li>
                        <li data-update="item8"><span>&nbsp</span></li>

                        <li data-update="item3"><i class="cc ETH"></i> ETH <span class="coin-value"> ${{$rate['eth']['usd']}}</span></li>
                        <li data-update="item1"><i class="cc ETH"></i> ETH <span class="coin-value"> €{{$rate['eth']['euro']}}</span></li>
                        <li data-update="item1"><i class="cc ETH"></i> ETH <span class="coin-value"> £{{$rate['eth']['gbp']}}</span></li>
                        <li data-update="item7"><i class="cc ETH"></i> ETH <span class="coin-value"> {{$rate['eth']['naira']}} NAIRA</span></li>
                        <li data-update="item8"><span>&nbsp</span></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header card-actions card-outline-primary">
                <div class="card-title text-center"><h2>MAIN WALLET</h2></div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">

                                <div class="stat-widget-seven">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc BTC" title="BTC"></i>
                                        </div>
                                        <div class="col-8">
                                            <h3>Bitcoin BTC</h3>
                                            <h4 class="text-muted">{{$btc->available_balance }} <span class="color-gray">{{$btc->network}}</span> <span class="text-info">${{ round($btc->available_balance * $rate['btc']['usd'],2,PHP_ROUND_HALF_UP)}}</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-seven">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc LTC" title="LTC"></i>
                                        </div>
                                        <div class="col-8">
                                            <h3>Litecoin LTC</h3>
                                            <h4 class="text-muted">{{$ltc->available_balance }} <span class="color-gray">{{$ltc->network}}</span> <span class="text-info">${{ round($ltc->available_balance * $rate['ltc']['usd'],2,PHP_ROUND_HALF_UP)}}</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-seven">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc DOGE" title="DOGE"></i>
                                        </div>
                                        <div class="col-8">
                                            <h3>Dogecoin DOGE</h3>
                                            <h4 class="text-muted">{{$doge->available_balance }} <span class="color-gray">{{$doge->network}}</span> <span class="text-info">${{ round($doge->available_balance * $rate['doge']['usd'],2,PHP_ROUND_HALF_UP)}}</span></h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-seven">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc ETH" title="ETH"></i>
                                        </div>
                                        <div class="col-8">
                                            <h3>Ethereum ETH</h3>
                                            @if($eth)
                                                <h4 class="text-muted"> {{round($ether,8,PHP_ROUND_HALF_DOWN)}} <span class="color-gray">ETH</span> <span class="text-info">${{ round($ether * $rate['eth']['usd'],2,PHP_ROUND_HALF_UP)}}</span></h4>
                                            @else
                                                <h5 class="text-warning"> You don't have Eth wallet</h5>
                                                <form action="{{route('eth.create')}}" method="post">
                                                    @csrf
                                                    <button class="btn btn-info">Create wallet</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header card-actions card-outline-info">
                <div class="card-title text-center"><h2>TRADE WALLET</h2></div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">

                                <div class="stat-widget-seven">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc BTC" title="BTC"></i>
                                        </div>
                                        <div class="col-8">
                                            <h3>Bitcoin BTC</h3>
                                            <h4 class="text-muted"> {{$trade_wallet->main_btc}} <span class="color-gray">BTC</span> <span class="text-info">${{ round($trade_wallet->main_btc * $rate['btc']['usd'],2,PHP_ROUND_HALF_UP)}}</span></h4>
                                            <h5 class="text-muted"> (on escrow) {{$trade_wallet->escrow_btc}} <span class="color-gray">BTC</span> <span class="text-info">${{ round($trade_wallet->escrow_btc * $rate['btc']['usd'],2,PHP_ROUND_HALF_UP)}}</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-seven">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc LTC" title="LTC"></i>
                                        </div>
                                        <div class="col-8">
                                            <h3>Litecoin LTC</h3>
                                            <h4 class="text-muted"> {{$trade_wallet->main_ltc}} <span class="color-gray">LTC</span> <span class="text-info">${{ round($trade_wallet->main_ltc * $rate['ltc']['usd'],2,PHP_ROUND_HALF_UP)}}</span></h4>
                                            <h5 class="text-muted"> (on escrow) {{$trade_wallet->escrow_ltc}} <span class="color-gray">LTC</span> <span class="text-info">${{ round($trade_wallet->escrow_ltc * $rate['ltc']['usd'],2,PHP_ROUND_HALF_UP)}}</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-seven">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc DOGE" title="DOGE"></i>
                                        </div>
                                        <div class="col-8">
                                            <h3>Dogecoin DOGE</h3>
                                            <h4 class="text-muted"> {{$trade_wallet->main_doge}} <span class="color-gray">DOGE</span> <span class="text-info">${{ round($trade_wallet->main_doge * $rate['doge']['usd'],2,PHP_ROUND_HALF_UP)}}</span></h4>
                                            <h5 class="text-muted"> (on escrow) {{$trade_wallet->escrow_doge}} <span class="color-gray">DOGE</span> <span class="text-info">${{ round($trade_wallet->escrow_doge * $rate['doge']['usd'],2,PHP_ROUND_HALF_UP)}}</span></h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-seven">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc ETH" title="ETH"></i>
                                        </div>
                                        <div class="col-8">
                                            <h3>Ethereum ETH</h3>
                                                <h4 class="text-muted"> {{round($trade_wallet->main_eth,8)}} <span class="color-gray">ETH</span> <span class="text-info">${{ round($trade_wallet->main_eth * $rate['eth']['usd'],2,PHP_ROUND_HALF_UP)}}</span></h4>
                                                <h5 class="text-muted"> (on escrow) {{$trade_wallet->escrow_eth}} <span class="color-gray">ETH</span> <span class="text-info">${{ round($trade_wallet->escrow_eth * $rate['eth']['usd'],2,PHP_ROUND_HALF_UP)}}</span></h5>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header card-actions card-outline-info">
                <div class="card-title text-center"><h2>FIAT WALLET</h2></div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($balances as $balance)
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-seven">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa fa-3x fa-money"></i>
                                        </div>
                                        <div class="col-10">
                                            <h3>{{$balance->currency->name}}</h3>
                                            <h4 class="text-muted">{{$balance->currency->display}} {{$balance->balance}}</h4>
                                            <h6 class="text-muted">On escrow : {{$balance->currency->display}} {{$balance->escrow}}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach

                </div>
            </div>
        </div>

        <!-- /# row -->
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Running Trades</h4>
                        <div class="card-content">
                            <div class="todo-list">
                                <div class="tdl-holder">
                                    <div class="tdl-content">
                                        <ul>
                                            <li class="color-primary my-2">
                                                <a href="#">
                                                    <span class="badge badge-primary p-2" style="font-size: 1.2em">{{$count['pending_trades']}}</span><span>Pending Trades</span>
                                                </a>
                                            </li>
                                            <li class="color-info  my-2">
                                                <a href="#">
                                                    <span class="badge badge-info p-2" style="font-size: 1.2em">{{$count['processing_trades']}}</span><span>Processing Trades</span>
                                                </a>
                                            </li>
                                            <li class="color-danger  my-2">
                                                <a href="#">
                                                    <span class="badge badge-danger p-2" style="font-size: 1.2em">{{$count['dispute_trades']}}</span><span>Dispute Trades</span>
                                                </a>
                                            </li>
                                            <li class="color-secondary  my-2">
                                                <a href="#">
                                                    <span class="badge badge-primary p-2" style="font-size: 1.2em">{{$count['pending_deposit']}}</span><span>Pending Deposit</span>
                                                </a>
                                            </li>
                                            <li class="color-secondary my-2">
                                                <a href="#">
                                                    <span class="badge badge-info p-2" style="font-size: 1.2em">{{$count['processing_deposit']}}</span><span>Processing Deposit</span>
                                                </a>
                                            </li>
                                            <li class="color-info my-2">
                                                <a href="#">
                                                    <span class="badge badge-primary p-2" style="font-size: 1.2em">{{$count['pending_withdraw']}}</span><span>Pending Withdraw</span>
                                                </a>
                                            </li>
                                            <li class="color-info my-2">
                                                <a href="#">
                                                    <span class="badge badge-info p-2" style="font-size: 1.2em">{{$count['processing_withdraw']}}</span><span>Processing Withdraw</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-title">
                        <h4>My Trades History</h4></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>TRADE ID</th>
                                    <th>Buyer Name</th>
                                    <th>Seller Name</th>
                                    <th>Trade Type</th>
                                    <th>Currency</th>
                                    <th>Method</th>
                                    <th>Amount</th>
                                    <th>Fee</th>
                                    <th>Total</th>
                                    <th>Created At</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trades as $trade)
                                    <tr>
                                        <td>{{$trade->trx_id}}</td>
                                        <td>{{$trade->buyer->username}}</td>
                                        <td>{{$trade->seller->username}}</td>
                                        <td>{{\Illuminate\Support\Str::upper($trade->offer->type)}}</td>
                                        <td>{{$trade->offer->currency->name}}</td>
                                        <td>{{$trade->offer->method->name}}</td>
                                        <td>{{$trade->amount}}</td>
                                        <td>{{$trade->fee}}</td>
                                        <td>{{$trade->total}}</td>
                                        <td>{{\Carbon\Carbon::parse($trade->created_at)->diffForHumans()}}</td>

                                        @if($trade->buyer->user_id === auth()->user()->id)
                                            <td>
                                                <a href="{{route('trades.buy.info',$trade->trx_id)}}" class="btn btn-sm round btn-outline-info"> Details</a>
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{route('trades.sell.info',$trade->trx_id)}}" class="btn btn-sm round btn-outline-info"> Details</a>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                            <div class="d-flex justify-content-center">
                                <div>{{$trades->links()}}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <h4>Deposit Order</h4></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>TRX ID</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($deposits as $deposit)
                                    <tr>
                                        <td>{{$deposit->trx_id}}</td>
                                        <td>{{strtoupper($deposit->currency->name)}}</td>
                                        <td><i class="fa fa-dollar"></i> {{$deposit->amount}}</td>
                                        <td class="success"> {{$deposit->status}}</td>
                                        <td>{{\Carbon\Carbon::parse($deposit->created_at)->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('user.deposit.show',$deposit->id)}}" class="btn btn-sm round btn-outline-info"> Details</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                            <div class="d-flex justify-content-center">
                                <div>{{$deposits->links()}}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <h4>Withdraw Order</h4></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>TRX ID</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Fee</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($withdraws as $deposit)
                                <tr>
                                    <td>{{$deposit->trx_id}}</td>
                                    <td>{{strtoupper($deposit->currency->name)}}</td>
                                    <td><i class="fa fa-dollar"></i> {{$deposit->amount}}</td>
                                    <td><i class="fa fa-dollar"></i> {{$deposit->fee}}</td>
                                    <td><i class="fa fa-dollar"></i> {{$deposit->total}}</td>
                                    <td class="success"> {{$deposit->status}}</td>
                                    <td>{{\Carbon\Carbon::parse($deposit->created_at)->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('user.withdraw.show',$deposit->id)}}" class="btn btn-sm round btn-outline-info"> Details</a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>

                            </table>
                            <div class="d-flex justify-content-center">
                                <div>{{$withdraws->links()}}</div>
                            </div>

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
@endpush
