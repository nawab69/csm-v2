@extends('layouts.user.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Giftcard Sell</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Giftcard Sell</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card py-5 px-5">
                    <div class="card-body">
                        <h4 class="card-title">Giftcard</h4>
                        <h6 class="card-subtitle">Giftcard Your wallet from Your Bank</h6>
                        <!-- form start -->
                        <form role="form" class="form-horizontal p-t-20" id="bankForm" method="POST"
                              action="{{route('user.giftcard.sellNow')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="card" class="col-sm-3 control-label">Select Giftcard</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Select Giftcard</label>
                                        <select id="card" name="card" class="form-control">
                                            @foreach($cards as $card)
                                            <option data-usdrate="{{$card->usd_rate}}" data-nairarate="{{$card->naira_rate}}" value="{{$card->id}}">{{$card->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="currency" class="col-sm-3 control-label">Select Currency</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Select Currency</label>
                                        <select id="currency" name="currency" class="form-control">
                                            <option value="usd">USD</option>
                                            <option value="naira">NAIRA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 control-label">Giftcard Amount*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-coins"></i></div>
                                        <input type="text" name="amount"
                                               class="form-control form-type"
                                               id="amount"
                                               placeholder="Giftcard Amount"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="get_amount" class="col-sm-3 control-label">You will receive*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-coins"></i></div>
                                        <input type="text" name="get_amount"
                                               class="form-control form-type"
                                               id="get_amount"
                                               placeholder="Receive Amount"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>






                            <div class="form-group row">
                                <label for="note" class="col-sm-3 control-label">Note *</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea type="text" rows="2" style="height: 100%" class="form-control" id="note" name="note" placeholder="Additional Note"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-sm-3 control-label">Giftcard Image</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="file" name="image"
                                               class="dropify"
                                               id="image"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row m-b-0">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-dark waves-effect waves-light">Submit</button>
                                    <a href="#" onclick="location.reload()" class="btn btn-dark waves-effect waves-light">Reset</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
@endsection

@push('js')
    <!--Custom JavaScript -->
    <script src="{{asset('assets/dashboard/js/lib/webticker/jquery.webticker.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/lib/peitychart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dashboard-1.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script>
        $('.dropify').dropify();
        const card = document.getElementById('card');
        const amount = document.getElementById('amount');
        const get_amount    = document.getElementById('get_amount');
        const currency = document.getElementById('currency');

        card.addEventListener('change',calculateAmount);
        amount.addEventListener('change',calculateAmount);
        amount.addEventListener('change',calculateAmount);
        currency.addEventListener('change',calculateAmount);

        function calculateAmount(){
            let selected = '';
            if(currency.value === 'usd') {
                selected = card.options[card.selectedIndex].dataset.usdrate;
            }
            else if(currency.value === 'naira') {
                selected = card.options[card.selectedIndex].dataset.nairarate;
            }
            get_amount.value = amount.value * selected;
        }
    </script>
@endpush
