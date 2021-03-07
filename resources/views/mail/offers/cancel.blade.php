@component('mail::message')

@if($type == 'buyer')
### Hello, {{$trade->buyer->first_name}} {{$trade->buyer->last_name}}
@elseif($type == 'seller')
### Hello, {{$trade->seller->first_name}} {{$trade->seller->last_name}}
@endif

You Trade ({{$trade->trx_id}}) has been cancelled.

#### Transaction Number : {{$trade->trx_id}}

@if($type == 'buyer')
@component('mail::button', ['url' => route('trades.buy.info',$trade->trx_id)])
See Details
@endcomponent

@elseif($type == 'seller')
@component('mail::button', ['url' => route('trades.sell.info',$trade->trx_id)])
See Details
@endcomponent

@endif
Thanks,<br>
{{ config('app.name') }}
@endcomponent
