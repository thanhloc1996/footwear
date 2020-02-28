<style type="text/css">
	a{
		cursor: pointer;
	}
</style>
<div class="modal fade" id="detail-modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div class="container">
					<div class="card">
						<h5 class="card-header text-center" style="background: #007bff;color: white;">Bill Infomation</h5>
						<div class="card-body">
							<form id="billForm" method="POST">
								{{ csrf_field() }}
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" style="text-align: left; width: 100%" type="text" name="address" value="" placeholder="Type your address">
										<a class="input-group-addon" id="autoAddress"><i class="fa fa-user"></i></a>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<input class="form-control" style="text-align: left; width: 100%" type="text" name="phone" value="" placeholder="Type your phone">
										<a class="input-group-addon" id="autoPhone"><i class="fa fa-user"></i></a>
									</div>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Date" name="date_delivery" readonly="">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Date" name="date_receive" readonly="">
								</div>
								<div class="form-group">
									<textarea class="form-control" placeholder="Note" name="note"></textarea>
								</div>
								<div class="form-group">
									<input type="radio" name="checkout" value="1"><a style="margin-right:50px;"> Cash on Delivery</a>
									<input type="radio" name="checkout" value="2"><a> Cash by PayPal <small style="font-style: italic; color: #0000008c;">(If you chosse this, bill's information will get by PayPal account!)</small></a>
								</div>
								<div class="form-group">
									<small style="font-style: italic; color: #0000008c;">***Free shipping. If have any question, please contact with our. Thanks you...</small>
								</div>
								<div class="form-group text-center">
									<a class="btn btn-primary" id="submitcheckout" style="color: white;">Submit</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	$('#submitcheckout').click(function() {

		if($('input[name=checkout]:checked').val() != 2){

			$('#billForm').submit();

		}else{
			window.location.href = '{{ route('frontend.paypal') }}'
		}
	});

	$('form#billForm').submit(function (e) {
		$("#lock_overlay").css("display", "block");
		e.preventDefault();
		var formData = new FormData($('form#billForm')[0]);
		$.ajax({
			url: "{{route('frontend.post_bill')}}",
			method: 'POST',
			data: formData,
			contentType: false,
			cache : false,
			processData: false,
			success: function (res) {
				$("#lock_overlay").css("display", "none");

				if (res.code == 201) {

					alert(res.message);
				}
				if (res.code == 200) {

					alert(res.message);
					sessionStorage.setItem('clicked', 'actionTabOne');
					window.location.href = '{{ route('frontend.user_profile') }}'
				}
			}
		});
	});

	var fromDate = new Date(), toDate7 = new Date(), toDate10 = new Date();

	toDate7.setDate(toDate7.getDate() + 7);
	toDate10.setDate(toDate10.getDate() + 10);

	$('.checkoutBtn').click(function(){

		$('#billForm :input[name=date_delivery]').val(toDate7);
		$('#billForm :input[name=date_receive]').val(toDate10);
	});

	$('#autoAddress').click(function() {

		var value = <?php echo json_encode($user->address);?>;

		$('#billForm :input[name=address]').val(value);
	});

	$('#autoPhone').click(function() {

		var value = <?php echo json_encode($user->phone);?>;

		$('#billForm :input[name=phone]').val(value);
	});
</script>