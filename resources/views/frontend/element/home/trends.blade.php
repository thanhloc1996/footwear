<div class="trends">
	<div class="trends_background" style="background-image:url(template/frontend/images/trends_background.jpg)"></div>
	<div class="trends_overlay"></div>
	<div class="container">
		<div class="row">

			<!-- Trends Content -->
			<div class="col-lg-3">
				<div class="trends_container">
					<h2 class="trends_title">NEWEST PRODUCTS</h2>
					<div class="trends_text"><p>Enjoy the most comfortable  with us.</p></div>
					<div class="trends_slider_nav">
						<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
						<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
					</div>
				</div>
			</div>

			<!-- Trends Slider -->
			<div class="col-lg-9">
				<div class="trends_slider_container">

					<!-- Trends Slider -->

					<div class="owl-carousel owl-theme trends_slider">
						@foreach($listNewProduct as $product)
						<!-- Trends Slider Item -->
						<div class="owl-item">
							<div class="trends_item is_new">
								<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($product->image)}}" alt=""></div>
								<div class="trends_content">
									<div class="trends_category"><a href="{{asset('/template/frontend/')}}/#">{{$product->category->name}}</a></div>
									<div class="trends_info clearfix">
										<div class="trends_name"><a href="{{route('frontend.product' ,['product_id' => $product->id] )}}">{{$product->name}}</a></div>
										<div class="trends_price">{{$product->price .'$'}}</div>
									</div>
								</div>
								<ul class="trends_marks">
									<li class="trends_mark trends_discount">-25%</li>
									<li class="trends_mark trends_new">New</li>
								</ul>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>

		</div>
	</div>
</div>