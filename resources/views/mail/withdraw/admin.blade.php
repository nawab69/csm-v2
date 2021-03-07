@component('mail::message')

We have received a withdrawal request from **{{$withdraw->user->first_name}} {{$withdraw->user->last_name}}**  via  **{{($withdraw->payment_method_id == null) ? 'Bank Deposit' : $withdraw->payment_method->name}}** .

### Transaction Id : {{$withdraw->trx_id}}


| Name | {{$withdraw->user->first_name}} {{$withdraw->user->last_name}} |
|--|--|
|Email  | {{$withdraw->user->email}} |
| Currency | {{$withdraw->currency->name}} |
| Amount | {{$withdraw->amount}} {{$withdraw->currency->display}} |
| Username | {{$withdraw->user->username}} |
| User ID | {{$withdraw->user_id}} |
| Status | {{$withdraw->status}} |

### Payment Details

@if($withdraw->payment_method_id == null)

| Payment Type| Bank Deposit|
|--|--|
|Bank Name| {{$withdraw->bank->bank_name}} |
| Account Holder| {{$withdraw->bank->account_holder}}|
| Account No | {{$withdraw->bank->account_no}} |
| Swift Code| {{$withdraw->bank->swift_code}}|
| Branch Details | {{$withdraw->bank->branch_details ?? ''}} |
| Note| {{$withdraw->note ?? ''}}|

@else

| Payment Type| {{$withdraw->payment_method->name}}|
|--|--|

@endif




@component('mail::button', ['url' => route('app.withdraws.show',$withdraw->trx_id)])
See Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
