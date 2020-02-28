<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/bootstrap4/bootstrap.min.css">
<link href="{{asset('/template/frontend/')}}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/shop_responsive.css">
<style type="text/css">

	.pagination .active{
		color: #0e8ce5;
	}

</style>
@extends('frontend.master')
@section('content')
	@include('frontend.element.shop.banner')
	@include('frontend.element.shop.shop')
@endsection		

<script type="text/javascript">
	
	function getUrlParameter(sParam) {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
		sURLVariables = sPageURL.split('&'),
		sParameterName,
		i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : sParameterName[1];
			}
		}
	};
</script>
<script src="{{asset('/template/frontend/')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('/template/frontend/')}}/styles/bootstrap4/popper.js"></script>
<script src="{{asset('/template/frontend/')}}/styles/bootstrap4/bootstrap.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/greensock/TweenMax.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/easing/easing.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/parallax-js-master/parallax.min.js"></script>
<script src="{{asset('/template/frontend/')}}/js/shop_custom.js"></script>