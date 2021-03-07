@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">All available Offers</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">All available Offers</li>
            </ol>
        </div>
    </div>


    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card">
                    <div class="card-title">
                        <h4>Available Offers </h4>
                    </div>
                    @if($type === 'sell')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>

                                <tr>
                                    <th>Buyer</th>
                                    <th>Sell For</th>
                                    <th>Details</th>
                                    <th>Currency</th>
                                    <th>Rate</th>
                                    <th>Limit</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($offers as $offer)
                                <tr>
                                    <td>
                                        {{$offer->user->username}}
                                    </td>
                                    <td>{{$offer->method->name}}</td>

                                    <td> <strong> {{$offer->title}} </strong> <br />
                                        {{$offer->extra_info ?? ''}}
                                    </td>

                                    <td><span class="badge badge-info">{{$offer->currency->name}}</span></td>
                                    <td><span>{{$offer->currency->display}} {{$offer->rate}}</span></td>
                                    <td><span> Min: {{$offer->currency->display}} {{$offer->min}}, Max: {{$offer->currency->display}} {{$offer->max}} <br/>
                                        Your Available Balance: {{getBalance(auth()->user()->id,$offer->currency->id)}}
                                        </span></td>
                                    <td><a href="{{route('trades.sell.offer',$offer->id)}}" class="btn btn-info">Sell</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Buy from</th>
                                        <th>Pay With</th>
                                        <th>Details</th>
                                        <th>Currency</th>
                                        <th>Rate</th>
                                        <th>Limit</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($offers as $offer)
                                    <tr>
                                        <td>
                                            {{$offer->user->username}}
                                        </td>
                                        <td>{{$offer->method->name}}</td>
                                        <td> <strong> {{$offer->title}} </strong> <br />
                                            {{$offer->extra_info ?? ''}}
                                        </td>
                                        <td><span class="badge badge-info">{{$offer->currency->name}}</span></td>
                                        <td><span>{{$offer->currency->display}} {{$offer->rate}}</span></td>
                                        <td><span> Min: {{$offer->currency->display}} {{$offer->min}}, Max: {{$offer->currency->display}} {{$offer->max}}
                                            Buyer Available Balance: {{getBalance($offer->user->id,$offer->currency->id)}}
                                            </span></td>
                                        <td><a href="{{route('trades.buy.offer',$offer->id)}}" class="btn btn-info">Buy</a></td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

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
{{--    <script src="{{asset('js/delete.js')}}"></script>--}}
@endpush
