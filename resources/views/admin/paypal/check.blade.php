@extends('admin.master')
@section('content')
    <style type="text/css">
        a{
            color: black;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                PAYPAL CHECKOUT &nbsp
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="active">Paypal Checkout</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content table-border">
        	<div class="row">
        	<div class="col-lg-12">
        		<div class="col-lg-1">
        			<label>Search</label>
        		</div>	
    			<div class="col-lg-7">
                    <form id="searchForm">
                    {{ csrf_field() }}
                    <select class="form-control select2" name="paypal_id">
                        <option>Chosse your PayPal ID ...</option>
                        @foreach($paymentList->payments as $item)
                        <option value="{{$item->id}}">{{$item->id}}</option>
                        @endforeach
                    </select>
                    <form>
    				<!-- <input class="form-control" type="text" name="paypal_id" placeholder="Search ID paypal..." id="paypalInput"> -->
<!--     				<div id="containerPayPalId">
    					
    				</div> -->
    			</div>
    			<div class="col-lg-4">
    				<a class="btn btn-primary" id="btnSearch">Submit</a>
    			</div>
        	</div>
        	</div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-lg-9">
                    <div class="panel panel-primary" id="boxPaypal" style="display: none;">
                        <div class="panel-heading"><span>PayPal ID: </span><span id="box_paypal_id"></span></div>
                        <div class="panel-body">
                            <div class="row">
                                 <div class="field-payer col-lg-6" style="float: left;">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <b>Name:</b>
                                    </div>
                                    <div class="col-lg-8">
                                        <a id="box_payer_name">Thái Phạm</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <b>Email:</b>
                                    </div>
                                    <div class="col-lg-8">
                                        <a id="box_payer_email">Thái Phạm</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <b>Phone:</b>
                                    </div>
                                    <div class="col-lg-8">
                                        <a id="box_payer_phone">Thái Phạm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="field-payer col-lg-6" style="float: right;">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <b>Address:</b>
                                    </div>
                                    <div class="col-lg-8">
                                        <a id="box_shipping_address">Thái Phạm</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <b>State:</b>
                                    </div>
                                    <div class="col-lg-8">
                                        <a id="box_shipping_state">Thái Phạm</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <b>City:</b>
                                    </div>
                                    <div class="col-lg-8">
                                        <a id="box_shipping_city">Thái Phạm</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <b>Country:</b>
                                    </div>
                                    <div class="col-lg-8">
                                        <a id="box_shipping_country">Thái Phạm</a>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="row" style="margin-top: 15px;">
                                <div class="col-lg-12">
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                        </tr>
                                        </thead>
                                        <tbody id="table-product">
                                        <tr>
                                            <td>1</td>
                                            <td>A</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <p>Total: <b id="box_total">$100</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>    

@endsection
@section('footer')
<script>

    $('#btnSearch').click(function() {

        $('#searchForm').submit();
    });

    $('form#searchForm').submit(function (e) {

        e.preventDefault();
        var formData = new FormData($('form#searchForm')[0]);
        $.ajax({
            url: "{{route('admin.search_paypal')}}",
            type: 'POST',
            data: formData,
            contentType: false,
            cache : false,
            processData: false,
            success: function (res) {

                var data = res.data;

                $('#boxPaypal').css('display','block');

                $('#box_paypal_id').empty();
                $('#box_paypal_id').append(data.id + ' (' + data.create_time + ')');
                $('#box_payer_name').empty();
                $('#box_payer_name').append(data.payer.payer_info.last_name + ' ' + data.payer.payer_info.first_name);
                $('#box_payer_email').empty();
                $('#box_payer_email').append(data.payer.payer_info.email);
                $('#box_payer_phone').empty();
                $('#box_payer_phone').append(data.payer.payer_info.phone);
                $('#box_shipping_address').empty();
                $('#box_shipping_address').append(data.payer.payer_info.shipping_address.line1);
                $('#box_shipping_state').empty();
                $('#box_shipping_state').append(data.payer.payer_info.shipping_address.state);
                $('#box_shipping_city').empty();
                $('#box_shipping_city').append(data.payer.payer_info.shipping_address.city);
                $('#box_shipping_country').empty();
                $('#box_shipping_country').append(data.payer.payer_info.shipping_address.country_code);

                jQuery.each(data.transactions[0].item_list.items, function(index , item) {
                index++;
                var a = '<tr><td width="5%">'+ index +'</td><td width="5%">'+item.name+'</td><td width="5%">$'+item.price+'</td><td width="5%">'+item.quantity+'</td></tr>';

                $('#table-product').empty();
                $('#table-product').append(a);

                $('#box_total').empty();
                $('#box_total').append('$'+data.transactions[0].amount.total);
            });         
            }
        });
    });



    // var timeout = null;

    // $("#paypalInput").keyup(function() {

    //     clearTimeout(timeout);

    //     timeout = setTimeout(function ()
    //     {
    //         var data = {
    //             search : $('#paypalInput').val()
    //         };
 
    //         $.ajax({
    //             type : 'get',
    //             data : data,
    //             url : '{{ url('/ajax/get-list-id-paypal') }}',
    //             success : function (res){

    //                 if(res.code == 200){

    //                     var getPayPalID = res.data;

    //                     $( "#paypalInput" ).autocomplete({
    //                         source: getPayPalID,
    //                         appendTo: "#containerPayPalId",
    //                     });

    //                     $("#paypalInput").trigger("keydown");
    //                 }
    //             }
    //         });
    //     }, 700);
    // });
</script>
@endsection