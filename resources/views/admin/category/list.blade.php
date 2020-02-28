@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manage Category &nbsp
                <a class="btn btn-warning" id="btnAddPro" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="active">Manage Category Product</li>
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
                                <h3 class="box-title">List Category Level 1</h3>
                                <small>Display <b>{{count($listCategoryParent)}}</b> on <b>{{count($listCategoryParent)}}</b> List Category Level 1</small>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-hover middle-table-text">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center">Name</th>
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listCategoryParent as $category)
                                            <tr>
                                                <td class="text-center">
                                                    <a style="color: black; font-weight:bold;">{{ $category->name }}</a>
                                                    ({{ $category->product_count }})
                                                </td>
                                                <td style="width: 140px;" class="text-center" style="display: flex; flex-wrap: wrap;">
                                                    <a style="margin: 1px;" class="btn-xs btn-warning btnEdit" data-toggle="modal" data-target="#edit-modal" data-edit="{{json_encode($category)}}"><i class="fa fa-edit"></i></a> &nbsp
                                                    <a style="margin: 1px;" class="btn-xs btn-danger btnDelete" data-delete="{{$category->id}}"><i class="fa fa-trash"></i></a> &nbsp
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

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box box-solid box-primary">
                            <div class="box-header">
                                <h3 class="box-title">List Category Level 2</h3>
                                <small>Display <b>{{count($listCategory)}}</b> on <b>{{count($listCategory)}}</b> List Category Level 2</small>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-hover middle-table-text">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center">Name</th>
                                                <th rowspan="2" class="text-center">List Level 1</th>
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listCategory as $category)
                                            <tr>
                                                <td class="text-center">
                                                    <a style="color: black; font-weight:bold;">{{ $category->name }}</a>
                                                    ({{ $category->product_count }})
                                                </td>
                                                <td class="text-center">
                                                    {{$category->categoryParent->name}}
                                                </td>
                                                <td style="width: 140px;" class="text-center" style="display: flex; flex-wrap: wrap;">
                                                    <a style="margin: 1px;" class="btn-xs btn-warning btnEdit" data-toggle="modal" data-target="#edit-modal" data-edit="{{json_encode($category)}}"><i class="fa fa-edit"></i></a> &nbsp
                                                    <a style="margin: 1px;" class="btn-xs btn-danger btnDelete" data-delete="{{$category->id}}"><i class="fa fa-trash"></i></a> &nbsp
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

@include('admin.category.modal_edit')

@include('admin.category.modal_add')

@endsection

@section('footer')
    <script>
        $('.checkparent').change(function(){
            if($(this).val() == 1)
            {
                $('#parentCategory').css('display', 'none');
                $('select [name="parent"]').val('');
            }else{
                $('#parentCategory').css('display', 'block');
            }
        });

        $('form#editForm').submit(function (e) {

            e.preventDefault();
            var formData = new FormData($('form#editForm')[0]);

            $.ajax({
                url: "{{route('admin.category.update')}}",
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

                        window.location.href = '{{ route('admin.category.list') }}'
                    }
                }
            });
        });

        $('.btnEdit').click(function(){

            var value = JSON.parse($(this).attr('data-edit'));

            $('#headerEdit').empty();
            $('#headerEdit').append('EDIT CATEGORY '+ value.name);

            $('#editForm :input[name=category_id]').val(value.id);
            $('#editForm :input[name=name]').val(value.name);

            if(value.parent_id == null){
                $('#parentEdit').css('display', 'none');
            }else{
                $('#parentEdit').css('display', 'block');
            }
            $('#editForm :input[name=parent]').val(value.parent_id).trigger('change');
        });

        $('.btnDelete').click(function (e) {

            var value = $(this).attr('data-delete');

            e.preventDefault();
            if (confirm('Bạn có chắc chắn muốn xóa những danh mục sản phẩm này?')){

                $.ajax({
                    url: "{{route('admin.category.delete')}}",
                    method: 'DELETE',
                    data: 
                    {
                        "_token": "{{csrf_token()}}", 
                        "category_id": value,
                    },
                    success: function (res) {
                        if(res.code == 200){
                            alert(res.message);
                            window.location.href = '{{ route('admin.category.list') }}'
                        }          
                    }
                });
            }
        });


        $('form#addForm').submit(function (e) {

            e.preventDefault();
            var formData = new FormData($('form#addForm')[0]);
            $.ajax({
                url: "{{route('admin.category.store')}}",
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
                        console.log(res);
                        alert(res.message);
                        window.location.href = '{{ route('admin.category.list') }}'
                    }
                }
            });
        });

    </script>
@endsection