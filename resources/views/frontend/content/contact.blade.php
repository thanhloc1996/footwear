<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/bootstrap4/bootstrap.min.css">
<link href="{{asset('/template/frontend/')}}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/contact_responsive.css">

@extends('frontend.master')
@section('content')	
	@include('frontend.element.contact.contact_info')
	@include('frontend.element.contact.contact_form')
	@include('frontend.element.contact.map')
@endsection

<script src="{{asset('/template/frontend/')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('/template/frontend/')}}/styles/bootstrap4/popper.js"></script>
<script src="{{asset('/template/frontend/')}}/styles/bootstrap4/bootstrap.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/greensock/TweenMax.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{asset('/template/frontend/')}}/plugins/easing/easing.js"></script>
<script src="{{asset('/template/frontend/')}}/js/contact_custom.js"></script>