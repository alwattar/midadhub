@foreach($all_services as $serv)
    <br/>
    -----------
    <br/>
    Service Name: {{$serv->serv_name}}
    <br/>
    @if($serv->serv_type == 'free')
	Service Points before discount: {{$serv->serv_points}}
	<br/>
	Service Points after discount: {{$afterPointsDis($serv->serv_points,$serv->serv_discount_cash,$user_lvl, true)}}
	<br/>
    @elseif($serv->serv_type == 'percent')
	Service price before discount: {{$serv->serv_price}}
	<br/>
	Service price after discount: {{$afterPercentDis($serv->serv_price,$serv->serv_discount_percent,$user_lvl, true)}}
	<br/>
    @endif
    <br/>
    @if(!$getSerStatus($serv->serv_id, $serv->serv_comp)[0])
	<a href="{{route('user.join.service', [$serv->serv_id, $serv->serv_comp])}}">Get This Service</a>
    @elseif($getSerStatus($serv->serv_id, $serv->serv_comp)[0] == 'pending')
	Pending ...
    @elseif($getSerStatus($serv->serv_id, $serv->serv_comp)[0] == 'accepted')
	accepted, Your token is: ({{$getSerStatus($serv->serv_id, $serv->serv_comp)[1]}})
    @elseif($getSerStatus($serv->serv_id, $serv->serv_comp)[0] == 'rejected')
	rejected
    @endif
    <br/>
    -----------
    <br/>
@endforeach
