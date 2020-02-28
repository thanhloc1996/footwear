@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                COLOR MANAGEMENT&nbsp
                 <a class="btn btn-warning" id="btnAddPro" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="active">Manage Color</li>
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
                                <h3 class="box-title">List Color</h3>
                                <small>Display <b> {{count($listColor)}}</b> on <b>{{count($listColor)}}</b> color</small>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-hover middle-table-text">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center">Name</th>
                                                <th rowspan="2" class="text-center">Color</th>
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($listColor as $color)
                                            <tr>
                                                <td class="text-center">
                                                    <a style="color: black; font-weight:bold;">
                                                    {{ $color->name . '(' . $color->product_detail_count .')'}} 
                                                    </a> 
                                                </td>
                                                <td class="text-center">
                                                    <i class="fa fa-circle" style="color: {{'#'.$color->code}}"></i>&nbsp
                                                    {{'#'.$color->code}}
                                                </td>
                                                <td style="width: 140px;" class="text-center" style="display: flex; flex-wrap: wrap;">
                                                    <a style="margin: 1px;" class="btn-xs btn-warning btnEdit" data-toggle="modal" data-target="#edit-modal" data-edit="{{json_encode($color)}}"><i class="fa fa-edit"></i></a> &nbsp
                                                    <a style="margin: 1px;" class="btn-xs btn-danger btnDelete" data-delete="{{$color->id}}" ><i class="fa fa-trash"></i></a> &nbsp
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

@include('admin.color.modal_edit')

@include('admin.color.modal_add')

@endsection
@section('footer')
    <script>

        $('#colorpickerHolder').ColorPicker({
            flat: true,
            color: '#000000',
            onSubmit: function(hsb, hex, rgb, el){
                $('#inputCode').val(hex);
            }
        });

        $('#colorpickerHolder2').ColorPicker({
            flat: true,
            onSubmit: function(hsb, hex, rgb, el){
                $('#inputCodeEdit').val(hex);
            }
        });

        $('.btnDelete').click(function (e) {

            var value = $(this).attr('data-delete');

            e.preventDefault();
            if (confirm('Do you conform to delete this color ?')){

                $.ajax({
                    url: "{{route('admin.color.delete')}}",
                    method: 'DELETE',
                    data: 
                    {
                        "_token": "{{csrf_token()}}", 
                        "color_id": value,
                    },
                    success: function (res) {
                        if(res.code == 200){
                            alert(res.message);
                            window.location.href = '{{ route('admin.color.list') }}'
                        }else{
                            alert(res.message);
                        }          
                    }
                });
            }
        });

        $('form#editForm').submit(function (e) {

            e.preventDefault();
            var formData = new FormData($('form#editForm')[0]);

            $.ajax({
                url: "{{route('admin.color.update')}}",
                method: 'POST',
                data: formData,
                contentType: false,
                cache : false,
                processData: false,
                success: function (res) {

                    $('#editForm :input').parent().find('p').remove();

                    if (res.code == 201) {
                        var errors = res.data;

                        var errors_array = JSON.parse(JSON.stringify(errors));

                        for (var i = 0; i < errors_array.length; i++) {

                        $('#editForm :input[name="' + errors_array[i].key + '"]').parent().append('<p style="color: red;">' + errors_array[i].mess + '</p>');
                        }
                    }
                    if (res.code == 200) {
            
                        alert(res.message);

                        window.location.href = '{{ route('admin.color.list') }}'
                    }
                }
            });
        });

        $('.btnEdit').click(function(){

            var value = JSON.parse($(this).attr('data-edit'));

            $('#headerEdit').empty();
            $('#headerEdit').append('Edit '+ value.name);

            $('#editForm :input[name=color_id]').val(value.id);
            $('#editForm :input[name=name]').val(value.name);
            $('#editForm :input[name=code]').val(value.code);
            $('#colorpickerHolder2').ColorPickerSetColor(value.code);

        });

        //Ajax Add
        $('form#addForm').submit(function (e) {

            e.preventDefault();
            var formData = new FormData($('form#addForm')[0]);
            $.ajax({
                url: "{{route('admin.color.store')}}",
                type: 'POST',
                data: formData,
                contentType: false,
                cache : false,
                processData: false,
                success: function (res) {

                    $('#addForm :input').parent().find('p').remove();

                    if (res.code == 201) {
                        var errors = res.data;

                        var errors_array = JSON.parse(JSON.stringify(errors));

                        for (var i = 0; i < errors_array.length; i++) {

                        $('#addForm :input[name="' + errors_array[i].key + '"]').parent().append('<p style="color: red;">' + errors_array[i].mess + '</p>');
                        }
                    }
                    if (res.code == 200) {

                        alert(res.message);
                        window.location.href = '{{ route('admin.color.list') }}'
                    }
                }
            });
        });
    </script>
@endsection