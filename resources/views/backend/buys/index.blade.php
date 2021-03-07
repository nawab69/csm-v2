@extends('layouts.backend.app')

@section('title','Buy Orders')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ __('Buy Orders') }}</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="table-responsive">
                    <table id="datatable" class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>TRX_ID</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Sell Amount</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Order At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $key=>$deposit)
                                <tr>
                                    <td class="text-center text-muted">#{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $deposit->trx_id }}</td>
                                    <td class="text-center">{{ $deposit->user->email }}</td>
                                    <td class="text-center">{{ $deposit->user->username }}</td>
                                    <td class="text-center">{{ $deposit->amount.' '.$deposit->from_currency }}</td>
                                    <td class="text-center">{{ $deposit->sell_amount.' '.$deposit->to_currency }}</td>
                                    <td class="text-center">
                                        @if ($deposit->status== 'pending')
                                            <div class="badge badge-warning">Pending</div>
                                        @elseif ($deposit->status== 'processing')
                                            <div class="badge badge-primary">Processing</div>
                                        @elseif ($deposit->status== 'completed')
                                            <div class="badge badge-success">Completed</div>
                                        @elseif ($deposit->status== 'cancelled')
                                            <div class="badge badge-danger">Cancelled</div>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $deposit->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-secondary btn-sm" href="{{ route('app.buys.show',$deposit->id) }}"><i
                                                class="fas fa-eye"></i>
                                            <span>Show</span>
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

@push('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Datatable
            $("#datatable").DataTable();
        });
    </script>
@endpush
