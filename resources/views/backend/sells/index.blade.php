@extends('layouts.backend.app')

@section('title','Sell Cryptos')

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
                <div>{{ __('Sell Orders') }}</div>
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
                                    <td class="text-center">{{ $deposit->sell_amount.' '.$deposit->currency->display }}</td>
                                    <td class="text-center">

                                            <div class="badge badge-success">{{$deposit->status}}</div>

                                    </td>
                                    <td class="text-center">{{ $deposit->created_at->diffForHumans() }}</td>
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
