<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/bootstrap4/bootstrap.min.css">
<link href="{{asset('/template/frontend/')}}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/product_responsive.css">

<style type="text/css">

.slider {
  width: 90vmin;
  height: 90vmin;
  -webkit-perspective: 100vmin;
          perspective: 100vmin;
  margin: auto;
  -webkit-perspective-origin: top center;
          perspective-origin: top center;
  position: relative;
  box-sizing: border-box;
}
.slider__item {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding-top: 15vmin;
  box-sizing: border-box;
  -webkit-transition: -webkit-transform 0.18s ease;
  transition: -webkit-transform 0.18s ease;
  transition: transform 0.18s ease;
  transition: transform 0.18s ease, -webkit-transform 0.18s ease;
}
.slider__item:nth-child(1) {
  -webkit-transform: translate3d(0, 0, 0vmin);
          transform: translate3d(0, 0, 0vmin);
  -webkit-transition-delay: 0s;
          transition-delay: 0s;
  z-index: 7;
}
.slider__item:nth-child(2) {
  -webkit-transform: translate3d(0, 0, -15vmin);
          transform: translate3d(0, 0, -15vmin);
  -webkit-transition-delay: 0.05s;
          transition-delay: 0.05s;
  z-index: 6;
}
.slider__item:nth-child(3) {
  -webkit-transform: translate3d(0, 0, -30vmin);
          transform: translate3d(0, 0, -30vmin);
  -webkit-transition-delay: 0.1s;
          transition-delay: 0.1s;
  z-index: 5;
}
.slider__item:nth-child(4) {
  -webkit-transform: translate3d(0, 0, -45vmin);
          transform: translate3d(0, 0, -45vmin);
  -webkit-transition-delay: 0.15s;
          transition-delay: 0.15s;
  z-index: 4;
}
.slider__item:nth-child(5) {
  -webkit-transform: translate3d(0, 0, -60vmin);
          transform: translate3d(0, 0, -60vmin);
  -webkit-transition-delay: 0.2s;
          transition-delay: 0.2s;
  z-index: 3;
}
.slider__item:nth-child(6) {
  -webkit-transform: translate3d(0, 0, -75vmin);
          transform: translate3d(0, 0, -75vmin);
  -webkit-transition-delay: 0.25s;
          transition-delay: 0.25s;
  z-index: 2;
}
.slider__item:nth-child(7) {
  -webkit-transform: translate3d(0, 0, -90vmin);
          transform: translate3d(0, 0, -90vmin);
  -webkit-transition-delay: 0.3s;
          transition-delay: 0.3s;
  z-index: 1;
}
.slider__item:nth-child(8) {
  -webkit-transform: translate3d(0, 0, -105vmin);
          transform: translate3d(0, 0, -105vmin);
  -webkit-transition-delay: 0.35s;
          transition-delay: 0.35s;
  z-index: 0;
}
.slider__image {
  width: 100%;
  height: 80%;
  background-color: #999;
  border: 1.5vmin solid #eee;
  box-sizing: border-box;
  box-shadow: 0px 3vmin 3vmin rgba(0, 0, 0, 0.75), 0 -1.5vmin 2.7vmin rgba(0, 0, 0, 0.75);
  overflow: hidden;
  display: block;
  -webkit-transition: opacity 0.2s ease, -webkit-transform 0.18s ease;
  transition: opacity 0.2s ease, -webkit-transform 0.18s ease;
  transition: transform 0.18s ease, opacity 0.2s ease;
  transition: transform 0.18s ease, opacity 0.2s ease, -webkit-transform 0.18s ease;
  -webkit-transform-origin: bottom center;
          transform-origin: bottom center;
}
.slider__caption {
  height: 20%;
  font-weight: bold;
  color: rgba(255, 255, 255, 0.8);
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}
.slider__btn {
  color: #007bff !important;
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  width: 9vmin;
  height: 9vmin;
  margin: 2vmin auto;
  /*border-right: 2vmin solid rgba(255, 255, 255, 0.8);*/
  /*border-bottom: 2vmin solid rgba(255, 255, 255, 0.65);*/
  z-index: 100;
  cursor: pointer;
/*  -webkit-transform: perspective(10vmin) rotateX(-30deg) rotateZ(45deg);
          transform: perspective(10vmin) rotateX(-30deg) rotateZ(45deg);*/
}
.slider__btn:active {
  border-right-color: #dd6;
  border-bottom-color: #dd6;
}
</style>

<style type="text/css">
body{ margin-top:20px;}
.glyphicon { margin-right:5px;}
.rating .glyphicon {font-size: 22px;}
.rating-num { margin-top:0px;font-size: 54px; }
.progress { margin-bottom: 5px;}
.progress-bar { text-align: left; }
.rating-desc .col-md-3 {padding-right: 0px;}
.sr-only { margin-left: 5px;overflow: visible;clip: auto; }
</style>

