<div id="new-serv"><h3>انشاء خدمة جديدة</h3></div>
<div class="container serv-class" style="display:none">
    <div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
	    <div class="row">
	  	<div class="col-md-4 text-center">
		    <div id="upload-demo" style="width:350px"></div>
	  	</div>
	  	<div class="col-md-4" style="padding-top:30px;">
		    <br/><br/><br/>
		    <br/><br/><br/>
		    <br/><br/><br/>
		    <br/><br/><br/>
		    <br/><br/><br/>
		    <strong>Select Image:</strong>
		    <input type="file" id="upload">
		    <br/>
		    <span class="btn btn-success upload-result" style="display:none"></span>
	  	</div>

	  	<div class="col-md-4" style="">
		    <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px">
			<img alt="" src=""/>
		    </div>
	  	</div>
	    </div>

	</div>
    </div>
    <form id="new-service-form" onsubmit="return false;">
	<h2>خدمة جديدة</h2>
	service name <input name="name" type="text" value=""/><br/><br/>

	service location <input name="location" type="text" value=""/><br/><br/>
	service country
	<select id="" name="country">
	    <option value="">service country</option>
	    @foreach($countries as $country)
		<option value="{{$country->country_id}}">{{$country->country_name}}</option>
	    @endforeach
	</select>
	<br/>
	service city
	<select id="" name="city">
	    <option value="">service city</option>
	    @foreach($cities as $city)
		<option value="{{$city->city_id}}">{{$city->city_name}}</option>
	    @endforeach
	</select>
	<br/>
	service range
	<select id="srange" name="range">
	    <option value="0">service range</option>
	    <option value="0">No</option>
	    <option value="1">Yes</option>
	</select>
	<div id="serv-dates" style="display:none">
	    <br/>
	    service start date <input name="start_date" type="date"/><br/><br/>
	    service end date <input name="end_date" type="date"/><br/><br/>
	</div>
	<br/>
	<br/>
	service type
	<select id="stype" name="stype">
	    <option value="0">service type</option>
	    <option value="free">Free</option>
	    <option value="percent">Percent</option>
	</select>
	<br/>
	<br/>
	<div id="serv-free" style="display:none">
	    <br/>
	    service points <input name="points" type="number" value=""/><br/><br/>
	    <br/>
	    <br/>
	    Point discount new user : <input name="cash_0" type="number"/><br/><br/>
	    Point discount user lvl 1 : <input name="cash_1" type="number"/><br/><br/>
	    Point discount user lvl 2 : <input name="cash_2" type="number"/><br/><br/>
	    Point discount user lvl 3: <input name="cash_3" type="number"/><br/><br/>
	    Point discount user lvl 4 : <input name="cash_4" type="number"/><br/><br/>
	    Point discount user lvl 5 : <input name="cash_5" type="number"/><br/><br/>
	    <br/>
	</div>
	<div id="serv-percent" style="display:none">
	    <br/>
	    service price <input name="price" type="number" value=""/><br/><br/>
	    <br/>
	    <br/>
	    Percent discount new user : <input name="percent_0" type="number"/><br/><br/>
	    Percent discount user lvl 1 : <input name="percent_1" type="number"/><br/><br/>
	    Percent discount user lvl 2 : <input name="percent_2" type="number"/><br/><br/>
	    Percent discount user lvl 3: <input name="percent_3" type="number"/><br/><br/>
	    Percent discount user lvl 4 : <input name="percent_4" type="number"/><br/><br/>
	    Percent discount user lvl 5 : <input name="percent_5" type="number"/><br/><br/>
	</div>
	<br/>
	service description
	<br/>
	<textarea cols="30" id="" rows="10" name="desc"></textarea>
	<br/>
	<br/>
	{{csrf_field()}}
	<button id="new-serv-btn">Next</button>
	<br/>
	<br/>
    </form>
    <script>
     $("#new-serv-btn").click(function(e){
	 var formData = $("#new-service-form").serialize();
	 console.log(formData);
	 if($("#upload").val() == ''){
	     alert("Please Select image for this service");
	 }else{
	     $.ajax({
		 type: 'POST',
		 url: '{{route("new-service")}}',
		 data: formData,
		 success: function(resp){
		     console.log(resp);
		     if(resp.success == true){
			 $(".upload-result").click();
		     }
		 }
	     });
	 }
     });
     
     uploadImageCrop({
	 aObject: 'pic',
	 type: 'square',
	 editDivSelector: '#upload-demo',
	 inputFileSelector: '#upload',
	 uploadBtnSelector: '.upload-result',
	 viewSelector: "#upload-demo-i",
	 postUrl: '{{route('service.upload.logo')}}',
	 theToken: '{{ csrf_token() }}'
     });
    </script>
</div>
