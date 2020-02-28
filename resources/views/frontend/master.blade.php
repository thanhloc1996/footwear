<!DOCTYPE html>
<html lang="en">
<head>
<title>FootWear Shop</title>
<link rel="icon" href="http://www.stu.edu.vn/image.php?src=/uploads/news/98789fc7fe3b1ba8b9039a2244728c9d.png&w=150&aoe=1" type="image/gif" sizes="16x16">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style type="text/css">
	a{
		cursor: pointer;
	}
	button{
		cursor: pointer;
	}
</style>
<body>
<div id="lock_overlay" style="display: none;">
	<div id="backgroud_wait" style="display: block;background-color: #000000a1; width: 100%; height: 100%; position: fixed; z-index: 100000">
	</div>

	<div id="wait" style="color:white;display:block;width:69px;height:89px;position:fixed;top:40%;left:50%;padding:2px;z-index: 1000001"><img src='{{asset("upload/wait.gif")}}' width="64" height="64" /><br>Loading...</div>

</div>
<div class="super_container">
	<!-- Header -->
	@include('frontend.element.header')	

	<!-- Content -->
	@yield('content')
	
	<!-- Footer -->
	@include('frontend.element.footer')
</div>

</body>

@section('javascript')
@show
</html>
<script type="text/javascript">
	// $('a').on('click', function(){

	// 	if($(this).attr('href').length >= 12){

	// 		$("#lock_overlay").css("display", "block");
	// 	}
	// });
</script>