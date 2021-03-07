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
                <div>{{ __('KYC Details') }}</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">

                    @if($kyc->id_status == 'submitted')
                    <button type="button" class="btn btn-primary btn-lg"
                            onclick="processDeposit()">
                        <i class="fas fa-trash-alt"></i>
                        <span>Mark as Verified</span>
                    </button>
                    <button type="button" class="btn btn-danger btn-lg"
                            onclick="cancelDeposit()">
                        <i class="fas fa-trash-alt"></i>
                        <span>Mark as Cancelled</span>
                    </button>
                    @endif

                    <button type="button" class="btn btn-secondary btn-lg"
                            onclick="commentDeposit()">
                        <i class="fas fa-trash-alt"></i>
                        <span>Add a comment to KYC</span>
                    </button>


                    <form id="process"
                          action="{{ route('app.kycs.approve',$kyc->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>


                    <form id="cancel-deposit"
                          action="{{ route('app.kycs.cancel',$kyc->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                    </form>

                    <form id="comment-form"
                          action="{{ route('app.kycs.comment',$kyc->id) }}" method="POST"
                          style="display: none;">
                        @csrf()
                        <input id="comment" type="text" name="comment">
                    </form>

                    <a href="{{ route('app.kycs.index') }}" class="btn-shadow btn btn-danger">
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
                            <td>{{ $kyc->user->first_name.' '.$kyc->user->last_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Username:</th>
                            <td>{{ $kyc->user->username }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Email:</th>
                            <td>{{ $kyc->user->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone:</th>
                            <td>{{ $kyc->user->phone }}</td>
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
                            <td>{{ $kyc->user->wallet->usd }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Naira Balance:</th>
                            <td>{{ $kyc->user->wallet->naira}}</td>
                        </tr>

                        <tr>
                            <th scope="row">USD in escrow:</th>
                            <td>{{ $kyc->user->escrow->usd }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Naira in escrow:</th>
                            <td>{{ $kyc->user->escrow->naira }}</td>
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
                            <th scope="row">KYC Status:</th>
                            <td>
                                @if ($kyc->id_status == 'submitted')
                                    <div class="badge badge-warning">Submitted</div>
                                @elseif($kyc->id_status == 'approved')
                                    <div class="badge badge-success">Approved</div>
                                @elseif($kyc->id_status == 'cancelled')
                                    <div class="badge badge-danger">Cancelled</div>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">First Name</th>
                            <td>{{ $kyc->user->first_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Last Name</th>
                            <td>{{ $kyc->user->last_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Primary Address</th>
                            <td>{{ $kyc->address_1 ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Secondary Address</th>
                            <td>{{ $kyc->address_1 ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">City</th>
                            <td>{{ $kyc->city ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">State</th>
                            <td>{{ $kyc->state ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Post Code</th>
                            <td>{{ $kyc->postcode ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Country</th>
                            <td>{{ $kyc->country ?? ''}}</td>
                        </tr>

                        <tr>
                            <th scope="row">Submitted At:</th>
                            <td>{{ $kyc->created_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Last Modified At:</th>
                            <td>{{ $kyc->updated_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Admin Comment</th>
                            <td>{{ $kyc->comment ?? 'null' }}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <a href="{{ isset($kyc->id_front) ? asset('storage/kyc/'.$kyc->id_front) : '#'  }}">
                                <img src="{{ isset($kyc->id_front) ? asset('storage/kyc/'.$kyc->id_front) : ''  }}" class="img-fluid img-thumbnail" alt="avatar">
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <a href="{{ isset($kyc->id_back) ? asset('storage/kyc/'.$kyc->id_back) : '#'  }}">
                                <img src="{{ isset($kyc->id_back) ? asset('storage/kyc/'.$kyc->id_back) : ''  }}" class="img-fluid img-thumbnail" alt="avatar">
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <a href="{{ isset($kyc->address_document) ? asset('storage/kyc/'.$kyc->address_document) : '#'  }}">
                                <img src="{{ isset($kyc->address_document) ? asset('storage/kyc/'.$kyc->address_document) : ''  }}" class="img-fluid img-thumbnail" alt="avatar">
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
