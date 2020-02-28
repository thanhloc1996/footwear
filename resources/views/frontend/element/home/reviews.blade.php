<style type="text/css">
.review_text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   line-height: 16px;     /* fallback */
   max-height: 40px;      /* fallback */
   -webkit-line-clamp: 2; /* number of lines to show */
   -webkit-box-orient: vertical;
}	
</style>

<div class="reviews">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="reviews_title_container">
					<h3 class="reviews_title">LATEST REVIEWS</h3>
					<!-- <div class="reviews_all ml-auto"><a href="{{asset('/template/frontend/')}}/#">view all <span>reviews</span></a></div> -->
				</div>

				<div class="reviews_slider_container">
					
					<!-- Reviews Slider -->
					<div class="owl-carousel owl-theme reviews_slider">
						@foreach($listReview as $item)
						<!-- Reviews Slider Item -->
						<div class="owl-item">
							<div class="review d-flex flex-row align-items-start justify-content-start">
								<div><div class="review_image"><img src="{{asset($item->product->image)}}" alt=""></div></div>
								<div class="review_content">
									<div class="review_name">{{$item->user->full_name}}</div>
									<div class="review_text product_text"><p>{{$item->product->name}}</p></div>
									<div class="review_rating_container">
										<div class="rating_r rating_r_4 review_rating" data-star="{{$item->star}}"></div>
										<div class="review_time">{{ $item->date }}</div>
									</div>
									<div class="review_text"><p>{{ $item->content }}</p></div>
								</div>
							</div>
						</div>
						@endforeach

					</div>
					<!-- <div class="reviews_dots"></div> -->
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.rating_r.rating_r_4.review_rating').each(function(){

		var value = $.trim($(this).attr("data-star"));

		switch(value){
		case '1':
			$(this).empty();
			$(this).append("<i class='fa fa-star'></i>")
			break;
		case '2':
			$(this).empty();
			$(this).append("<i class='fa fa-star'></i>");
			$(this).append("<i class='fa fa-star'></i>");
			break;
		case '3':
			$(this).empty();
			$(this).append("<i class='fa fa-star'></i>");
			$(this).append("<i class='fa fa-star'></i>");
			$(this).append("<i class='fa fa-star'></i>");
			break;
		case '4':
			$(this).empty();
			$(this).append("<i class='fa fa-star'></i>");
			$(this).append("<i class='fa fa-star'></i>");
			$(this).append("<i class='fa fa-star'></i>");
			$(this).append("<i class='fa fa-star'></i>");
			break;
		default:
			$(this).empty();
			$(this).append("<i class='fa fa-star'></i>");
			$(this).append("<i class='fa fa-star'></i>");
			$(this).append("<i class='fa fa-star'></i>");
			$(this).append("<i class='fa fa-star'></i>");
			$(this).append("<i class='fa fa-star'></i>");
			break;
	}
	});
	
</script>