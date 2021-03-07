@extends('layouts.backend.app')

@section('title','Giftcard')

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
                <div>{{ __('All Giftcard') }}</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('app.giftcard.buy.create') }}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-plus-circle fa-w-20"></i>
                        </span>
                        {{ __('Create Card') }}
                    </a>
                </div>
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
                            <th class="text-center">USD RATE</th>
                            <th class="text-center">NAIRA RATE</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($cards as $key=>$card)
                                <tr>
                                    <td class="text-center text-muted">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $card->name }}</td>
                                    <td class="text-center">{{ $card->usd_rate }}</td>
                                    <td class="text-center">{{ $card->naira_rate }}</td>
                                    <td class="text-center">
                                        @if ($card->status)
                                            <div class="badge badge-success">Active</div>
                                        @else
                                            <div class="badge badge-danger">Inactive</div>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $card->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-secondary btn-sm" href="{{ route('app.giftcard.buy.show',$card->id) }}"><i
                                                class="fas fa-eye"></i>
                                            <span>Show</span>
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('app.giftcard.buy.edit',$card->id) }}"><i
                                                class="fas fa-edit"></i>
                                            <span>Edit</span>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                                onclick="deleteData({{ $card->id }})">
                                            <i class="fas fa-trash-alt"></i>
                                            <span>Delete</span>
                                        </button>
                                        <form id="delete-form-{{ $card->id }}"
                                              action="{{ route('app.giftcard.buy.destroy',$card->id) }}" method="POST"
                                              style="display: none;">
                                            @csrf()
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
