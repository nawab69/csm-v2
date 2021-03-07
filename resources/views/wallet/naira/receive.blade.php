@extends('layouts.user.app')

@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Receive USD</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Receive USD</li>
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
                        <h4 class="card-title">Receive USD</h4>
                        <h5>Scan The Qrcode to show your username</h5>
                        <div class="d-flex justify-content-center">
                            <div>
                                {!! QrCode::size(240)->generate(auth()->user()->username) !!}
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <code style="color: #1C1C1C;font-size: 1.2em;border-bottom: 1px groove #1f6fb2; padding: 2px 5px">{{auth()->user()->username}}</code>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card">
                    <div class="card-title d-flex justify-content-between">
                        <h2>Receive History</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-de mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Transactions ID</th>
                                    <th>Sender</th>
                                    <th>Amount</th>
                                    <th>Note</th>
                                    <th>Timestamp</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($receives as $key=>$trx)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$trx->trx_id}}</td>
                                        <td>{{$trx->send->user->username}}</td>
                                        <td>{{$trx->amount}} {{$trx->currency}}</td>
                                        <td>{{$trx->note}}</td>
                                        <td>{{\Carbon\Carbon::parse($trx->created_at)->diffForHumans()}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <div>{{$receives->links()}}</div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- End Container fluid  -->
@endsection

@push('js')
    <!--Custom JavaScript -->
    <script src="{{asset('assets/dashboard/js/lib/webticker/jquery.webticker.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/lib/peitychart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/js/dashboard-1.js')}}"></script>

@endpush
