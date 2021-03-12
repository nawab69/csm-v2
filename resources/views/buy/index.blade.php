@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Buy</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buy</li>
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
                        <h4 class="card-title">Buy Crypto</h4>

                        <form id="buy-form" class="form-horizontal p-t-20" method="post" action="{{route('buy.buy')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="from_currency" class="col-sm-3 control-label">From</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Select Currency</label>
                                        <select id="from_currency" name="from_currency" class="form-control">
                                            @foreach($currencies as $currency)
                                                <option value="{{$currency->id}}">{{$currency->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="get_currency" class="col-sm-3 control-label">To</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Select Currency</label>
                                        <select id="to_currency" name="to_currency" class="form-control">
                                            <option value="btc">BTC</option>
                                            <option value="ltc">LTC</option>
                                            <option value="doge">DOGE</option>
                                            <option value="eth">ETH</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 control-label">Amount</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-type" id="amount" name="amount" placeholder="Enter Amount">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <span id="error"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 control-label">Amount You will get</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input readonly type="text" class="form-control form-type" id="get_amount" placeholder="You will get">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div style="display: none" id="send" class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button onclick="buyNow()" class="btn btn-dark waves-effect waves-light">Buy</button>
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

                        <h2>Buy History</h2>


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Trx ID</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Amount</th>
                                    <th>Buy Amount</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($buys as $key=>$bank)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$bank->trx_id}}</td>
                                        <td>{{$bank->currency->name}}</td>
                                        <td>{{strtoupper($bank->to_currency)}}</td>
                                        <td>{{$bank->amount}}  {{$bank->currency->display}}</td>
                                        <td>{{$bank->sell_amount}} {{strtoupper($bank->to_currency)}}</td>
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


        const from_currency = document.getElementById('from_currency');
        const to_currency = document.getElementById('to_currency');
        const amount = document.getElementById('amount');
        const get_amount = document.getElementById('get_amount');

        from_currency.addEventListener('change',calculateAmount);
        to_currency.addEventListener('change',calculateAmount);
        amount.addEventListener('change',calculateAmount);



        function calculateAmount(){
            const toCurrency = to_currency.value;
            const fromCurrency = from_currency.value;
            const amountTotal = amount.value;


            $.post( '/api/calculate-buy', { toCurrency, amountTotal ,fromCurrency })
                .done(function( data ) {
                    console.log(data);
                    get_amount.value = data.amount;
                    $('#send').show();
                });
        }

        function buyNow() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Buy Now!'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('buy-form').submit();
                }
            })
        }

    </script>


@endpush
