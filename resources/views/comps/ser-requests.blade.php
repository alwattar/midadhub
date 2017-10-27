@foreach($ser_requests as $sr)
    ------
    <br/>
    SERVICE NAME: {{$sr->serv_name}}
    <br/>
    STATUS: {{$sr->ser_req_status}}
    <br/>
    USERNAME: {{$sr->u_username}}
    <br/>
    fName: {{$sr->u_fname}}
    <br/>
    fName: {{$sr->u_lname}}
    <br/>
    <a href="{{route('accept-serv', [$sr->ser_ser_id, $sr->u_id, 'accept'])}}">Accept</a> | <a href="{{route('accept-serv', [$sr->ser_ser_id, $sr->u_id, 'reject'])}}">Reject</a>
    <br/>
    ------
    <br/>
    
@endforeach
