@extends('layouts.backend.app')

@section('title','Giftcard Buy Orders')

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
                <div>{{ __('All Kyc Verification Request') }}</div>
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
                            <th class="text-center">Email</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">status</th>
                            <th class="text-center">Submitted At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($kycs as $key=>$deposit)
                                <tr>
                                    <td class="text-center text-muted">#{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $deposit->user->email }}</td>
                                    <td class="text-center">{{ $deposit->user->username }}</td>
                                    <td class="text-center">
                                        @if ($deposit->id_status== 'submitted')
                                            <div class="badge badge-warning">Submitted</div>
                                        @elseif ($deposit->id_status== 'verified')
                                            <div class="badge badge-success">Verified</div>
                                        @elseif ($deposit->id_status== 'cancelled')
                                            <div class="badge badge-danger">Cancelled</div>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $deposit->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-secondary btn-sm" href="{{ route('app.kycs.show',$deposit->id) }}"><i
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
