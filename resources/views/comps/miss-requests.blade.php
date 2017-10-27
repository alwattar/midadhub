@foreach($miss_requests as $mr)
    ------
    <br/>
    MISSION NAME: {{$mr->miss_name}}
    <br/>
    STATUS: {{$mr->miss_req_status}}
    <br/>
    USERNAME: {{$mr->u_username}}
    <br/>
    fName: {{$mr->u_fname}}
    <br/>
    fName: {{$mr->u_lname}}
    <br/>
    <a href="{{route('accept-miss', [$mr->miss_miss_id, $mr->u_id, 'accept'])}}">Accept</a> | <a href="{{route('accept-miss', [$mr->miss_miss_id, $mr->u_id, 'reject'])}}">Reject</a>
    <br/>
    ------
    <br/>
    
@endforeach
