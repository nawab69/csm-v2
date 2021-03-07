@component('mail::message')
## Hello, {{$receive->user->first_name}} {{$receive->user->last_name}}

You have received {{$receive->amount}} {{$receive->currency->display}}  from {{$send->user->username}}

# TRX ID : {{$receive->trx_id}}

| | |
|--|--|
| Sender | {{$send->user->username}} |
| Amount  | {{$receive->total}} {{$receive->currency->display}}|
| Message | {{$receive->note ?? ''}}|

Thanks,<br>
{{ config('app.name') }}
@endcomponent
