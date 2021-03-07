@component('mail::message')
## Hello, {{$send->user->first_name}} {{$send->user->last_name}}

Your money is successfully send to {{$receive->user->username}}

# TRX ID : {{$send->trx_id}}

| | |
|--|--|
| Recipient | {{$receive->user->username}} |
| Amount  | {{$send->total}} {{$send->currency->display}}|
| Fee  | {{$send->fee}} {{$send->currency->display}}|
| Total charges  | {{$send->amount}} {{$send->currency->display}}|

Thanks,<br>
{{ config('app.name') }}
@endcomponent
