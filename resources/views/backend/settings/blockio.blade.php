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
                <div>BlockIo Settings</div>
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
            <form id="settingsFrom" autocomplete="off" role="form" method="POST" action="{{ route('app.settings.blockio.update') }}">
                @csrf
                @method('PATCH')
                <!-- general form elements -->
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="btc_api">BTC API <code>{ key: btc_api }</code></label>
                                    <input type="text" name="btc_api" id="btc_api"
                                           class="form-control @error('btc_api') is-invalid @enderror"
                                           value="{{ setting('btc_api') ?? old('btc_api') }}"
                                           placeholder="BTC API">
                                    @error('btc_api')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="ltc_api">LTC API <code>{ key: ltc_api }</code></label>
                                    <input type="text" name="ltc_api" id="ltc_api"
                                           class="form-control @error('ltc_api') is-invalid @enderror"
                                           value="{{ setting('ltc_api') ?? old('ltc_api') }}"
                                           placeholder="LTC API">
                                    @error('ltc_api')
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
                                    <label for="doge_api">DOGE API <code>{ key: doge_api }</code></label>
                                    <input type="text" name="doge_api" id="doge_api"
                                           class="form-control @error('doge_api') is-invalid @enderror"
                                           value="{{ setting('doge_api') ?? old('doge_api') }}"
                                           placeholder="DOGE API">
                                    @error('doge_api')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="blockio_pin">PIN <code>{ key: blockio_pin }</code></label>
                                    <input type="text" name="blockio_pin" id="blockio_pin"
                                           class="form-control @error('blockio_pin') is-invalid @enderror"
                                           value="{{ setting('blockio_pin') ?? old('blockio_pin') }}"
                                           placeholder="PIN">
                                    @error('blockio_pin')
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
