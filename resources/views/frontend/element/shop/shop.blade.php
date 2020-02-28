<div class="shop">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">

				<!-- Shop Sidebar -->
				<form id="myForm" method="GET">
				<input type="hidden" name="category" id="category_input" value="{{ isset($_GET['category'])&& $_GET['category'] != '' ? $_GET['category'] : '' }}">
				<input type="hidden" name="sort" value="{{ isset($_GET['sort'])&& $_GET['sort'] != '' ? $_GET['sort'] : '' }}">
				<div class="shop_sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">
							<a style="color: white; cursor: pointer;" class="btn-xs btn-sm btn-primary" id="btnSubmitMyForm">Filter</a>
							<a href="{{route('frontend.shopping')}}" class="btn-xs btn-sm btn-danger">Reset</a> 
						</div>
						<div class="sidebar_subtitle">Price</div>
						<div class="filter_price">
							<div id="slider-range" class="slider_range"></div>
							<p>Range: </p>
							<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							<input id="min_price" type="hidden" name="min_price" value="{{ isset($_GET['min_price'])&& $_GET['min_price'] != '' ? $_GET['min_price'] : 0 }}">
							<input id="max_price" type="hidden" name="max_price" value="{{ isset($_GET['max_price'])&& $_GET['max_price'] != '' ? $_GET['max_price'] : 2000 }}">
						</div>
					</div>
					<div class="sidebar_section">
						<div class="sidebar_subtitle brands_subtitle">Brands</div>
						<ul class="brands_list">
							@foreach($listBrand as $brand)
							<li class="brand"><input type="checkbox" name="brand" value="{{$brand->id}}"> {{$brand->name}}</li>
							@endforeach
						</ul>
						<input type="hidden" name="brand" id="brand_input" value="{{ isset($_GET['brand'])&& $_GET['brand'] != '' ? $_GET['brand'] : '' }}">
					</div>
					<div class="sidebar_section">
						<div class="sidebar_subtitle brands_subtitle">Color</div>
						<ul class="brands_list">
							@foreach($listColor as $color)
							<li class="brand"><input type="checkbox" name="color" value="{{$color->id}}"> {{$color->name}} <span style="height: 16px; width: 16px; background-color: #{{$color->code}};border-radius: 50%; display: inline-block;"></span></li>
							@endforeach
							<input type="hidden" name="color" id="color_input" value="{{ isset($_GET['color'])&& $_GET['color'] != '' ? $_GET['color'] : '' }}">
						</ul>
					</div>
					@foreach($sidebarFilter as $item)
					<div class="sidebar_section">
						<div class="sidebar_subtitle brands_subtitle">{{$item['header']}}</div>
						<ul class="brands_list">
							@foreach($item['data'] as $subitem)
							<li class="brand"><input type="checkbox" name="{{$item['input']}}" value="{{$subitem}}"> {{$subitem}}</li>
							@endforeach
						</ul>
					</div>
					<input type="hidden" name="{{$item['input']}}" id="{{$item['input']}}_input" value="{{ isset($_GET[$item['input']])&& $_GET[$item['input']] != '' ? $_GET[$item['input']] : '' }}">
					@endforeach
				</div>
			</div>

			<div class="col-lg-9">
				<!-- Shop Content -->
				<div class="shop_content">
					<div class="shop_bar clearfix">
						<div class="shop_product_count"><span>{{$listProduct->total()}}</span> Products Found</div>
						<div class="shop_sorting">
							<span>Sort By</span>
							<ul>
								<li>
									<span class="sorting_text">Option</span></i>
									<ul>
										<li class="shop_sorting_button" data-sort="1">Hightest Rated</li>
										<li class="shop_sorting_button" data-sort="2">Name(A-Z)<i class="fa fa-arrow-up"></i></li>
										<li class="shop_sorting_button" data-sort="3">Name(Z-A)<i class="fa fa-arrow-down"></i></li>
										<li class="shop_sorting_button" data-sort="4">Price(Lowest to Highest)<i class="fa fa-arrow-up"></i></li>
										<li class="shop_sorting_button" data-sort="5">Price(Highest to Lowest)<i class="fa fa-arrow-down"></i></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</form>
					<div class="product_grid text-center">
						@if(count($listProduct) <= 0)
						<div style="margin-top: 25; font-size: 25; color: #05040480; font-family: 'Rubik', sans-serif;">Not Available Products</div>
						@endif
						<div class="product_grid_border"></div>

						<!-- Product Item -->
						@foreach($listProduct as $product)
						<div class="product_item is_new">
							<div class="product_border"></div>
							<div class="product_image d-flex flex-column align-items-center justify-content-center"><img class="link-image" style="border-radius: 10px" src="{{asset($product['image'])}}" alt="" width="95%;" data-link="{{route('frontend.product', ['product_id' => $product['id']])}}"></div>
							<div class="product_content">
								<div class="product_price">{{'$'.$product['price']}}</div>
								<div class="product_name"><div><a href="{{route('frontend.product', ['product_id' => $product['id']])}}" tabindex="0">{{$product['name']}}</a></div></div>
								<div class="product_name star_rating" style="font-size: 11px;color:yellow;" data-star="{{$product['star']}}"><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
							</div>
							<ul class="product_marks">
								<li class="product_mark product_discount">-25%</li>
								<li class="product_mark product_new" style="background:{{$product['status']['code']}};">{{$product['status']['text']}}</li>
							</ul>
						</div>
						@endforeach

					</div>

					<!-- Shop Page Navigation -->

					<div class="shop_page_nav d-flex flex-row">
						@if($listProduct->lastPage() != 1)
						<ul class="page_nav d-flex flex-row">
							{{$listProduct->links()}}
						</ul>
						@endif
					</div>

				</div>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">	
	$('.link-image').click(function(){
		var a= $(this).attr('data-link');
		// alert($(this).attr('data-link'));

		window.location.href = a;
	});

	$('.star_rating').empty();

	$('.star_rating').each(function(){
		var star = '<i class="fa fa-star"></i>';
		switch(Math.floor($(this).attr('data-star'))){
			case 1:
				$(this).append(star.repeat(1));
				break;
			case 2:
				$(this).append(star.repeat(2));
				break;
			case 3:
				$(this).append(star.repeat(3));
				break;
			case 4:
				$(this).append(star.repeat(4));
				break;
			case 5:
				$(this).append(star.repeat(5));
				break;
			default:
				$(this).append(star.repeat(1));
				break;
		}
	});

	var sort = getUrlParameter('sort');

	switch(sort){
		case '1':
			$('.sorting_text').empty();
			$('.sorting_text').append("Hightest Rated");
			break;
		case '2':
			$('.sorting_text').empty();
			$('.sorting_text').append("Name(A-Z)<i class='fa fa-arrow-up'></i>");
			break;
		case '3':
			$('.sorting_text').empty();
			$('.sorting_text').append("Name(Z-A)<i class='fa fa-arrow-down'></i>");
			break;
		case '4':
			$('.sorting_text').empty();
			$('.sorting_text').append("Price(Lowest to Highest)<i class='fa fa-arrow-up'></i>");
			break;
		case '5':
			$('.sorting_text').empty();
			$('.sorting_text').append("Price(Highest to Lowest)<i class='fa fa-arrow-down'></i>");
			break;
		default:
			$('.sorting_text').empty();
			$('.sorting_text').append("Option");
			break;
	}

	$('.shop_sorting_button').click(function(){

		var value = $(this).attr('data-sort');

		$("input[name='sort'][type='hidden']").val(value);

		$('#myForm').submit();
	});

	//Get Param on Url
	var brand = getUrlParameter('brand');
	var color = getUrlParameter('color');
	var material = getUrlParameter('material');
	var gender = getUrlParameter('gender');
	var trendy = getUrlParameter('trendy');
	var weight = getUrlParameter('weight');
	// var front_camera = getUrlParameter('front_camera');
	// var rear_camera = getUrlParameter('rear_camera');
	// var battery = getUrlParameter('battery');

	//Check Param is/not Undefined
	if(typeof brand === 'undefined'){
		var arrayBrand = [];
	}else{
		var arrayBrand = brand.split(',');
	}

	if(typeof color === 'undefined'){
		var arrayColor = [];
	}else{
		var arrayColor = color.split(',');
	}

	if(typeof material === 'undefined'){
		var arrayMaterial = [];
	}else{
		var arrayMaterial = material.split(',');
		var arrayMaterial= arrayMaterial.filter(function(v){return v!==''});
	}
	if(typeof gender === 'undefined'){
		var arrayGender = [];
	}else{
		var arrayGender = gender.split(',');
		var arrayGender = arrayGender.filter(function(v){return v!==''});
	}

	if(typeof trendy === 'undefined'){
		var arrayTrendy = [];
	}else{
		var arrayTrendy = trendy.split(',');
		var arrayTrendy= arrayTrendy.filter(function(v){return v!==''});
	}

	if(typeof weight === 'undefined'){
		var arrayWeight = [];
	}else{
		var arrayWeight = weight.split(',');
		var arrayWeight = arrayWeight.filter(function(v){return v!==''});
	}

	// if(typeof front_camera === 'undefined'){
	// 	var arrayFrontCamera = [];
	// }else{
	// 	var arrayFrontCamera = front_camera.split(',');
	// 	var arrayRom = arrayRom.filter(function(v){return v!==''});
	// }

	// if(typeof rear_camera === 'undefined'){
	// 	var arrayRearCamera = [];
	// }else{
	// 	var arrayRearCamera = rear_camera.split(',');
	// 	var arrayRom = arrayRom.filter(function(v){return v!==''});
	// }

	// if(typeof battery === 'undefined'){
	// 	var arrayBattery = [];
	// }else{
	// 	var arrayBattery = battery.split(',');
	// 	var arrayRom = arrayRom.filter(function(v){return v!==''});
	// }
	
	//Check Checkbox if Isset on Url
	$("input[name='brand'][type='checkbox']").each( function () {

		for(var i = 0; i < arrayBrand.length; i++){

			if($(this).val() == arrayBrand[i]){

				$(this).prop("checked", true);
			}
		};
	});

	$("input[name='color'][type='checkbox']").each( function () {

		for(var i = 0; i < arrayColor.length; i++){

			if($(this).val() == arrayColor[i]){

				$(this).prop("checked", true);
			}
		};
	});

	$("input[name='material'][type='checkbox']").each( function () {
		
		for(var i = 0; i < arrayMaterial.length; i++){

			if($(this).val() == arrayMaterial[i].replace('+', ' ')){

				$(this).prop("checked", true);
			}
		};
	});

	$("input[name='gender'][type='checkbox']").each( function () {

		for(var i = 0; i < arrayGender.length; i++){

			if($(this).val() == arrayGender[i].replace('+', ' ')){

				$(this).prop("checked", true);
			}
		};
	});

	$("input[name='trendy'][type='checkbox']").each( function () {

		for(var i = 0; i < arrayTrendy.length; i++){

			if($(this).val() == arrayTrendy[i].replace('+', ' ')){

				$(this).prop("checked", true);
			}
		};
	});

	$("input[name='weight'][type='checkbox']").each( function () {

		for(var i = 0; i < arrayWeight.length; i++){

			if($(this).val() == arrayWeight[i].replace('+', ' ')){

				$(this).prop("checked", true);
			}
		};
	});

	// $("input[name='front_camera'][type='checkbox']").each( function () {

	// 	for(var i = 0; i < arrayFrontCamera.length; i++){

	// 		if($(this).val() == arrayFrontCamera[i].replace('+', ' ')){

	// 			$(this).prop("checked", true);
	// 		}
	// 	};
	// });

	// $("input[name='rear_camera'][type='checkbox']").each( function () {

	// 	for(var i = 0; i < arrayRearCamera.length; i++){

	// 		if($(this).val() == arrayRearCamera[i].replace('+', ' ')){

	// 			$(this).prop("checked", true);
	// 		}
	// 	};
	// });

	// $("input[name='battery'][type='checkbox']").each( function () {

	// 	for(var i = 0; i < arrayBattery.length; i++){

	// 		if($(this).val() == arrayBattery[i].replace('+', ' ')){

	// 			$(this).prop("checked", true);
	// 		}
	// 	};
	// });

	//Submit Form
	$('#myForm').submit(function(){

		$('input:checkbox:checked').prop('checked', false);
	});

	$('#btnSubmitMyForm').click(function(){
		$("input[name='sort'][type='hidden']").val('');
		$('#myForm').submit();
		$("#lock_overlay").css("display", "block");
	});


	//Make Temp Array of Value Input
	if($('#brand_input').val() != '')
	{
		var arrBrand = $('#brand_input').val().split(',');
	}else{
		var arrBrand = [];
	}

	if($('#color_input').val() != '')
	{
		var arrColor = $('#color_input').val().split(',');
	}else{
		var arrColor = [];
	}

	if($('#material_input').val() != '')
	{
		var arrMaterial = $('#material_input').val().split(',');
	}else{
		var arrMaterial = [];
	}

	if($('#gender_input').val() != '')
	{
		var arrGender = $('#gender_input').val().split(',');
	}else{
		var arrGender = [];
	}

	if($('#trendy_input').val() != '')
	{
		var arrTrendy = $('#trendy_input').val().split(',');
	}else{
		var arrTrendy = [];
	}

	if($('#weight_input').val() != '')
	{
		var arrWeight = $('#weight_input').val().split(',');
	}else{
		var arrWeight = [];
	}

	// if($('#front_camera_input').val() != '')
	// {
	// 	var arrFrontCamera = $('#front_camera_input').val().split(',');
	// }else{
	// 	var arrFrontCamera = [];
	// }

	// if($('#rear_camera_input').val() != '')
	// {
	// 	var arrRearCamera = $('#rear_camera_input').val().split(',');
	// }else{
	// 	var arrRearCamera = [];
	// }

	// if($('#battery_input').val() != '')
	// {
	// 	var arrBattery = $('#battery_input').val().split(',');
	// }else{
	// 	var arrBattery = [];
	// }


	//Get Value from Checkbox in add into Input
	$("input[name='brand'][type='checkbox']").change( function () {

		var value = $(this).val();

		if($(this).is(":checked")){

			arrBrand.push(value);

		}else{

			arrBrand = jQuery.grep(arrBrand, function(arrBrand) {

				return arrBrand != value;
			});
		}

		$('#brand_input').val(arrBrand);
	});

	$("input[name='color'][type='checkbox']").change(function(){

		var value = $(this).val();

		if($(this).is(":checked")){

			arrColor.push(value);

		}else{

			arrColor = jQuery.grep(arrColor, function(arrColor) {

				return arrColor != value;
			});
		}

		$('#color_input').val(arrColor);
	});

	$("input[name='material'][type='checkbox']").change(function(){

		var value = $(this).val();

		if($(this).is(":checked")){

			arrMaterial.push(value);

		}else{

			arrMaterial = jQuery.grep(arrMaterial, function(arrMaterial) {

				return arrMaterial != value;
			});
		}

		$('#material_input').val(arrMaterial);
	});

	$("input[name='gender'][type='checkbox']").change(function(){

		var value = $(this).val();

		if($(this).is(":checked")){

			arrGender.push(value);

		}else{

			arrGender = jQuery.grep(arrGender, function(arrGender) {

				return arrGender != value;
			});
		}

		$('#gender_input').val(arrGender);
	});

	$("input[name='trendy'][type='checkbox']").change(function(){

		var value = $(this).val();

		if($(this).is(":checked")){

			arrTrendy.push(value);

		}else{

			arrTrendy = jQuery.grep(arrTrendy, function(arrTrendy) {

				return arrTrendy != value;
			});
		}

		$('#trendy_input').val(arrTrendy);
	});

	$("input[name='weight'][type='checkbox']").change(function(){

		var value = $(this).val();

		if($(this).is(":checked")){

			arrWeight.push(value);

		}else{

			arrWeight = jQuery.grep(arrWeight, function(arrWeight) {

				return arrWeight != value;
			});
		}

		$('#weight_input').val(arrWeight);
	});

	// $("input[name='front_camera'][type='checkbox']").change(function(){

	// 	var value = $(this).val();

	// 	if($(this).is(":checked")){

	// 		arrFrontCamera.push(value);

	// 	}else{

	// 		arrFrontCamera = jQuery.grep(arrFrontCamera, function(arrFrontCamera) {

	// 			return arrFrontCamera != value;
	// 		});
	// 	}

	// 	$('#front_camera_input').val(arrFrontCamera);
	// });

	// $("input[name='rear_camera'][type='checkbox']").change(function(){

	// 	var value = $(this).val();

	// 	if($(this).is(":checked")){

	// 		arrRearCamera.push(value);

	// 	}else{

	// 		arrRearCamera = jQuery.grep(arrRearCamera, function(arrRearCamera) {

	// 			return arrRearCamera != value;
	// 		});
	// 	}

	// 	$('#rear_camera_input').val(arrRearCamera);
	// });

	// $("input[name='battery'][type='checkbox']").change(function(){

	// 	var value = $(this).val();

	// 	if($(this).is(":checked")){

	// 		arrBattery.push(value);

	// 	}else{

	// 		arrBattery = jQuery.grep(arrBattery, function(arrBattery) {

	// 			return arrBattery != value;
	// 		});
	// 	}

	// 	$('#battery_input').val(arrBattery);
	// });
</script>