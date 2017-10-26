@extends('comps.compd')


@section('compd_content')
    <script>
     $(document).ready(function(){
	 $("#new-serv").click(function(){
	     $('.serv-class').toggle()
	 });

	 $('#srange').on('change', function(){
	     if($('#srange').val() == 1)
		 $("#serv-dates").show();
	     else if($('#srange').val() == 0)
		 $("#serv-dates").hide();
	     
	 });

	 $("#new-miss").click(function(){
	     $('.miss-class').toggle()
	 });
	 
	 $('#mrange').on('change', function(){
	     if($('#mrange').val() == 1)
		 $("#miss-dates").show();
	     else if($('#mrange').val() == 0)
		 $("#miss-dates").hide();
	     
	 });


	 $("#all-services").click(function(){
	     $('.all-services-class').toggle()
	 });

	 $("#all-miss").click(function(){
	     $('.all-miss-class').toggle()
	 });
     });
    </script>
    @if($comp->comp_sort == 'both_comp')
	@include('comps.new-service')
	@include('comps.new-miss')
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
		<a href="">عرض المتقدمين بانتظار الموافقة لهذه الخدمة</a>
		<br/>
		---------
		<br/>
	    @endforeach
	</div>


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
		<a href="">عرض المتقدمين بانتظار الموافقة لهذه المهمة</a>
		<br/>
		---------
		<br/>
	    @endforeach
	</div>
    @elseif($comp->comp_sort == 'doner_comp')
	@include('comps.new-service')
    @elseif($comp->comp_sort == 'bene_comp')
	@include('comps.new-miss')
	Include the layout of benefits comps here
    @endif
@endsection
