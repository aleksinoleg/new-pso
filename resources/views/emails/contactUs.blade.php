<p>New message/question from </p>
{{$data['email']}}
<p>
    {{$data['message']}}
</p>

<p>
    @if(isset($data['tel']) && !empty($data['tel']))
        Phone number is {{$data['tel']}}
    @endif
</p>

