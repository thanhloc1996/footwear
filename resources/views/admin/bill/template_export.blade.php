<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
</head>
<body>
	<div style="text-align: center;">
		<h2>FootWear Shop Bill</h2>
	</div>

	<div class="container">
		<div>
			<b>BILL DETAIL</b>
			<p>ID: {{$bill->id}}</p>
			<p>Full Name: {{$bill->user->full_name}} ({{$bill->user->email}})</p>
			<p>Created At: {{$bill->created_at}}</p>
			<br>
			<b>SHIPPING DETAIL
			<p>Address: {{$bill->address}}</p>
			<p>Phone: {{$bill->phone}}</p>
			<p>Date Delivery: {{$bill->phone}}</p>
			<p>Date Receive: {{$bill->phone}}</p>
			<p>Note: {{$bill->note}}</p>
		</div>
	</div>

	<div class="container">
		<table style="width:100%">
			<tr>
				<th width="5%">No</th>
				<th width="50%">Product Name</th>
				<th width="15%">Price</th>
				<th width="15%">Quantity</th>
				<th width="30%">SubTotal</th>
			</tr>
			@php $i = 0; @endphp
			@foreach($bill->billDetail as $item)
			@php $i++; @endphp
			<tr>
				<td>{{$i}}</td>
				<td>{{$item->productDetail->product->name .' ('.$item->productDetail->name .')'}}</td>
				<td>{{'$'.$item->productDetail->price}}</td>
				<td>{{$item->quantity}}</td>
				<td>{{'$'.$item->total}}</td>
			</tr>
			@endforeach
			<tr>
				<td colspan="5" style="text-align: center;">
					<b>Total: </b>
					<a>{{'$'.$bill->total}}
				</td>
			</tr>
		</table>
	</div>

	<div style="float: right;">
		<br>
			@php
			$monthNum  = date("m");
			$dateObj   = DateTime::createFromFormat('!m', $monthNum);
			$monthName = $dateObj->format('F');
			@endphp

			{{ date("l") .', '. date("d").' '.$monthName .' '. date("Y")}}
		<br>
		<img src="https://daily.jstor.org/wp-content/uploads/2014/11/NapoleonSignature2_1050x700.jpg" width="200px;"> 
	</div>

</body>
</html>
