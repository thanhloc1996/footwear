<style type="text/css">
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
<div class="contact_form">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="contact_form_container">
					<div class="contact_form_title">Feedback Our services</div>

					<form action="{{route('frontend.post_feedback')}}" id="contact_form" method="POST">
						{{ csrf_field() }}
						<div class='rating-stars' style="margin-bottom: 15px; margin-top: -37px;">
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
						<input type="hidden" name="star" value="" id="star_number">
						<div class="contact_form_text">
							<textarea id="contact_form_message" class="text_field contact_form_message" name="content" rows="4" placeholder="What do you think about our services?" required="required" style="color: #777777;"></textarea>
						</div>
						<div class="contact_form_button">
							<a id="submit_btn" style="color: white;" class="btn btn-primary mt-3">Submit</a>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>

	<div class="panel"></div>
	</div>

<script type="text/javascript">

	$('#submit_btn').click(function() {
		<?php
		if(Auth::check()){
			?>
			$('#contact_form').submit();
			<?php
		}else{
			?>
			alert('Please login to feedback!');
			<?php
		}
		?>
	});

	$('form#contact_form').submit(function (e) {

		$("#lock_overlay").css("display", "block");
		e.preventDefault();
		var formData = new FormData($('form#contact_form')[0]);
		$.ajax({
			url: "{{route('frontend.post_feedback')}}",
			type: 'POST',
			data: formData,
			contentType: false,
			cache : false,
			processData: false,
			// complete: function(xhr, textStatus) {
			// 	$("#lock_overlay").css("display", "none");
			// 	console.log(xhr.status);
			// }, 
			success: function (res,status,xhr) {

				$("#lock_overlay").css("display", "none");

				if (res.code == 200) {

					alert(res.message);
				}

				if (res.code == 201) {

					alert(res.message);
				}
			},
			// error: function(xhr,status,error){
			// 	console.log(xhr.status);
			// }
		});
	});

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