@component('mail::message')

### Hello,

You got a contact Form Mail

Mail sender name: {{$data['firstname']}}  {{$data['lastname']}}

Email :  {{$data['email']}}


Subject: {{$data['subject']}}

------------------

#### Message

{{$data['message']}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
