@extends('layouts.backend.app')

@section('title','Currency')

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
                <div>{{ __('Currency') }}</div>
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
                            <th class="text-center">Name</th>
                            <th class="text-center">Code</th>
                            <th class="text-center">Display</th>
                            <th class="text-center">Default Rate</th>
                            <th class="text-center">Status</th>
{{--                            <th class="text-center">Actions</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($currencies as $key=>$deposit)
                                <tr>
                                    <td class="text-center text-muted">#{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $deposit->name }}</td>
                                    <td class="text-center">{{ $deposit->code }}</td>
                                    <td class="text-center">{{ $deposit->display }}</td>
                                    <td class="text-center">{{ $deposit->default_rate }}</td>
                                    <td class="text-center">
                                        @if ($deposit->status== 1)
                                            <div class="badge badge-success">ACTIVE</div>
                                        @elseif ($deposit->status== 0)
                                            <div class="badge badge-danger">INACTIVE</div>
                                        @endif
                                    </td>
{{--                                    <td class="text-center">--}}
{{--                                        <a class="btn btn-secondary btn-sm" href="{{ route('app.buys.show',$deposit->id) }}"><i--}}
{{--                                                class="fas fa-eye"></i>--}}
{{--                                            <span>Show</span>--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
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
