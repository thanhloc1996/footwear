@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                USER MANAGEMENT &nbsp
                <a class="btn btn-warning" id="btnAddPro" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i></a>

                <a class="btn btn-success" data-toggle="modal" data-target="#search-modal"><i class="fa fa-search"></i></a>

                <a class="btn btn-danger" id="deletemultibutton"><i class="fa fa-trash"></i></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="active">User Management</li>
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
                                <h3 class="box-title">TABLE USER</h3>
                                <small>Showing <b>{{count($listUser)}}</b> on <b>{{$listUser->total()}}</b> users</small>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-hover middle-table-text">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center thdeletemulti" style="display: none;">
                                                    <p class="btn-xs btn-danger dodeletemulti" style="cursor: pointer;"><i class="fa fa-trash"></i></p>
                                                    <input type="checkbox" name="" id="checkAll">    
                                                </th>
                                                <th rowspan="2" class="text-center">Platform</th>
                                                <th rowspan="2" class="text-center thtensanpham">
                                                    Username
                                                    <i class="glyphicon glyphicon-circle-arrow-up sortTenASC" style="cursor: pointer;" data-sort="ASC"></i>
                                                    <i class="glyphicon glyphicon-circle-arrow-down sortTenDESC" style="cursor: pointer;" data-sort="DESC"></i>
                                                </th>
                                                <th rowspan="2" class="text-center thgiasp">
                                                    Fullname
                                                    <i class="glyphicon glyphicon-circle-arrow-up sortGiaASC" style="cursor: pointer;" data-sort="ASC"></i>
                                                    <i class="glyphicon glyphicon-circle-arrow-down sortGiaDESC" style="cursor: pointer;" data-sort="DESC"></i>
                                                </th>
                                                <th rowspan="2" class="text-center thhinhanhsanpham">Thumbnail</th>
                                                <th rowspan="2" class="text-center ththongso">Email</th>
                                                <th rowspan="2" class="text-center thsoluong">Address</th>
                                                <th rowspan="2" class="text-center thloaisp">Phone</th>
                                                <th rowspan="2" class="text-center ththuonghieu">Gender</th>
                                                 <th rowspan="2" class="text-center thchucnang">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($listUser as $user)

                                            <tr>
                                                <td class="text-center tddeletemulti" style="display: none;">
                                                    <input type="checkbox" class="checkmasp" name="checkmasp" value="{{$user['id']}}"> 
                                                </td>
                                                <td class="text-center">
                                                    <b>{{$user['provider'] or 'website'}}<b>
                                                </td>
                                                <td class="text-center tdtensanpham" style="width: 200px; font-weight: bold;" nowrap>
                                                    <a target="_blank" rel="noopener noreferrer" style="color: black;">{{ $user['username'] }}</a>
                                                </td>
                                                <td class="text-center tdgiasp">
                                                    {{$user['full_name']}}
                                                </td>
                                                <td class="text-center tdhinhanhsanpham">
                                                    <a class="btn-xs btn-success galleryopen" data-toggle="modal" data-target="#images-modal"><i class="fa fa-eye"></i><img src="{{ asset($user['image']) }}" class="getanhsp" hidden="hidden" data-checkanhsp="{{$user['image']}}"></a>
                                                </td>
                                                <td class="text-center tdthongso">
                                                    <a class="btn-xs btn-primary specopen" data-toggle="modal" data-target="#spec-modal">
                                                        {{$user['email'] or 'Undefined'}} 
                                                    </a>
                                                </td>
                                                <td class="text-center tdsoluong">
                                                    {{$user['address'] or 'N/A'}}
                                                </td>
                                                <td class="text-center tdloaisp" style="width: 150px" nowrap>
                                                    {{ $user['phone'] or 'N/A'}}
                                                </td>
                                                <td class="text-center tdthuonghieu" style="width: 150px" nowrap>
                                                    {{ $user['gender']['text'] or 'N/A'}} 
                                                </td>
                                                <td class="text-center tdchucnang" nowrap>
                                                    <a style="margin: 1px;" class="btn-xs btn-warning btnEdit" href="#" data-toggle="modal" data-target="#edit-modal" data-edit="{{json_encode($user)}}"><i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    @if(count($listUser) == 0) 
                                        <h4 style="font-weight: bold;">No User found</h4>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-xs-2 text-left record-show">
                                        <select id="mySelect" class="form-control select" >
                                            <option value="20" {{ isset($_GET['per_page'])&& $_GET['per_page'] == 20 ? 'selected' : '' }}>20 result</option>
                                            <option value="30" {{ isset($_GET['per_page'])&& $_GET['per_page'] == 30 ? 'selected' : '' }}>30 result</option>
                                            <option value="40" {{ isset($_GET['per_page'])&& $_GET['per_page'] == 40 ? 'selected' : '' }}>40 result</option>
                                        </select>
                                    </div> 
                                <div class="col-xs-10 paginate text-right">
                                    {{$listUser->links()}}
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<!-- Modal -->
@include('admin.user.modal_add')

