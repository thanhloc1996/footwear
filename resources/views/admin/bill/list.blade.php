@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                BILL MANAGEMENT &nbsp
                <a class="btn btn-danger" id="deletemultibutton"><i class="fa fa-trash"></i></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="active">Bill Management</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content table-border">
            {{--main content--}}
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box box-solid box-primary">
                            <div class="box-header">
                                <h3 class="box-title">TABLE BILL</h3>
                                <small>Showing <b> {{count($listBill)}}</b> on <b>{{count($listBill)}}</b> bills</small>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-hover middle-table-text">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center thdeletemulti" style="display: none; width: 3%;">
                                                    <p class="btn-xs btn-danger dodeletemulti" style="cursor: pointer;"><i class="fa fa-trash"></i></p>
                                                    <input type="checkbox" name="" id="checkAll">    
                                                </th>
                                                <th rowspan="2" class="text-center">ID</th>
                                                <th rowspan="2" class="text-center">Created At</th>
                                                <th rowspan="2" class="text-center">Username</th>
                                                <th rowspan="2" class="text-center">Email</th>
                                                <th rowspan="2" class="text-center">Total</th>
                                                <th rowspan="2" class="text-center">Status</th>
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($listBill as $bill)
                                            <tr>
                                                <td class="text-center tddeletemulti" style="display: none;" >
                                                    <input type="checkbox" class="checkmasp" name="checkmasp" value="{{$bill['id']}}"> 
                                                </td>
                                                <td class="text-center" width="15%">
                                                    {{ $bill['id'] }} 
                                                </td>
                                                <td class="text-center" width="15%">
                                                    {{ $bill['created_at'] }} 
                                                </td>
                                                <td class="text-center" width="20%">
                                                    <a style="color: black; font-weight: bold;">
                                                    {{ $bill['user']['username'] }} 
                                                    </a>
                                                </td>
                                                <td class="text-center" width="15%">
                                                    <a class="btn-xs btn-primary">
                                                        {{ $bill['user']['email'] or 'Undefined'}} 
                                                    </a>
                                                </td>
                                                <td class="text-center" width="15%">
                                                    {{ '$'.$bill['total'] }} 
                                                </td>
                                                <td class="text-center" width="10%">
                                                    @if($bill['status'] == 1)
                                                        <a class="btn-xs btn-warning">Processing</a>
                                                    @elseif($bill['status'] == 2)
                                                        <a class="btn-xs btn-success">Completed</a>
                                                    @elseif($bill['status'] == 4)
                                                        <a class="btn-xs btn-primary">Checkout</a>
                                                    @else
                                                        <a class="btn-xs btn-danger">Canceled</a>
                                                    @endif
                                                </td>
                                                <td style="width: 7%;" class="text-center" style="display: flex; flex-wrap: wrap;">
                                                    <a title="View detail of" style="margin: 1px;" class="btn-xs btn-info btnBill" data-toggle="modal" data-target="#detail-modal" data-bill="{{json_encode($bill)}}"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>    

@include('admin.bill.modal_detail')


@endsection
@section('footer')
    <script>

        $('.dodeletemulti').click(function(){

            if (confirm('Are you sure to delete that bills?')){
                var arrid = [];

                $(".checkmasp:checked").each(function(i) {
                    arrid[i]=$(this).val();
                });

                if(arrid.length > 0){

                    $.ajax({
                        url: "{{route('admin.bill.delete')}}",
                        method: 'DELETE',
                        data:
                        {
                            "_token": "{{ csrf_token() }}", 
                            "arrid":arrid,
                        },
                        success: function (res) {
                        if(res.code == 200){
                            alert(res.message);
                            window.location.href = "{{route('admin.bill.list')}}"
                        }                            

                        }
                    });
                }else{
                    alert("Please check the bills you want to delete."); 
                }
            }
        });

        if(sessionStorage.getItem('status_delmulti') == 1){
            $(".thdeletemulti").css('display','table-cell');
            $(".tddeletemulti").css('display','table-cell');
        }

        $("#checkAll").click(function(){
            $('.checkmasp').prop('checked', this.checked);
        });

        $("#deletemultibutton").click(function() {
                // alert($(".thdeletemulti").css('display'));
                if( $(".thdeletemulti").css('display') == 'none'){
                    $(".thdeletemulti").css('display','table-cell');
                    $(".tddeletemulti").css('display','table-cell');
                    sessionStorage.setItem('status_delmulti', 1);
                }else if ($(".thdeletemulti").css('display') == 'table-cell'){
                    $(".thdeletemulti").css('display','none');
                    $(".tddeletemulti").css('display','none');
                    sessionStorage.setItem('status_delmulti', 0);
                }
        });

        $('form#editForm').submit(function (e) {

            e.preventDefault();
            var formData = new FormData($('form#editForm')[0]);
            $.ajax({
                url: "{{route('admin.bill.update')}}",
                method: 'POST',
                data: formData,
                contentType: false,
                cache : false,
                processData: false,
                success: function (res) {

                    if (res.code == 201) {

                        var errors = res.data;

                        var errors_array = JSON.parse(JSON.stringify(errors));

                        for (var i = 0; i < errors_array.length; i++) {

                            $('#error-message').append('<br>' + errors_array[i].name + ': ' + errors_array[i].error);
                        }

                        $('#error-message').append('<br>Please contract to customer...')

                        alert(res.message);
                    }
                    if (res.code == 200) {
            
                        alert(res.message);

                        window.location.href = '{{ route('admin.bill.list') }}'
                    }
                }
            });
        });

        $('.statusBtn').click(function(){
            if (confirm('You want continue ?')){

                $('#error-message').empty();
                $('#editForm :input[name= status]').val($(this).attr('data-status'));
                $('#editForm').submit();

            }    
        });


        $('.btnBill').click(function(){

            $('#error-message').empty();

            var value = JSON.parse($(this).attr('data-bill'));

            $('#headerBill').empty();
            $('#headerBill').append('BILL ID: ' + value.id + ' (' + value.user.username + ' order at ' + value.created_at +')');

            $('#editForm :input[name=bill_id]').val(value.id);
            $('#phoneInput').val(value.phone);
            $('#addressInput').val(value.address);
            $('#dateDeliInput').val(value.date_delivery);
            $('#dateReInput').val(value.date_receive);
            $('#noteInput').val(value.note);
            $('#totalInput').html('$' + value.total);

            console.log(value.bill_detail);
            $('#table-product').empty();
            jQuery.each(value.bill_detail, function(index , item) {
                index++;
                var a = '<tr><td width="5%">'+ index +'</td><td width="5%">'+item.product_detail.product.name +' ('+ item.product_detail.name+')</td><td width="5%">'+item.product_detail.price+'</td><td width="5%">'+item.quantity+'</td><td width="5%">'+'$'+item.total+'</td></tr>';

                $('#table-product').append(a);
            });            
        });


        $('#downloadBill').click(function() {

            var bill_id = $('#editForm :input[name=bill_id]').val();

            $.ajax({
                url: "{{route('admin.bill.export_pdf')}}",
                method: 'get',
                data: 
                {   
                    "_token": "{{ csrf_token() }}",
                    "bill_id": bill_id
                },
                success: function (res) {
                    if(res.code == 201){
                        alert(res.message);
                    }
                    if(res.code == 200){
                        alert(res.message);

                        var origin   = window.location.origin;

                        //Download File
                        var file_path = origin + res.data.url;
                        var a = document.createElement('A');
                        a.href = file_path;
                        a.download = file_path.substr(file_path.lastIndexOf('/') + 1);
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);

                    }
                }
            });
        });

    </script>
@endsection