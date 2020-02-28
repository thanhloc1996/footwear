<style type="text/css">
input[type='checkbox'] {
	width:20px;
	height:20px;
	background:white;
	border-radius:5px;
	border:2px solid #555;
}
input[type='checkbox']:checked {
	background: #abd;
}
</style>

	<div class="cart_section">
		<div class="container">
			<br>  <h3 class="text-center">SHOPPING CART</h3>
			<br> 
			<div class="card">
				@if(count($cart) ==0)
					<div class="row mt-3" style="font-weight: bolder; color: #00000066; text-align: center;">
						<div class="col-lg-12" style="text-align: center;">
							<h3> NO PRODUCT </h3>
						</div>
					</div>
				@else
				<table class="table table-hover shopping-cart-wrap">
					<thead class="text-muted">
						<tr style="color: #00000082;">
							<th scope="col" >Product</th>
							<th scope="col" width="120">Quantity</th>
							<th scope="col" width="120" class="text-center">Price</th>
							<th scope="col" width="200" class="text-center"><button class="btn btn-danger dodeletemulti"><i class="fa fa-trash"></i></button></th>
						</tr>
					</thead>
					<tbody>
						@foreach($cart as $item)
						<tr>
							<td>
								<figure class="media">
									<div class="img-wrap"><img src="{{asset($item->options->product_detail->image)}}" class="img-thumbnail img-sm" width="80px;"></div>
									<figcaption class="media-body" style="margin-left: 5px;">
										<p class="title text-truncate" style="font-weight: bold; color: black; font-size: 15px;">{{$item->name}}</p>
										<a>{{ $item->options->product_detail->name}}</a>
									</figcaption>
								</figure> 
							</td>
							<td> 
								<input class="form-control" type="number" name="quantity" style="width: 100px;" value="{{ $item->qty }}" data-quantity="{{$item->options->product_detail->quantity}}" max="{{$item->options->product_detail->quantity}}" min="1" data-rowId="{{$item->rowId}}">
							</td>
							<td class="text-center"> 
								<div class="price-wrap"> 
									<a class="price">{{'$'.$item->subTotal()}}</a> 
									<small class="text-muted">({{'$'.$item->options->product_detail->price}} each)</small> 
								</div> <!-- price-wrap .// -->
							</td>
							<td class="text-center"> 
								<input type="checkbox" name="id" class="checkmasp" value="{{$item->id}}">
							</td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
				<div class="row">
					<div class="col-lg-12" style="text-align: right;">
						<b style="margin-right: 90px;">Total: <a  class="cart_price"> {{'$'.Cart::total()}}</a></b>
					</div>
				</div>
				<div class="row mb-4 mt-1">
					<div class="col-lg-12" style="text-align: center; color: white;">
						<a class="btn btn-primary checkoutBtn">Checkout</a>
					</div>
				</div>
				@endif
			</div>
		</div> 
	</div>

@include('frontend.element.cart.modal_checkout')
	
	<script type="text/javascript">

		$('.checkoutBtn').click(function(event) {
			if(confirm('Please check your cart before checkout?')){
				$("#detail-modal").modal('show');
			}
		});

		$("[type='number']").keypress(function (evt) {
			evt.preventDefault();
		});

		var array = [];

		$("input[name='quantity']").on('keypress click', function(){

			var rowId = $(this).attr('data-rowId');
			var qty = $(this).val();
			var temp = true;

			if(parseInt($(this).val()) > parseInt($(this).attr('data-quantity')))
			{
				$(this).val($(this).attr('data-quantity'));

				alert('Out of Stock!');

				return false;
			}

			if(parseInt($(this).val()) < 1)
			{
				$(this).val(1);

				alert('Not lower 1!');

				return false;
			}

			// $("#lock_overlay").css("display", "block");
			$.ajax({
				url: "{{route('frontend.update_shopping_cart')}}",
				method: 'POST',
				data:
				{
					"_token": "{{ csrf_token() }}", 
					"rowId":rowId,
					"qty":qty,
				},
				success: function (res) {
					// $("#lock_overlay").css("display", "none");
					$.get("{{ route('frontend.ajax.get_cart') }}", function (res) {

						var data = JSON.parse(JSON.stringify(res.data));

						$('.cart_count').parent().find('span').empty();
						$('.cart_count').parent().find('span').html(data.cartCount);

						$('.cart_price').empty();
						$('.cart_price').html('$' + data.cartTotal);
					});               
				}
			});
		});

		$('.dodeletemulti').click(function(){

			if (confirm('Are you sure to remove that products?')){
				var arrid = [];

				$(".checkmasp:checked").each(function(i) {
					arrid[i]=$(this).val();
				});

				if(arrid.length > 0){
                        // console.log(masp);
                        //Ajax xóa Sản phẩm
                        $.ajax({
                        	url: "{{route('frontend.delete_shopping_cart')}}",
                        	method: 'DELETE',
                        	data:
                        	{
                        		"_token": "{{ csrf_token() }}", 
                        		"arrid":arrid,
                        	},
                        	success: function (res) {
                        		if(res.code == 200){

                        			alert(res.message);

                        			window.location.href = '{{ route('frontend.shopping_cart') }}'
                        		}                            
                        	}
                        });
                    }else{
                    	alert("Please check the product you want to remove."); 
                    }
                }
            });

	</script>