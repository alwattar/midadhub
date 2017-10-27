<h3 id="all-miss">
    <div>
	عرض جميع المهمات
    </div>
</h3>
<div class="all-miss-class" style="display:none">
    @if(count($missions) < 1)
	لا يوجد مهمات
    @endif
    @foreach($missions as $miss)
	---------
	<br/>
	اسم المهمة : {{$miss->miss_name}} |
	<a href="{{route('miss-requests', $miss->miss_id)}}">عرض المتقدمين بانتظار الموافقة لهذه المهمة</a>
	<br/>
	---------
	<br/>
    @endforeach
</div>
