@extends('layouts.backend.app')

@section('title','Order Details')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ __('Order Details') }}</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">

{{--                    @if($order->status == 'pending')--}}
{{--                    <button type="button" class="btn btn-primary btn-lg"--}}
{{--                            onclick="processDeposit()">--}}
{{--                        <i class="fas fa-trash-alt"></i>--}}
{{--                        <span>Process Order</span>--}}
{{--                    </button>--}}
{{--                    <button type="button" class="btn btn-danger btn-lg"--}}
{{--                            onclick="cancelDeposit()">--}}
{{--                        <i class="fas fa-trash-alt"></i>--}}
{{--                        <span>Cancel Order</span>--}}
{{--                    </button>--}}
{{--                    @endif--}}

{{--                    @if($order->status == 'processing')--}}
{{--                        <button type="button" class="btn btn-success btn-lg"--}}
{{--                                onclick="completeDeposit()">--}}
{{--                            <i class="fas fa-check"></i>--}}
{{--                            <span>Complete Order</span>--}}
{{--                        </button>--}}
{{--                    @endif--}}

                    <form id="process"
                          action="{{ route('app.buys.process',$order->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>

                    <form id="complete-deposit"
                          action="{{ route('app.buys.complete',$order->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>

                    <form id="cancel-form"
                          action="{{ route('app.buys.cancel',$order->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>

                    <a href="{{ route('app.buys.index') }}" class="btn-shadow btn btn-danger">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-arrow-circle-left fa-w-20"></i>
                        </span>
                        {{ __('Back to list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h3 class="text-center mb-4">User Details</h3>
                    <table class="table table-hover mb-0">
                        <tbody>
                        <tr>
                            <th scope="row">Name:</th>
                            <td>{{ $order->user->first_name.' '.$order->user->last_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Username:</th>
                            <td>{{ $order->user->username }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Email:</th>
                            <td>{{ $order->user->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone:</th>
                            <td>{{ $order->user->phone }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="main-card mb-3 mt-3 card">
                <div class="card-body">
                    <h3 class="text-center mb-4">Wallet Details</h3>
                    <table class="table table-hover mb-0">
                        <tbody>
                        <tr>
                            <th scope="row">Currency</th>
                            <td>Main</td>
                            <td>Escrow</td>
                        </tr>

                        @foreach($order->user->balances as $balance)
                            <tr>
                                <th scope="row">{{$balance->currency->name}}</th>
                                <td>{{$balance->balance}} {{$balance->currency->display}}</td>
                                <td>{{$balance->escrow}} {{$balance->currency->display}}</td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <div class="col-md-8">
            <div class="main-card card">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <tbody>
                        <tr>
                            <th scope="row">Order Status:</th>
                            <td>
                                @if ($order->status == 'pending')
                                    <div class="badge badge-warning">Pending</div>
                                @elseif($order->status == 'processing')
                                    <div class="badge badge-primary">Processing</div>
                                @elseif($order->status == 'completed')
                                    <div class="badge badge-success">Completed</div>
                                @elseif($order->status == 'cancelled')
                                    <div class="badge badge-danger">Cancelled</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Amount</th>
                            <td>{{ $order->amount .' '. $order->currency->display }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Sell Amount</th>
                            <td>{{ $order->sell_amount .' '. \Illuminate\Support\Str::upper($order->to_currency) }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Receiving Address</th>
                            <td>
                                @if($order->to_currency == 'btc')
                                    {{$order->user->wallet->btc_address}}
                                @elseif($order->to_currency == 'ltc')
                                    {{$order->user->wallet->ltc_address}}
                                @elseif($order->to_currency == 'doge')
                                    {{$order->user->wallet->doge_address}}
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Pay</th>
                            <td>
                                Please Pay {{$order->sell_amount .' '. \Illuminate\Support\Str::upper($order->to_currency)}} to <br>
                                <code>
                                    @if($order->to_currency == 'btc')
                                        {{$order->user->wallet->btc_address}}
                                    @elseif($order->to_currency == 'ltc')
                                        {{$order->user->wallet->ltc_address}}
                                    @elseif($order->to_currency == 'doge')
                                        {{$order->user->wallet->doge_address}}
                                    @endif
                                </code>
                            </td>
                        </tr>



                        <tr>
                            <th scope="row">Order At:</th>
                            <td>{{ $order->created_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Last Modified At:</th>
                            <td>{{ $order->updated_at->diffForHumans() }}</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
