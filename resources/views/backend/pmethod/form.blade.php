@extends('layouts.backend.app')

@section('title','Payment Method')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>{{ __((isset($pmethod) ? 'Edit' : 'Create New') . ' Payment Method') }}</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('app.pmethod.index') }}" class="btn-shadow btn btn-danger">
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
            <form role="form" id="userFrom" method="POST"
                  action="{{ isset($pmethod) ? route('app.pmethod.update',$pmethod->id) : route('app.pmethod.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @if (isset($pmethod))
                    @method('PATCH')
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Payment Method Info</h5>

                                <x-forms.textbox label="Method Name"
                                                 name="name"
                                                 value="{{ $pmethod->name ?? ''  }}"
                                                 field-attributes="required autofocus">
                                </x-forms.textbox>
                                <x-forms.textbox label="Deposit Rate"
                                                 name="deposit_rate"
                                                 value="{{ $pmethod->deposit_rate ?? ''  }}"
                                                 field-attributes="required autofocus">
                                </x-forms.textbox>
                                <x-forms.textbox label="Withdraw Rate"
                                                 name="withdraw_rate"
                                                 value="{{ $pmethod->withdraw_rate ?? ''  }}"
                                                 field-attributes="required autofocus">
                                </x-forms.textbox>



                                <x-forms.textbox label="Details"
                                                 name="details"
                                                 value="{{ $pmethod->details ?? ''  }}"
                                                 field-attributes="required autofocus">
                                </x-forms.textbox>

                                <x-forms.checkbox label="Deposit Status"
                                                  name="deposit"
                                                  class="custom-switch"
                                                  :value="$pmethod->deposit ?? null" />
                                <x-forms.checkbox label="Withdraw Status"
                                                  name="withdraw"
                                                  class="custom-switch"
                                                  :value="$pmethod->withdraw ?? null" />
                                <x-forms.button label="Reset" class="btn-danger" icon-class="fas fa-redo" on-click="resetForm('userFrom')"/>


                                @isset($pmethod)
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
