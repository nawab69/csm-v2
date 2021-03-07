@extends('layouts.backend.app')

@section('title','Dashboard')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Dashboard</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Total Users</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success">{{ $usersCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Pending Deposit</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning">{{ $depositPendingCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Pending Withdraw</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning">{{ $withdrawPendingCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Pending Buy Orders</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning">{{ $buyPendingCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Pending Kyc Verification</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning">{{ $kycSubmittedCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Disputes Trade</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning">{{ $disputeCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Processing Deposit</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-primary">{{ $depositProcessingCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Processing Withdraw</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-primary">{{ $withdrawProcessingCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Processing Buy Orders</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-primary">{{ $buyProcessingCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Completed Deposit</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success">{{ $depositCompletedCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Completed Withdraw</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success">{{ $withdrawCompletedCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Completed Buy Orders</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success">{{ $buyCompletedCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Cancelled Deposit</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-danger">{{ $depositCancelledCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Cancelled Withdraw</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-danger">{{ $withdrawCancelledCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Cancelled Buy Orders</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-danger">{{ $buyCancelledCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Sells</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success">{{ $sellCount }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Last Logged In Users</div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Last Login At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key=>$user)
                            <tr>
                                <td class="text-center text-muted">#{{ $key + 1 }}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle"
                                                         src="{{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar','thumb') : config('app.placeholder').'160' }}" alt="User Avatar">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ $user->name }}</div>
                                                <div class="widget-subheading opacity-7">
                                                    @if ($user->role)
                                                        <span class="badge badge-info">{{ $user->role->name }}</span>
                                                    @else
                                                        <span class="badge badge-danger">No role found :(</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">{{ $user->last_login_at }}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm" href="{{ route('app.users.show',$user->id) }}"><i
                                            class="fas fa-eye"></i>
                                        <span>Details</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
