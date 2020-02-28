<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/bootstrap4/bootstrap.min.css">
<link href="{{asset('/template/frontend/')}}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/responsive.css">

@extends('frontend.master')
@section('content')
	@include('frontend.element.home.banner')
	@include('frontend.element.home.characteristics')
	@if(count($listNewProduct) > 0)
	@include('frontend.element.home.trends')
	@endif
	@if(count($listReview) > 0)
	@include('frontend.element.home.reviews')
	@endif		
	@include('frontend.element.brand')	
@endsection

<script src="{{asset('/template/frontend/')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('/template/frontend/')}}/styles/bootstrap4/popper.js"></script>
<script src="{{asset('/template/frontend/')}}/styles/bootstrap4/bootstrap.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/greensock/TweenMax.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/slick-1.8.0/slick.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/easing/easing.js"></script>
<script src="{{asset('/template/frontend/')}}/js/custom.js"></script>