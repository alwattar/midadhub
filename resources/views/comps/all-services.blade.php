<h3 id="all-services">
    <div>
	عرض جميع الخدمات
    </div>
</h3>
<div class="all-services-class" style="display:none">
    @if(count($services) < 1)
	لايوجد خدمات
    @endif
    @foreach($services as $serv)
	---------
	<br/>
	اسم الخدمة : {{$serv->serv_name}} |
	<a href="{{route('serv-requests', $serv->serv_id)}}">عرض المتقدمين بانتظار الموافقة لهذه الخدمة</a>
	<br/>
	---------
	<br/>
    @endforeach
</div>