@include('admin.user.modal_edit')

@include('admin.user.modal_image')

@include('admin.user.modal_search')

@endsection

@section('footer')
    <script type="text/javascript">

        $('#mySelect').change(function() {
            $('#inputperpage').val($(this).val());
            $('#myForm').submit();
        });
                
        $('.sortTenASC').click(function () {
            $('#inputsort').val(2);
            $('#myForm').submit();
        });

        $('.sortTenDESC').click(function () {
            $('#inputsort').val(3);
            $('#myForm').submit();
        });

        $('.sortGiaASC').click(function () {
            $('#inputsort').val(4);
            $('#myForm').submit();
        });

        $('.sortGiaDESC').click(function () {
            $('#inputsort').val(5);
            $('#myForm').submit();
        });

        $('.dodeletemulti').click(function(){

            if (confirm('Are you sure to delete that users?')){
                var arrid = [];

                $(".checkmasp:checked").each(function(i) {
                    arrid[i]=$(this).val();
                });

                if(arrid.length > 0){
                    // console.log(masp);
                    //Ajax xóa Sản phẩm
                    $.ajax({
                        url: "{{route('admin.user.delete')}}",
                        method: 'DELETE',
                        data:
                        {
                            "_token": "{{ csrf_token() }}", 
                            "arrid":arrid,
                        },
                        success: function (res) {
                            if(res.code == 200){
                                alert(res.message);
                                window.location.href = '{{ route('admin.user.list') }}'
                            }                            

                        }
                    });
                }else{
                    alert("Please check the user you want to delete."); 
                }
            }
        });

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

        //Ajax Submit Edit
        $('form#editForm').submit(function (e) {

            e.preventDefault();
            var formData = new FormData($('form#editForm')[0]);
            $.ajax({
                url: "{{route('admin.user.update')}}",
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

                        window.location.href = '{{ route('admin.user.list') }}'
                    }
                }
            });
        });

        $('.btnEdit').click(function(){

            var value = JSON.parse($(this).attr('data-edit'));

            $('#headerEdit').empty();
            $('#headerEdit').append('EDIT USER '+ value.username);

            $('#editForm :input[name=user_id]').val(value.id);
            $('#editForm :input[name=username]').val(value.username);
            $('#editForm :input[name=first_name]').val(value.first_name);
            $('#editForm :input[name=last_name]').val(value.last_name);
            $('#editForm :input[name=email]').val(value.email);
            $('#editForm :input[name=address]').val(value.address);
            $('#editForm :input[name=phone]').val(value.phone);
            $('#editForm :input[name=image]').val('');
            $('#editForm :input[name=gender]').val(value.gender.number).trigger('change');
            $('#avatarEdit').attr('src', '{{asset('')}}'+value.image);
        });

        //Ajax Add
        $('form#addForm').submit(function (e) {

            e.preventDefault();
            var formData = new FormData($('form#addForm')[0]);
            $.ajax({
                url: "{{route('admin.user.store')}}",
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
                        window.location.href = '{{ route('admin.user.list') }}'
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