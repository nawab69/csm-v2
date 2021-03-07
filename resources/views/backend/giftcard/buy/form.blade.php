@extends('layouts.backend.app')

@section('title','Cards')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ __((isset($buy) ? 'Edit' : 'Create New') . ' Card') }}</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
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
        <div class="col-12">
            <!-- form start -->
            <form role="form" id="cardFrom" method="POST"
                  action="{{ isset($buy) ? route('app.giftcard.buy.update',$buy->id) : route('app.giftcard.buy.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @if (isset($buy))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Card Info</h5>

                                <x-forms.textbox label="Card Name"
                                                 name="name"
                                                 value="{{ $buy->name ?? ''  }}"
                                                 field-attributes="required autofocus">
                                </x-forms.textbox>
                                <x-forms.textbox label="USD Rate"
                                                 name="usd_rate"
                                                 value="{{ $buy->usd_rate ?? ''  }}"
                                                 field-attributes="required autofocus">
                                </x-forms.textbox>

                                <x-forms.textbox label="Naira Rate"
                                                 name="naira_rate"
                                                 value="{{ $buy->naira_rate ?? ''  }}"
                                                 field-attributes="required autofocus">
                                </x-forms.textbox>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-4">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Status</h5>

                                <x-forms.checkbox label="Status"
                                                  name="status"
                                                  class="custom-switch"
                                                  :value="$buy->status ?? null" />


                                <x-forms.button label="Reset" class="btn-danger" icon-class="fas fa-redo" on-click="resetForm('cardFrom')"/>


                                @isset($buy)
                                    <x-forms.button type="submit" label="Update" icon-class="fas fa-arrow-circle-up"/>
                                @else
                                    <x-forms.button type="submit" label="Create" icon-class="fas fa-plus-circle"/>
                                @endisset
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
