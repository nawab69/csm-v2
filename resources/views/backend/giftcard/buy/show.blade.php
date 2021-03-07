@extends('layouts.backend.app')

@section('title','Card Details')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ __('Card Details') }}</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('app.giftcard.buy.edit',$buy->id) }}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fas fa-edit fa-w-20"></i>
                        </span>
                        {{ __('Edit') }}
                    </a>
                    <a href="{{ route('app.giftcard.buy.index') }}" class="btn-shadow btn btn-danger">
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
        <div class="col-md-12">
            <div class="main-card card">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <tbody>
                        <tr>
                            <th scope="row">Card Name:</th>
                            <td>{{ $buy->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">USD RATE:</th>
                            <td>{{ $buy->usd_rate }}</td>
                        </tr>
                        <tr>
                            <th scope="row">NAIRA RATE:</th>
                            <td>{{ $buy->naira_rate }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Status:</th>
                            <td>
                                @if ($buy->status)
                                    <div class="badge badge-success">Active</div>
                                @else
                                    <div class="badge badge-danger">Inactive</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Joined At:</th>
                            <td>{{ $buy->created_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Last Modified At:</th>
                            <td>{{ $buy->updated_at->diffForHumans() }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
