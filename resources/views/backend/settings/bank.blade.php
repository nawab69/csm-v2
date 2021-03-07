@extends('layouts.backend.app')

@section('title','BlockIo Settings')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-settings icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Bank Settings</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            @include('backend.settings.sidebar')
        </div>
        <!-- left column -->
        <div class="col-md-9">
            {{-- how to use callout --}}
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">How To Use:</h5>
                    <p>You can get the value of each setting anywhere on your site by calling <code>setting('key')</code></p>
                </div>
            </div>
            <!-- form start -->
            <form id="settingsFrom" autocomplete="off" role="form" method="POST" action="{{ route('app.settings.fee.update') }}">
                @csrf
                @method('PATCH')
                <!-- general form elements -->
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="bank_name">Bank Name<code>{ key: bank_name }</code></label>
                                    <input type="text" name="bank_name" id="bank_name"
                                           class="form-control @error('bank_name') is-invalid @enderror"
                                           value="{{ setting('bank_name') ?? old('bank_name') }}"
                                           placeholder="Bank Name">
                                    @error('bank_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="account_holder">Account Holder <code>{ key: account_holder }</code></label>
                                    <input type="text" name="account_holder" id="account_holder"
                                           class="form-control @error('account_holder') is-invalid @enderror"
                                           value="{{ setting('account_holder') ?? old('account_holder') }}"
                                           placeholder="Account Holder">
                                    @error('account_holder')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="bank_name">Account No<code>{ key: account_no }</code></label>
                                    <input type="text" name="account_no" id="account_no"
                                           class="form-control @error('account_no') is-invalid @enderror"
                                           value="{{ setting('account_no') ?? old('account_no') }}"
                                           placeholder="Account No">
                                    @error('account_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="swift_code">Swift Code <code>{ key: swift_code }</code></label>
                                    <input type="text" name="swift_code" id="swift_code"
                                           class="form-control @error('swift_code') is-invalid @enderror"
                                           value="{{ setting('swift_code') ?? old('swift_code') }}"
                                           placeholder="Swift Code">
                                    @error('swift_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="bank_name">Bank Details<code>{ key: bank_details }</code></label>
                                    <input type="text" name="bank_details" id="bank_details"
                                           class="form-control @error('bank_details') is-invalid @enderror"
                                           value="{{ setting('bank_details') ?? old('bank_details') }}"
                                           placeholder="Bank Details">
                                    @error('bank_details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <button type="button" class="btn btn-danger" onClick="resetForm('settingsFrom')">
                            <i class="fas fa-redo"></i>
                            <span>Reset</span>
                        </button>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-arrow-circle-up"></i>
                            <span>Update</span>
                        </button>

                    </div>
                </div>
                <!-- /.card -->
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