<style type="text/css">
	.widget-area {
background-color: #fff;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
-webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-ms-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-o-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
float: left;
margin-top: 30px;
padding: 25px 30px;
position: relative;
width: 100%;
}
.status-upload {
/*background: none repeat scroll 0 0 #f5f5f5;*/
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
float: left;
width: 100%;
}
.status-upload form {
float: left;
width: 100%;
}
.status-upload form textarea {
background: none repeat scroll 0 0 #fff;
border: medium none;
-webkit-border-radius: 4px 4px 0 0;
-moz-border-radius: 4px 4px 0 0;
-ms-border-radius: 4px 4px 0 0;
-o-border-radius: 4px 4px 0 0;
border-radius: 4px 4px 0 0;
color: #777777;
float: left;
font-family: Lato;
font-size: 14px;
height: 142px;
letter-spacing: 0.3px;
padding: 20px;
width: 100%;
resize:vertical;
outline:none;
border: 1px solid #00000017;
}

.status-upload ul {
float: left;
list-style: none outside none;
margin: 0;
padding: 0 0 0 15px;
width: auto;
}
.status-upload ul > li {
float: left;
}
.status-upload ul > li > a {
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
color: #777777;
float: left;
font-size: 14px;
height: 30px;
line-height: 30px;
margin: 10px 0 10px 10px;
text-align: center;
-webkit-transition: all 0.4s ease 0s;
-moz-transition: all 0.4s ease 0s;
-ms-transition: all 0.4s ease 0s;
-o-transition: all 0.4s ease 0s;
transition: all 0.4s ease 0s;
width: 30px;
cursor: pointer;
}
.status-upload ul > li > a:hover {
background: none repeat scroll 0 0 #606060;
color: #fff;
}
.status-upload form button {
border: medium none;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
color: #fff;
float: right;
font-family: Lato;
font-size: 14px;
letter-spacing: 0.3px;
margin-right: 9px;
margin-top: 9px;
padding: 6px 15px;
}
.dropdown > a > span.green:before {
border-left-color: #2dcb73;
}
.status-upload form button > i {
margin-right: 7px;
}
</style>

<style type="text/css">
	pre {
display: block;
padding: 9.5px;
margin: 0 0 10px;
font-size: 13px;
line-height: 1.42857143;
color: #333;
word-break: break-all;
word-wrap: break-word;
background-color: #F5F5F5;
border: 1px solid #CCC;
border-radius: 4px;
}

.header {
  padding:20px 0;
  position:relative;
  margin-bottom:10px;
  
}

.header:after {
  content:"";
  display:block;
  height:1px;
  background:#eee;
  position:absolute; 
  left:30%; right:30%;
}

.header h2 {
  font-size:3em;
  font-weight:300;
  margin-bottom:0.2em;
}

.header p {
  font-size:14px;
}



#a-footer {
  margin: 20px 0;
}

.new-react-version {
  padding: 20px 20px;
  border: 1px solid #eee;
  border-radius: 20px;
  box-shadow: 0 2px 12px 0 rgba(0,0,0,0.1);
  
  text-align: center;
  font-size: 14px;
  line-height: 1.7;
}

.new-react-version .react-svg-logo {
  text-align: center;
  max-width: 60px;
  margin: 20px auto;
  margin-top: 0;
}





.success-box {
  margin:50px 0;
  padding:10px 10px;
  border:1px solid #eee;
  background:#f9f9f9;
}

.success-box img {
  margin-right:10px;
  display:inline-block;
  vertical-align:top;
}

.success-box > div {
  vertical-align:top;
  display:inline-block;
  color:#888;
}



/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}
</style>

<style type="text/css"></style>
@extends('frontend.master')
@section('content')
	@include('frontend.element.product.single')
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
<script src="{{asset('/template/frontend/')}}/plugins/easing/easing.js"></script>
<script src="{{asset('/template/frontend/')}}/js/product_custom.js"></script>
<script type="text/javascript">

	$(function(){
		var	btn = $(".slider__btn");

		btn.on("click",function(){
			$(".slider__item").first().clone().appendTo(".slider");
			$(".slider__image").first().css({transform: "rotateX(-180deg)", opacity: 0});
			setTimeout(function(){
				$(".slider__item").first().remove();
			},200);
		});
	});

	$(document).ready(function(){

    
    $("[data-toggle=tooltip]").tooltip();
});
	$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    $('#star_number').val(onStar);
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    responseMessage(msg);
    
  });
  
  
});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}	
</script>