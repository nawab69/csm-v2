@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Sell</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Sell</li>
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
                        <h4 class="card-title">Sell Crypto</h4>

                        <form id="sell-form" class="form-horizontal p-t-20" method="post" action="{{route('sell.sell')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="sell_currency" class="col-sm-3 control-label">From</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Select Currency</label>
                                        <select id="sell_currency" name="currency" class="form-control">
                                            <option value="btc">BTC</option>
                                            <option value="ltc">LTC</option>
                                            <option value="doge">DOGE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="get_currency" class="col-sm-3 control-label">To</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Select Currency</label>
                                        <select id="get_currency" name="get_currency" class="form-control">
                                            @foreach($currencies as $currency)
                                                <option value="{{$currency->id}}">{{$currency->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sell_amount" class="col-sm-3 control-label">Amount</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-type" id="sell_amount" name="amount" placeholder="Enter Amount">
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
                                <button onclick="sellNow()" class="btn btn-dark waves-effect waves-light">Sell</button>
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

                        <h2>Sell History</h2>


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Trx ID</th>
                                    <th>Amount</th>
                                    <th>Sell Amount</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sells as $key=>$bank)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$bank->trx_id}}</td>
                                        <td>{{$bank->amount}}  {{$bank->from_currency}}</td>
                                        <td>{{$bank->sell_amount}} {{$bank->currency->display}}</td>
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

        $('#send').hide();
        const sell_currency = document.getElementById('sell_currency');
        const get_currency  = document.getElementById('get_currency');
        const sell_amount   = document.getElementById('sell_amount');
        const get_amount    = document.getElementById('get_amount');
        const uid           = {{auth()->user()->id}};

        function calculateSell() {

            const sellAmount = sell_amount.value;
            const getCurrency = get_currency.value;
            const sellCurrency = sell_currency.value;
            $.post( '/api/calculate-sell', { sellCurrency, uid, getCurrency ,sellAmount })
                .done(function( data ) {
                    if(data.status == 'error'){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        });
                    }else {
                        if(getCurrency){
                            console.log(data);
                            get_amount.value = data.get_amount;
                            $('#send').show();
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something Went Wrong!',
                            });
                        }
                    }
                });
        }

        sell_currency.addEventListener('change',calculateSell);
        sell_amount.addEventListener('change',calculateSell);
        get_currency.addEventListener('change',calculateSell);

        function sellNow() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Sell Now!'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('sell-form').submit();
                }
            })
        }

    </script>


@endpush
