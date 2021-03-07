@extends('layouts.user.app')
@push('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('title','Profile')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Profile</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </div>
    </div>
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
    <form method="POST" action="{{ route('users.profile.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">

            <div class="col-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">PROFILE PHOTO</div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-6 mx-auto">
                                <div class="position-relative form-group">
                                    <label for="avatar">Avatar (Only Image are allowed) </label>
                                    <input type="file" name="avatar" id="avatar"
                                           class="dropify @error('avatar') is-invalid @enderror"
                                           data-default-file="{{ Auth::user()->getFirstMediaUrl('avatar','thumb') ?? '' }}">
                                    @error('avatar')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">CONTACT INFORMATION</div>

                    <div class="card-body mt-5">
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                       name="first_name" value="{{ Auth::user()->first_name ?? old('first_name') }}" required
                                       autocomplete="first_name" autofocus>

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                       name="last_name" value="{{ Auth::user()->last_name ?? old('last_name') }}" required
                                       autocomplete="last_name" autofocus>

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                       name="phone" value="{{ Auth::user()->phone ?? old('phone') }}" required
                                       autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ Auth::user()->email ?? old('email') }}" required
                                       autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-arrow-circle-up"></i>
                                    <span>Update</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!--Custom JavaScript -->
    <script src="{{asset('assets/dashboard/js/lib/webticker/jquery.webticker.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/lib/peitychart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dashboard-1.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endpush
