@extends('layouts.backend.app')

@section('title','Deposit Details')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ __('Deposit Details') }}</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">

                    @if($deposit->status == 'pending')
                    <button type="button" class="btn btn-primary btn-lg"
                            onclick="processDeposit()">
                        <i class="fas fa-trash-alt"></i>
                        <span>Process Deposit</span>
                    </button>
                    <button type="button" class="btn btn-danger btn-lg"
                            onclick="cancelDeposit()">
                        <i class="fas fa-trash-alt"></i>
                        <span>Cancel Deposit</span>
                    </button>
                    @endif

                    @if($deposit->status == 'processing')
                        <button type="button" class="btn btn-success btn-lg"
                                onclick="completeDeposit()">
                            <i class="fas fa-check"></i>
                            <span>Complete Deposit</span>
                        </button>
                    @endif

                    <button type="button" class="btn btn-secondary btn-lg"
                            onclick="commentDeposit()">
                        <i class="fas fa-trash-alt"></i>
                        <span>Add a comment to Deposit</span>
                    </button>


                    <form id="process"
                          action="{{ route('app.deposits.process',$deposit->trx_id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>

                    <form id="complete-deposit"
                          action="{{ route('app.deposits.complete',$deposit->trx_id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>

                    <form id="cancel-deposit"
                          action="{{ route('app.deposits.cancel',$deposit->trx_id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>

                    <form id="comment-form"
                          action="{{ route('app.deposits.comment',$deposit->trx_id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                        <input id="comment" type="text" name="comment">
                    </form>

                    <a href="{{ route('app.deposits.index') }}" class="btn-shadow btn btn-danger">
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
                            <td>{{ $deposit->user->first_name.' '.$deposit->user->last_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Username:</th>
                            <td>{{ $deposit->user->username }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Email:</th>
                            <td>{{ $deposit->user->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone:</th>
                            <td>{{ $deposit->user->phone }}</td>
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

                        @foreach($deposit->user->balances as $balance)
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
                            <th scope="row">Deposit Status:</th>
                            <td>
                                @if ($deposit->status == 'pending')
                                    <div class="badge badge-warning">Pending</div>
                                @elseif($deposit->status == 'processing')
                                    <div class="badge badge-primary">Processing</div>
                                @elseif($deposit->status == 'completed')
                                    <div class="badge badge-success">Completed</div>
                                @elseif($deposit->status == 'cancelled')
                                    <div class="badge badge-danger">Cancelled</div>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Bank Name</th>
                            <td>{{ $deposit->bank_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Account Holder</th>
                            <td>{{ $deposit->account_holder }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Account No</th>
                            <td>{{ $deposit->account_no }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Swift Code</th>
                            <td>{{ $deposit->swift_code }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Branch Details</th>
                            <td>{{ $deposit->branch_details }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Amount</th>
                            <td>{{ $deposit->amount .' '. $deposit->currency->display }}</td>
                        </tr>
                        <tr>
                            <th scope="row">User Note</th>
                            <td>{{ $deposit->note }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Deposit At:</th>
                            <td>{{ $deposit->created_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Last Modified At:</th>
                            <td>{{ $deposit->updated_at->diffForHumans() }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Admin Comment</th>
                            <td>{{ $deposit->comment ?? 'null' }}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
