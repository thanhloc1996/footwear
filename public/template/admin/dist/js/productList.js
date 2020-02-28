	 //View Thumbnail
	 $('.galleryopen').click(function () {
	 	$('.appear').empty();
	 	var a = $(this).find(".getanhsp").attr('src');

	 	var b = $(this).find(".getanhsp").attr('data-checkanhsp').length;
	 	if(b == 0)
	 	{
	 		$('.appear').append("<img src='http://vutaichinh.mard.gov.vn/Content/Site/images/noimage.png'>");
	 	}else{
	 		$('.appear').append("<img width='100%' src="+ a+ ">");
	 	}
	 });

	 //NouSlider
	 var keypressSlider = document.getElementById('keypress');
	 var input0 = document.getElementById('input-with-keypress-0');
	 var input1 = document.getElementById('input-with-keypress-1');
	 var inputs = [input0, input1];


	 $.urlParam = function (name) {
	 	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	 	if (results == null) {
	 		return null;
	 	}

	 	else {
	 		return decodeURI(results[1]) || 0;
	 	}
	 }

	 var giamin = $.urlParam('min_price');
	 var giamax = $.urlParam('max_price');
	 if(giamin == null && giamax ==null){
	 	giamin = 0;
	 	giamax = 2000;
	 }

	 if (giamin != null && giamax != null){
	 	$('#input-with-keypress-0').val(giamin);
	 	$('#input-with-keypress-1').val(giamax);
	 }

	 noUiSlider.create(keypressSlider, {
	 	start: [giamin, giamax],
	 	connect: true,
	 	step :1,
	 	range: {
	 		'min': 0,
	 		'max': 2000
	 	}
	 });

	 keypressSlider.noUiSlider.on('update', function( values, handle ) {
	 	inputs[handle].value = values[handle];
	 });

	 function setSliderHandle(i, value) {
	 	var r = [null,null];
	 	r[i] = value;
	 	keypressSlider.noUiSlider.set(r);
	 }

	 inputs.forEach(function(input, handle) {

	 	input.addEventListener('change', function(){
	 		setSliderHandle(handle, this.value);
	 	});

	 	input.addEventListener('keydown', function( e ) {

	 		var values = keypressSlider.noUiSlider.get();
	 		var value = Number(values[handle]);

        // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
        var steps = keypressSlider.noUiSlider.steps();

        // [down, up]
        var step = steps[handle];

        var position;

        // 13 is enter,
        // 38 is key up,
        // 40 is key down.
        switch ( e.which ) {

        	case 13:
        	setSliderHandle(handle, this.value);
        	break;

        	case 38:

                // Get step to go increase slider value (up)
                position = step[1];

                // false = no step is set
                if ( position === false ) {
                	position = 1;
                }

                // null = edge of slider
                if ( position !== null ) {
                	setSliderHandle(handle, value + position);
                }

                break;

                case 40:

                position = step[0];

                if ( position === false ) {
                	position = 1;
                }

                if ( position !== null ) {
                	setSliderHandle(handle, value - position);
                }

                break;
            }
        });
	 });