@component('mail::message')

#### Hello, {{$deposit->user->first_name}}

Sorry ! Deposit Cancelled.

We have cancelled your deposit ({{$deposit->trx_id}}). If you face any problem , feel free to contact us.

### Transaction Id : {{$deposit->trx_id}}


| Name | {{$deposit->user->first_name}} {{$deposit->user->last_name}} |
|--|--|
|Email  | {{$deposit->user->email}} |
| Currency | {{$deposit->currency->name}} |
| Amount | {{$deposit->amount}} {{$deposit->currency->display}} |
| Username | {{$deposit->user->username}} |
| User ID | {{$deposit->user_id}} |
| Status | {{$deposit->status}} |



### Payment Details

@if($deposit->payment_method_id == null)



| Payment Type| Bank Deposit|
|--|--|
|Bank Name| {{$deposit->bank_name}} |
| Account Holder| {{$deposit->account_holder}}|
| Account No | {{$deposit->account_no}} |
| Swift Code| {{$deposit->swift_code}}|
| Branch Details | {{$deposit->branch_details ?? ''}} |
| Note| {{$deposit->note ?? ''}}|

@else



| Payment Type| {{$deposit->payment_method->name}}|
|--|--|

@endif




@component('mail::button', ['url' => route('user.deposit.show',$deposit->trx_id)])
See Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
