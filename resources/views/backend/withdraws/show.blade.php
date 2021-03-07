@extends('layouts.backend.app')

@section('title','Withdraw Details')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ __('Withdraw Details') }}</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">

                    @if($withdraw->status == 'pending')
                    <button type="button" class="btn btn-primary btn-lg"
                            onclick="processWithdraw()">
                        <i class="fas fa-trash-alt"></i>
                        <span>Process Withdraw</span>
                    </button>
                    <button type="button" class="btn btn-danger btn-lg"
                            onclick="cancelWithdraw()">
                        <i class="fas fa-trash-alt"></i>
                        <span>Cancel Withdraw</span>
                    </button>
                    @endif

                    @if($withdraw->status == 'processing')
                        <button type="button" class="btn btn-success btn-lg"
                                onclick="completeWithdraw()">
                            <i class="fas fa-check"></i>
                            <span>Complete Withdraw</span>
                        </button>
                    @endif

                    <button type="button" class="btn btn-secondary btn-lg"
                            onclick="commentWithdraw()">
                        <i class="fas fa-trash-alt"></i>
                        <span>Add a comment to Withdraw</span>
                    </button>


                    <form id="process-withdraw"
                          action="{{ route('app.withdraws.process',$withdraw->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>

                    <form id="complete-withdraw"
                          action="{{ route('app.withdraws.complete',$withdraw->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>

                    <form id="cancel-withdraw"
                          action="{{ route('app.withdraws.cancel',$withdraw->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>

                    <form id="comment-form"
                          action="{{ route('app.withdraws.comment',$withdraw->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                        <input id="comment" type="text" name="comment">
                    </form>

                    <a href="{{ route('app.withdraws.index') }}" class="btn-shadow btn btn-danger">
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
                            <td>{{ $withdraw->user->first_name.' '.$withdraw->user->last_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Username:</th>
                            <td>{{ $withdraw->user->username }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Email:</th>
                            <td>{{ $withdraw->user->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone:</th>
                            <td>{{ $withdraw->user->phone }}</td>
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

                        @foreach($withdraw->user->balances as $balance)
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
                            <th scope="row">Withdraw Status:</th>
                            <td>
                                @if ($withdraw->status == 'pending')
                                    <div class="badge badge-warning">Pending</div>
                                @elseif($withdraw->status == 'processing')
                                    <div class="badge badge-primary">Processing</div>
                                @elseif($withdraw->status == 'completed')
                                    <div class="badge badge-success">Completed</div>
                                @elseif($withdraw->status == 'cancelled')
                                    <div class="badge badge-danger">Cancelled</div>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Bank Name</th>
                            <td>{{ $withdraw->bank->bank_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Account Holder</th>
                            <td>{{ $withdraw->bank->account_holder }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Account No</th>
                            <td>{{ $withdraw->bank->account_no }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Swift Code</th>
                            <td>{{ $withdraw->bank->swift_code }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Branch Details</th>
                            <td>{{ $withdraw->bank->branch_details }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Amount</th>
                            <td>{{ $withdraw->amount .' '. $withdraw->currency->display }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Fee</th>
                            <td>{{ $withdraw->fee .' '. $withdraw->currency->display }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Total</th>
                            <td>{{ $withdraw->total .' '. $withdraw->currency->display }}</td>
                        </tr>
                        <tr>
                            <th scope="row">User Note</th>
                            <td>{{ $withdraw->note }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Withdraw At:</th>
                            <td>{{ $withdraw->created_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Last Modified At:</th>
                            <td>{{ $withdraw->updated_at->diffForHumans() }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Admin Comment</th>
                            <td>{{ $withdraw->comment ?? 'null' }}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
