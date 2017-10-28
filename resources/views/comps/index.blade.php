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

	 $('#stype').on('change', function(){
	     if($('#stype').val() == 'free'){
		 $("#serv-percent").hide();
		 $("#serv-free").show();
	     }
	     else if($('#stype').val() == 'percent'){
		 $("#serv-free").hide();
		 $("#serv-percent").show();
	     }
	     
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
	@include('comps.all-missions')
	@include('comps.all-services')
    @elseif($comp->comp_sort == 'doner_comp')
	@include('comps.new-service')
	@include('comps.all-services')
    @elseif($comp->comp_sort == 'bene_comp')
	@include('comps.new-miss')
	@include('comps.all-missions')
	Include the layout of benefits comps here
    @endif
@endsection
