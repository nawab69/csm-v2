@component('mail::message')
### Hello, {{$trade->buyer->first_name}} {{$trade->buyer->last_name}}

You got a Sell Request from {{$trade->seller->username}} .

#### Transaction Number : {{$trade->trx_id}}

@component('mail::button', ['url' => route('trades.buy.info',$trade->trx_id)])
See Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

