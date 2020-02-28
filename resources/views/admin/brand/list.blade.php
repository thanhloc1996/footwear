@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                BRAND MANAGEMENT &nbsp
                 <a class="btn btn-warning" id="btnAddPro" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="active">Brand Management</li>
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
                                <h3 class="box-title">TABLE BRAND</h3>
                                <small>Showing <b> {{count($listBrand)}}</b> on <b>{{count($listBrand)}}</b> brands</small>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-hover middle-table-text">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center">Name</th>
                                                <th rowspan="2" class="text-center">Image</th>
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($listBrand as $brand)
                                            <tr>
                                                <td class="text-center">
                                                    <a style="color: black; font-weight:bold;">
                                                    {{ $brand->name }} 
                                                    </a> 
                                                    ({{ $brand->product_count }})
                                                </td>
                                                <td class="text-center">
                                                    <img src="{{asset($brand->image)}}" width="32px" height="32px" class="zoom-image">
                                                </td>
                                                <td style="width: 140px;" class="text-center" style="display: flex; flex-wrap: wrap;">
                                                    <a style="margin: 1px;" class="btn-xs btn-warning btnEdit" data-toggle="modal" data-target="#edit-modal" data-edit="{{json_encode($brand)}}"><i class="fa fa-edit"></i></a> &nbsp
                                                    <a style="margin: 1px;" class="btn-xs btn-danger btnDelete" data-delete="{{$brand->id}}" ><i class="fa fa-trash"></i></a> &nbsp
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

@include('admin.brand.modal_edit')

@include('admin.brand.modal_add')

@endsection
@section('footer')
    <script>
        $('.btnDelete').click(function (e) {

            var value = $(this).attr('data-delete');

            e.preventDefault();
            if (confirm('Are you sure to delete that brand?')){

                $.ajax({
                    url: "{{route('admin.brand.delete')}}",
                    method: 'DELETE',
                    data: 
                    {
                        "_token": "{{csrf_token()}}", 
                        "brand_id": value,
                    },
                    success: function (res) {
                        if(res.code == 200){
                            alert(res.message);
                            window.location.href = '{{ route('admin.brand.list') }}'
                        }          
                    }
                });
            }
        });

        $('form#editForm').submit(function (e) {

            e.preventDefault();
            var formData = new FormData($('form#editForm')[0]);

            $.ajax({
                url: "{{route('admin.brand.update')}}",
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

                        window.location.href = '{{ route('admin.brand.list') }}'
                    }
                }
            });
        });

        $('.btnEdit').click(function(){

            var value = JSON.parse($(this).attr('data-edit'));

            $('#headerEdit').empty();
            $('#headerEdit').append('EDIT BRAND '+ value.name);

            $('#editForm :input[name=brand_id]').val(value.id);
            $('#editForm :input[name=name]').val(value.name);
            $('#editForm :input[name=image]').val('');
            $('#avatarEdit').attr('src', "{{asset('')}}"+value.image);
        });

        //Ajax Add
        $('form#addForm').submit(function (e) {

            e.preventDefault();
            var formData = new FormData($('form#addForm')[0]);
            $.ajax({
                url: "{{route('admin.brand.store')}}",
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
                        window.location.href = '{{ route('admin.brand.list') }}'
                    }
                }
            });
        });


        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload").on('change', function(){
            $('#avatar').css('display','block');
            readURL(this);
        });
    </script>
@endsection