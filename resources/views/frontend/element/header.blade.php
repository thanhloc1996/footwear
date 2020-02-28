	<header class="header">
		<!-- Top Bar -->
		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('/template/frontend/')}}/images/phone.png" alt=""></div>+8490 446 4478</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('/template/frontend/')}}/images/mail.png" alt=""></div><a href="{{asset('/template/frontend/')}}/mailto:fastsales@gmail.com">footwear@gmail.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_user">
								@if(Auth::check())
								<div class="user_icon"><img src="{{asset(Auth::user()->image)}}" alt=""></div>
								<div><a href="#">{{Auth::user()->username}}</a></div>
								<div><a href="{{route('frontend.logout')}}">Logout</a></div></div>
								@else
								<div class="user_icon"><img src="{{asset('/template/frontend/')}}/images/user.svg" alt=""></div>
								<div><a href="{{route('frontend.register')}}">Register</a></div>
								<div><a href="{{route('frontend.login')}}">Login</a></div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->
		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="#">FootWear</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="{{ route('frontend.shopping') }}" method="GET" id="header_search_form" class="header_search_form clearfix">
										<input type="search" class="header_search_input" placeholder="Search for products..." name="name">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Brands</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													<li><a class="clc" href="#">All Brands</a></li>
													@foreach($dataHeader['listBrand'] as $item)
													<li><a style="cursor: pointer;" class="clc item_category" data-category="{{$item->id}}" href="#">{{$item->name}}</a></li>
													@endforeach
												</ul>
											</div>
										</div>
										<input type="hidden" name="brand">
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('/template/frontend/')}}/images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="{{asset('/template/frontend/')}}/images/cart.png" alt="">
										<div class="cart_count"><span>{{$dataHeader['cartCount']}}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{route('frontend.shopping_cart')}}">Cart</a></div>
										<div class="cart_price">${{$dataHeader['cartTotal']}}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categories</div>
								</div>

								<ul class="cat_menu">
									@foreach($dataHeader['listCategoryParent'] as $item)
									<li class="@if(count($item->category) > 0) {{'hassubs'}} @endif">
										<a href="{{route('frontend.shopping', ['category'=> $item->id])}}">{{$item->name}}<i class="fas fa-chevron-right"></i></a>
										@if(count($item->category) > 0)
										<ul>
											@foreach($item->category as $subitem)
											<li><a href="{{route('frontend.shopping', ['category'=> $subitem->id])}}">{{$subitem->name}}<i class="fas fa-chevron-right"></i></a></li>
											@endforeach
										</ul>
										@endif
									</li>
									@endforeach
								</ul>
							</div>

							<!-- Main Nav Menu -->
							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="{{route('frontend.home')}}">HOME<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{route('frontend.shopping')}}">SHOPPING<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{route('frontend.shopping_cart')}}">CART<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{route('frontend.user_profile')}}">PROFILE<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{route('frontend.contact')}}">CONTACT<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Menu -->

	</header>

	<script type="text/javascript">

		$('.item_category').click(function(){
			
			var value = $(this).attr('data-category');

			$("input[name='brand']").val(value);
		});

	</script>