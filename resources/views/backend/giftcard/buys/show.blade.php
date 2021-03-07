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

                    @if($order->status == 'pending')
                    <button type="button" class="btn btn-primary btn-lg"
                            onclick="processDeposit()">
                        <i class="fas fa-trash-alt"></i>
                        <span>Process Order</span>
                    </button>
                    <button type="button" class="btn btn-danger btn-lg"
                            onclick="cancelDeposit()">
                        <i class="fas fa-trash-alt"></i>
                        <span>Cancel Order</span>
                    </button>
                    @endif

                    @if($order->status == 'processing')
                        <button type="button" class="btn btn-success btn-lg"
                                onclick="completeDeposit()">
                            <i class="fas fa-check"></i>
                            <span>Complete Order</span>
                        </button>
                    @endif

                    <button type="button" class="btn btn-secondary btn-lg"
                            onclick="commentDeposit()">
                        <i class="fas fa-trash-alt"></i>
                        <span>Add a comment to Order</span>
                    </button>


                    <form id="process"
                          action="{{ route('app.giftcard.buys.process',$order->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>

                    <form id="complete-deposit"
                          action="{{ route('app.giftcard.buys.complete',$order->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>

                    <form id="cancel-deposit"
                          action="{{ route('app.giftcard.buys.cancel',$order->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>

                    <form id="comment-form"
                          action="{{ route('app.giftcard.buys.comment',$order->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                        <input id="comment" type="text" name="comment">
                    </form>

                    <a href="{{ route('app.giftcard.buys.index') }}" class="btn-shadow btn btn-danger">
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
                            <th scope="row">USD Balance:</th>
                            <td>{{ $order->user->wallet->usd }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Naira Balance:</th>
                            <td>{{ $order->user->wallet->naira}}</td>
                        </tr>

                        <tr>
                            <th scope="row">USD in escrow:</th>
                            <td>{{ $order->user->escrow->usd }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Naira in escrow:</th>
                            <td>{{ $order->user->escrow->naira }}</td>
                        </tr>

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
                            <th scope="row">Card Name</th>
                            <td>{{ $order->giftcardbuy->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Amount</th>
                            <td>{{ $order->amount .' '. \Illuminate\Support\Str::upper($order->currency) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Charge Amount</th>
                            <td>{{ $order->get_amount .' '. \Illuminate\Support\Str::upper($order->currency) }}</td>
                        </tr>

                        <tr>
                            <th scope="row">User Note</th>
                            <td>{{ $order->note }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Order At:</th>
                            <td>{{ $order->created_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Last Modified At:</th>
                            <td>{{ $order->updated_at->diffForHumans() }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Admin Comment</th>
                            <td>{{ $order->comment ?? 'null' }}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
