<style type="text/css">
  .tab-pane{
  	border: 1px solid #0000002b;
  	margin-top: 5px;
  	border-radius: 5px;
  	padding: 15px;
  }

  .btn_active{
  	color: white !important;
  	background-color: #007bff;
  	border: 1px solid #007bff;
  }

  a{
  	cursor: pointer;
  }
</style>

<div class="single_product">
	<div class="container">
		<div class="row">
			<!-- Images -->
			<div class="col-lg-7 order-lg-1 order-2">
				<div id="demo" class="carousel slide" data-ride="carousel">

					<!-- Indicators -->

					<!-- The slideshow -->
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="{{asset($product->image)}}" alt="{{$product->name}}" width="100%" height="500px;" style="border: 1px solid #00000045; border-radius: 5px;">
						</div>
						@foreach($product->productDetail as $item)
						<div class="carousel-item">
							<img src="{{asset($item->image)}}" alt="{{$item->name}}" width="100%" height="500px;" style="border: 1px solid #00000045; border-radius: 5px;" data-color="{{$item->color_id}}">
						</div>
						@endforeach
					</div>

					<!-- Left and right controls -->
					<a class="carousel-control-prev" href="#demo" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#demo" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a>
				</div>
			</div>

			<!-- Description -->
			<div class="col-lg-5 order-3">
				<div class="product_description">
					<div class="product_category"><b>{{$product->category->name}}</b></div>
					<div class="product_name">{{$product->name}}</div>
					<div class="rating_r rating_r_4 product_rating" data-star="{{$product->star}}"></div>
					<div class="product_text"><p><b>Description:</b> {{$product->description}}</p></div>
					<div class="order_info d-flex flex-row">
						<form id ="myCart" action="{{route('frontend.post_shopping_cart')}}" method="POST" >
							<div class="clearfix" style="z-index: 1000;">
								{{ csrf_field() }}
								<!-- Product Quantity -->
								<div class="product_quantity clearfix">
									<span>Quantity: </span>
									<input id="quantity_input" name="quantity" type="text" pattern="[0-9]*" value="1">
									<div class="quantity_buttons">
										<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
										<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
									</div>
								</div>

								<!-- Product Color -->
								<ul class="product_color">
									<li>
										<span id="color_name">Color:</span>
										<div class="color_mark_container"><div id="selected_color" class="color_mark" style="background: #2b1c1c00; color:gray; padding: 1px;">All</div></div>
										<div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>
										<ul class="color_list">
											@foreach($listColor as $key => $item)
											<li><div class="color_mark" style="background: #{{$item['code']}};" data-color_name="{{$item['name']}}" data-color_id="{{$item['id']}}"></div></li>
											@endforeach
										</ul>
									</li>
									<input type="hidden" name="product_detail_id" id="product_detail_id">
									<input type="hidden" name="size" id="size_input">
									<input type="hidden" name="color" id="color_input">
								</ul>
							</div>

							<div class="product_text"><p><b id="textSize">Size: </b><span id="chosse_size" style="font-style: italic; font-size: 15px; color: inherit;">Please chosse Color</span></p></div>
							<div style="margin-top: 10px; margin-left: 5px;">
								<div class="row" id="size_table">
								<!-- 	<div class="col-lg-2 mt-1" >
										<a  style="border: solid 1px rgba(0,0,0,0.5); padding: 2px; color: rgba(0,0,0,0.5); position: absolute;" data-size="40">40</a>
									</div> -->
								</div>
							</div>

							<div class="product_price" data-price="{{$product->price}}">${{$product->price}}</div>

							<div class="stock" style="color: grey; font-size: 18px;">
								<a style="font-weight: bolder;font-size: 14px;font-family: 'Rubik', sans-serif;"> In stock: </a> 
								<a id="stock_quantity" style="font-style: italic; font-size: 15px;">Please chosse Color and Size</a>
							</div>
							
							<div class="button_container">
								<a style="color: white;" class="btn btn-primary cart_btn"><i class="fa fa-shopping-cart"></i> Cart</a>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="container" style="margin-top: 55px; margin-bottom: 15px">
		<ul class="nav nav-tabs" role="tablist" style="font-size: 20;">
			<li class="nav-item">
				<a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Specification</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#des" role="tab" data-toggle="tab">Gallery</a>
			</li>
		<!-- 	<li class="nav-item">
				<a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Description</a>
			</li> -->
			<li class="nav-item">
				<a class="nav-link" href="#references" role="tab" data-toggle="tab">Reviews</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#feedback" role="tab" data-toggle="tab">Feedback It</a>
			</li>
		</ul>

		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="profile">
				<div class="row" style="margin-top: 35px;">
					<div class="col-lg-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th scope="col" colspan="2" class="text-center">Specification</th>
								</tr>
							</thead>
							<tbody>
								@foreach($product->listSpecification as $key => $value)
								<tr>
									<th scope="row" width="30%">{{replaceAndUpFisrt($key)}}</th>
									<td>{{$value}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane fade" id="des">
				@if(count($product->Gallery) == 0)
				<div class="row">
					<div class="col-lg-12 text-center">
						<h3 style="color: #828282;">NO IMAGE</h3>
					</div>
				</div>
				@else
				<div class="slider">
					@foreach($product->Gallery as $item)
					<figure class="slider__item"><img class="slider__image" src="{{asset($item->url)}}"/>
						<figcaption class="slider__caption">Image {{$item->id}}</figcaption>
					</figure>
					@endforeach
				</div>
				<a class="slider__btn">Next</a>
				@endif
			</div>

			<div role="tabpanel" class="tab-pane fade" id="buzz">
				bbb
			</div>

			<div role="tabpanel" class="tab-pane fade" id="feedback">
				<div class="row">
				<div class="col-md-12">
					<div class="widget-area no-padding blank">
						<div class="status-upload">
							<h3>Feedback {{$product->name}}</h3>
							<div class='rating-stars text-center'>
								<ul id='stars'>
									<li class='star' title='Poor' data-value='1'>
										<i class='fa fa-star fa-fw'></i>
									</li>
									<li class='star' title='Fair' data-value='2'>
										<i class='fa fa-star fa-fw'></i>
									</li>
									<li class='star' title='Good' data-value='3'>
										<i class='fa fa-star fa-fw'></i>
									</li>
									<li class='star' title='Excellent' data-value='4'>
										<i class='fa fa-star fa-fw'></i>
									</li>
									<li class='star' title='WOW!!!' data-value='5'>
										<i class='fa fa-star fa-fw'></i>
									</li>
								</ul>
							</div>
							<form id="myFeedback" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="star" value="" id="star_number">
								<!-- Rating Stars Box -->
								<textarea name="content" placeholder="What do you think about {{$product->name}}?" style="    margin-top: 18px;"></textarea>
								<a class="btn btn-primary green"  id="btn_feedback" style="margin-top: 15px; color:white;">Share</a>
							</form>
						</div><!-- Status Upload  -->
					</div><!-- Widget Area -->
				</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane fade" id="references">
				<div class="container" style="margin-top: 45px;">
					<div class="row">
						<div class="col-md-12">
							<div class="well well-sm">
								<div class="row">
									<div class="col-xs-6 col-md-6 text-center">
										<h4> Average Rate</h4>
										<h1 class="rating-num">{{$product->star or '0'}}/5</h1>
										<p class="review_star product_rating" data-star="{{$product->star}}" style="color: yellow;">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</p>
										<div>
											<span><i class="fa fa-user"></i> {{$product->comment_count}}</span>
											<span style="font-weight: bold;">Total</span>
										</div>
									</div>
									<div class="col-xs-6 col-md-6">
										<div class="row rating-desc">
											@foreach($review as $item)
											<div class="col-xs-3 col-md-3 text-right">
												<span class="glyphicon glyphicon-star">
													<a> <i class="fa fa-star" style="color: yellow;"></i>{{$item['star']}}</a>
												</span>
											</div>
											<div class="col-xs-8 col-md-9">
												<div class="progress progress-striped">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
													aria-valuemin="0" aria-valuemax="100" style="width: {{$item['percent'].'%'}}">
													<span class="sr-only">{{$item['percent']}}%</span>
												</div>
											</div>
											</div>
											@endforeach
										</div>

									</div>
									
				<div class="container mt-3">
					@foreach($product->comment->sortByDesc('created_at') as $comment)
					<div class="row mt-3">
						<div class="col-lg-12">
							<img src="{{asset($comment->user->image)}}" alt="" width="32"><a style="font-size: 20px;">{{' '.$comment->user->username }} 
							<a class="product_rating" style="font-size: 13px;color:yellow;" data-star="{{$comment->star}}">
								<i class="fa fa-star"></i>
								<a style="color:black; font-style: italic;">{{' from '.$comment->created_at}}</a>
							</a>
							<p style="margin-top: 15px;">{{$comment->content}}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
    </div>
			</div>

			
		</div>
	</div>
</div>

<script type="text/javascript">
	
	$('form#myFeedback').submit(function (e) {

		$("#lock_overlay").css("display", "block");
		e.preventDefault();
		var formData = new FormData($('form#myFeedback')[0]);
		$.ajax({
			url: "{{route('frontend.post_comment', ['product_id' => $product->id])}}",
			type: 'POST',
			data: formData,
			contentType: false,
			cache : false,
			processData: false,
			success: function (res) {

				$("#lock_overlay").css("display", "none");

				if (res.code == 200) {

					alert(res.message);
				}

				if (res.code == 201) {

					alert(res.message);
				}
			}
		});
	});

	$('#btn_feedback').click(function(){
		<?php
		if(Auth::check()){
		?>
			$('#myFeedback').submit();
		<?php
		}else{
		?>
			alert('Please login to feedback!');
		<?php
		}
		?>
	});

	$('form#myCart').submit(function (e) {

		// $("#lock_overlay").css("display", "block");
		e.preventDefault();
		var formData = new FormData($('form#myCart')[0]);
		$.ajax({
			url: "{{route('frontend.post_shopping_cart')}}",
			type: 'POST',
			data: formData,
			contentType: false,
			cache : false,
			processData: false,
			success: function (res) {

				$("#lock_overlay").css("display", "none");

				if (res.code == 200) {

					$.get("{{ route('frontend.ajax.get_cart') }}", function (res) {

						var data = JSON.parse(JSON.stringify(res.data));

						$('.cart_count').parent().find('span').empty();
						$('.cart_count').parent().find('span').html(data.cartCount);

						$('.cart_price').empty();
						$('.cart_price').html('$'+data.cartTotal);
					});

					alert(res.message);
				}

				if (res.code == 201) {

					if (confirm(res.message)) {

						window.location.href = '{{ route('frontend.shopping_cart') }}';
					}
				}
			}
		});
	});

	$('.color_mark').click(function(){
		$('#selected_color').empty();
		$('#color_name').empty();
		$('#color_name').append($(this).attr('data-color_name'));
		$('#chosse_size').empty();
		$('#color_input').val($(this).attr('data-color_id'));
		$('#size_input').val('');
		$('#product_detail_id').val('');

		var color = $(this).attr('data-color_id');

		$.get("{{ asset('') }}/ajax/get-size/"+ "{{$product->id}}" + '/' + $(this).attr('data-color_id'), function (res) {
			$('#size_table').empty();
			jQuery.each(res.data, function(index , item) {

				$('#size_table').append('<div class="col-lg-2 mt-1" ><a class="size_btn" style="border: solid 1px rgb(229, 229, 229); padding: 5px; color: rgba(0,0,0,0.5);font-weight:bold; font-size:15px;" data-size="'+item+'">'+item+'</a></div>');
			});   
		});

		$('.carousel-item').removeClass('active');

		$('.carousel-inner .carousel-item').each(function(){
			if($(this).find('img').attr('data-color') == color){
				$(this).addClass('active');
				return false;
			}
		});
		// alert($(this).attr('data-color_id'));   
		// $('.carousel-item').removeClass('active');
		// if($('.carousel-item').attr('data-color') == $(this).attr('data-color_id')){

		// 	// $('.carousel-item').removeClass('active');
		// 	alert('dasdasd');
		// }
	});

	$('body').delegate('.size_btn', 'click', function(){

		$('.size_btn').removeClass('btn_active');
		$(this).addClass('btn_active');
		$('#size_input').val($(this).attr('data-size'));

		$.get("{{ asset('') }}/ajax/get-product-detail/"+ $('#color_input').val() + '/' + $(this).attr('data-size'), function (res) {
			$('#product_detail_id').val(res.data.id);

			$('#stock_quantity').empty();
			$('#stock_quantity').append(res.data.quantity + ' products');
			$('.product_price').empty();
			$('.product_price').append('$' + res.data.price);

			var quantity = $('#quantity_input').val();
			var stock = res.data.quantity;
			if(quantity > stock){

				$('#quantity_input').val(stock);

			}
		});   

	})

	$('#selected_color').click(function(){
		$('#size_table').empty();
		$(this).empty();
		$(this).append('All');
		$('#color_name').append('Color');
		$(this).css("background-color","#2b1c1c00");
		$('.product_price').empty();
		$('.product_price').append('$' + $('.product_price').attr('data-price'));
		$('#stock_quantity').empty();
		$('#stock_quantity').append('Please chosse Color and Size');
		$('#chosse_size').append('Please chosse Color');

	});
	
	$('#quantity_input, .quantity_buttons').on('click keyup', function(){

		var quantity = $('#quantity_input').val();

		var stock = parseInt($.trim($('#stock_quantity').html().substr(0, $('#stock_quantity').html().indexOf(' '))));
		
		if(quantity > stock){

			$('#quantity_input').val(stock);

			alert("Please chosse quantity again!")
		}
	});

	$('.cart_btn').click(function(){

		<?php
		if(!Auth::check()){
		?>
			alert('Please login to add to it cart!');
			return false;
		<?php
		}
		?>
		
		if($('input[name=product_detail_id]').val().length == 0)
		{
			alert('Please chosse Color and Size!');
		}else{

			$('#myCart').submit();
		}
	});

	$('.product_rating').empty();

	$('.product_rating').each(function(){

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
</script>