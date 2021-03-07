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
                <div>Fee Settings</div>
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
                                    <label for="btc_api">SEND FEE (%)<code>{ key: fee_send_usd }</code></label>
                                    <input type="text" name="fee_send_usd" id="fee_send_usd"
                                           class="form-control @error('fee_send_usd') is-invalid @enderror"
                                           value="{{ setting('fee_send_usd') ?? old('fee_send_usd') }}"
                                           placeholder="SEND USD FEE">
                                    @error('fee_send_usd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
{{--                            <div class="col">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="ltc_api">SEND NAIRA FEE <code>{ key: fee_send_naira }</code></label>--}}
{{--                                    <input type="text" name="fee_send_naira" id="fee_send_naira"--}}
{{--                                           class="form-control @error('fee_send_naira') is-invalid @enderror"--}}
{{--                                           value="{{ setting('fee_send_naira') ?? old('fee_send_naira') }}"--}}
{{--                                           placeholder="SEND NAIRA FEE ">--}}
{{--                                    @error('fee_send_naira')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col">
                                <div class="form-group">
                                    <label for="doge_api">WITHDRAWAL FEE (%)<code>{ key: fee_withdraw_usd }</code></label>
                                    <input type="text" name="fee_withdraw_usd" id="fee_withdraw_usd"
                                           class="form-control @error('fee_withdraw_usd') is-invalid @enderror"
                                           value="{{ setting('fee_withdraw_usd') ?? old('fee_withdraw_usd') }}"
                                           placeholder="USD WITHDRAWAL FEE">
                                    @error('fee_withdraw_usd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
{{--                        <div class="form-row">--}}
{{--                            --}}
{{--                            <div class="col">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="blockio_pin">NAIRA WITHDRAWAL FEE <code>{ key: fee_withdraw_naira }</code></label>--}}
{{--                                    <input type="text" name="fee_withdraw_naira" id="fee_withdraw_naira"--}}
{{--                                           class="form-control @error('fee_withdraw_naira') is-invalid @enderror"--}}
{{--                                           value="{{ setting('fee_withdraw_naira') ?? old('fee_withdraw_naira') }}"--}}
{{--                                           placeholder="NAIRA WITHDRAWAL FEE">--}}
{{--                                    @error('fee_withdraw_naira')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="blockio_pin">SELL FEE (%)<code>{ key: fee_sell }</code></label>
                                    <input type="text" name="fee_sell" id="fee_sell"
                                           class="form-control @error('fee_sell') is-invalid @enderror"
                                           value="{{ setting('fee_sell') ?? old('fee_sell') }}"
                                           placeholder="SELL FEE">
                                    @error('fee_sell')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="blockio_pin">BUY FEE (%)<code>{ key: fee_buy }</code></label>
                                    <input type="text" name="fee_buy" id="fee_buy"
                                           class="form-control @error('fee_buy') is-invalid @enderror"
                                           value="{{ setting('fee_buy') ?? old('fee_buy') }}"
                                           placeholder="BUY FEE">
                                    @error('fee_buy')
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
                                    <label for="trade_fee">Trade FEE (%)<code>{ key: trade_fee }</code></label>
                                    <input type="text" name="trade_fee" id="trade_fee"
                                           class="form-control @error('trade_fee') is-invalid @enderror"
                                           value="{{ setting('trade_fee') ?? old('trade_fee') }}"
                                           placeholder="SELL FEE">
                                    @error('trade_fee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="notify_mail"> Notification Mail<code>{ key: notify_mail }</code></label>
                                    <input type="text" name="notify_mail" id="notify_mail"
                                           class="form-control @error('notify_mail') is-invalid @enderror"
                                           value="{{ setting('notify_mail') ?? old('notify_mail') }}"
                                           placeholder="BUY FEE">
                                    @error('notify_mail')
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
