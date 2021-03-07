@extends('layouts.backend.app')

@section('title','Payment Methods')

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
                <div>{{ __('Payment Methods') }}</div>
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
                            <th class="text-center">Deposit Rate</th>
                            <th class="text-center">Withdraw Rate</th>
                            <th class="text-center">Details</th>
                            <th class="text-center">Deposit Status</th>
                            <th class="text-center">Withdraw Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($pmethods as $key=>$deposit)
                                <tr>
                                    <td class="text-center text-muted">#{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $deposit->name }}</td>
                                    <td class="text-center">{{ $deposit->deposit_rate }}</td>
                                    <td class="text-center">{{ $deposit->withdraw_rate }}</td>
                                    <td class="text-center">{{ $deposit->details }}</td>
                                    <td class="text-center">
                                        @if ($deposit->deposit== 1)
                                            <div class="badge badge-success">ACTIVE</div>
                                        @elseif ($deposit->deposit== 0)
                                            <div class="badge badge-danger">INACTIVE</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($deposit->withdraw== 1)
                                            <div class="badge badge-success">ACTIVE</div>
                                        @elseif ($deposit->withdraw== 0)
                                            <div class="badge badge-danger">INACTIVE</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
{{--                                        <a class="btn btn-secondary btn-sm" href="{{ route('app.pmethod.show',$deposit->id) }}"><i--}}
{{--                                                class="fas fa-eye"></i>--}}
{{--                                            <span>Show</span>--}}
{{--                                        </a>--}}
                                        <a class="btn btn-info btn-sm" href="{{ route('app.pmethod.edit',$deposit->id) }}"><i
                                                class="fas fa-pencil"></i>
                                            <span>Edit</span>
                                        </a>
                                        <a onclick="deleteData({{$deposit->id}})" class="btn btn-danger btn-sm" href="#"><i
                                                class="fas fa-trash"></i>
                                            <span>Delete</span>
                                        </a>

                                        <form id="delete-form-{{$deposit->id}}" action="{{ route('app.pmethod.delete',$deposit->id) }}" method="post" hidden>
                                            @csrf
                                            @method('DELETE')
                                        </form>

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
