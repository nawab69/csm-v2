@component('mail::message')
### Hello, {{$trade->seller->first_name}} {{$trade->seller->last_name}}

You got a Buy Request from {{$trade->buyer->username}} .

#### Transaction Number : {{$trade->trx_id}}

@component('mail::button', ['url' => route('trades.sell.info',$trade->trx_id)])
See Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
