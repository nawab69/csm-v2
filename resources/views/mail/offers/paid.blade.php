@component('mail::message')
### Hello, {{$trade->seller->username}}

Buyer marked your Order ({{$trade->trx_id}}) as paid.

#### Transaction Number : {{$trade->trx_id}}

@component('mail::button', ['url' => route('sell.trades.sell.info',$trade->info)])
Go to Trades
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
