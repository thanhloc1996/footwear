<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset('/template/frontend/')}}/images/shop_background.jpg"></div>
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center">
		<h2 class="home_title">{{isset($category->name) ? $category->name : 'Shopping'}}</h2>
	</div>
</div>