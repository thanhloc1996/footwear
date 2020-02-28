@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                PRODUCT MANAGEMENT &nbsp
                <a class="btn btn-warning" id="btnAddPro" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i></a>

                <a class="btn btn-success" data-toggle="modal" data-target="#search-modal"><i class="fa fa-search"></i></a>

                <a class="btn btn-danger" id="deletemultibutton"><i class="fa fa-trash"></i></a>

                <a class="btn btn-primary" id="showhidecolumn" data-toggle="modal" data-target="#column-modal"><i class="fa fa-eye"></i></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="active">Product Management</li>
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
                                <h3 class="box-title">TABLE PRODUCT</h3>
                                <small>Showing <b>{{count($listProduct)}}</b> on <b>{{$listProduct->total()}}</b> products</small>
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
                                                <th rowspan="2" class="text-center thtensanpham">
                                                    Name
                                                    <i class="glyphicon glyphicon-circle-arrow-up sortTenASC" style="cursor: pointer;" data-sort="ASC"></i>
                                                    <i class="glyphicon glyphicon-circle-arrow-down sortTenDESC" style="cursor: pointer;" data-sort="DESC"></i>
                                                </th>
                                                <th rowspan="2" class="text-center thtrangthai">Status</th>
                                                <th rowspan="2" class="text-center thgiasp">
                                                    Price
                                                    <i class="glyphicon glyphicon-circle-arrow-up sortGiaASC" style="cursor: pointer;" data-sort="ASC"></i>
                                                    <i class="glyphicon glyphicon-circle-arrow-down sortGiaDESC" style="cursor: pointer;" data-sort="DESC"></i>
                                                </th>
                                                <th rowspan="2" class="text-center thhinhanhsanpham">Thumbnail</th>
                                                <th rowspan="2" class="text-center thsoluong">Stock quantity</th>
                                                <th rowspan="2" class="text-center ththongso">Specification</th>
                                                <th rowspan="2" class="text-center thloaisp">Category</th>
                                                <th rowspan="2" class="text-center ththuonghieu">Brand</th>
                                                 <th rowspan="2" class="text-center thchucnang">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($listProduct as $product)

                                            <tr>
                                                <td class="text-center tddeletemulti" style="display: none;">
                                                    <input type="checkbox" class="checkmasp" name="checkmasp" value="{{$product['id']}}"> 
                                                </td>
                                                <td class="text-center tdtensanpham" style="width: 250px; font-weight: bold;" nowrap>
                                                    <a href="{{route('admin.product_detail.list',['product_id' => $product['id']])}}" target="_blank" rel="noopener noreferrer" style="color: black;">{{ $product['name'] }}</a>
                                                </td>
                                                   <td class="text-center tdtrangthai" nowrap>
                                                        <a class="{{$product['statusAdmin']['code']}}">{{$product['statusAdmin']['text']}}</a>
                                                </td>
                                                <td class="text-center tdgiasp">
                                                    {{'$'.$product['price']}}
                                                </td>
                                                <td class="text-center tdhinhanhsanpham">
                                                    <a title="View thumbnail of {{$product['name']}}" class="btn-xs btn-success galleryopen" data-toggle="modal" data-target="#images-modal"><i class="fa fa-eye"></i><img src="{{ asset($product['image']) }}" class="getanhsp" hidden="hidden" data-checkanhsp="{{$product['image']}}"></a>
                                                </td>
                                                <td class="text-center tdsoluong">
                                                    {{$product['stockquantity']}}
                                                </td>
                                                <td class="text-center tdthongso">
                                                  <a title="View specification of {{ $product['name'] }}" class="btn-xs btn-success specopen" data-toggle="modal" data-target="#spec-modal" data-specification="{{json_encode($product['specification'])}}">
                                                    <i class="fa fa-eye"></i>
                                                  </a>
                                                </td>
                                                <td class="text-center tdloaisp" style="width: 150px" nowrap>
                                                    {{ $product['category']['name'] }}
                                                </td>
                                                <td class="text-center tdthuonghieu" style="width: 150px" nowrap>
                                                    {{$product['brand']['name'] }} 
                                                </td>
                                                <td class="text-center tdchucnang" nowrap>
                                                    <a title="Edit {{ $product['name'] }}" style="margin: 1px;" class="btn-xs btn-warning btnEdit" href="#" data-toggle="modal" data-target="#edit-modal"
                                                    data-edit="{{json_encode(['id'=>$product['id'],
                                                        'category_id'=>$product['category_id'],
                                                        'brand_id'=>$product['brand_id'],
                                                        'name'=>$product['name'],
                                                        'image'=>asset($product['image']),
                                                        'status'=>$product['status'],
                                                        'description'=>$product['description']
                                                    ])}}"
                                                    ><i class="fa fa-edit"></i></a>
                                                    <a title="View detail of {{ $product['name'] }}"style="margin: 1px;" class="btn-xs btn-info" href="{{route('admin.product_detail.list',['product_id' => $product['id']])}}" target="_blank" rel="noopener noreferrer"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    @if(count($listProduct) == 0) 
                                        <h4 style="font-weight: bold;">No Product found</h4>
                                    @endif
                                </div>

                                @if($listProduct->total() >= 20) 
                                <div class="row">
                                    <div class="col-xs-2 text-left record-show">
                                        <select id="mySelect" class="form-control select" >
                                            <option value="20" {{ isset($_GET['per_page'])&& $_GET['per_page'] == 20 ? 'selected' : '' }}>20 result</option>
                                            <option value="30" {{ isset($_GET['per_page'])&& $_GET['per_page'] == 30 ? 'selected' : '' }}>30 result</option>
                                            <option value="40" {{ isset($_GET['per_page'])&& $_GET['per_page'] == 40 ? 'selected' : '' }}>40 result</option>
                                        </select>
                                    </div> 
                                <div class="col-xs-10 paginate text-right">
                                    {{$listProduct->links()}}
                                </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<!-- Modal -->
@include('admin.product.modal_add')

@include('admin.product.modal_edit')

@include('admin.product.modal_column')

@include('admin.product.modal_image')

@include('admin.product.modal_specification')

@include('admin.product.modal_search')

@endsection

@section('footer')
    <script src="{{asset('/template/admin/')}}/dist/js/productList.js" type="text/javascript"></script>
    <script type="text/javascript">

        //Load Modal Edit
        $('.btnEdit').click(function(){

            var value = JSON.parse($(this).attr('data-edit'));

            $('#headerEdit').empty();
            $('#headerEdit').append('EDIT PRODUCT '+ value.name);


            $('#editForm :input[name=product_id]').val(value.id);
            $('#editForm :input[name=name]').val(value.name);
            $('#editForm :input[name=description]').val(value.description);
            $('#editForm :input[name=image]').val('');
            $('#editForm :input[name=brand]').val(value.brand_id).trigger('change');
            $('#editForm :input[name=category]').val(value.category_id).trigger('change');
            $('#editForm :input[name=status]').val(value.status.number).trigger('change');
            $('#avatarEdit').attr('src', value.image);
        });


        //Ajax Submit Edit
        $('form#editForm').submit(function (e) {

            e.preventDefault();
            var formData = new FormData($('form#editForm')[0]);
            $.ajax({
                url: "{{route('admin.product.update')}}",
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

                        window.location.href = '{{ route('admin.product.list') }}'
                    }
                }
            });
        });


        //Ajax Delete 
        $('.dodeletemulti').click(function(){

            if (confirm('Are you sure to delete that products?')){
                var arrid = [];

                $(".checkmasp:checked").each(function(i) {
                    arrid[i]=$(this).val();
                });

                if(arrid.length > 0){
                        // console.log(masp);
                        //Ajax xóa Sản phẩm
                        $.ajax({
                            url: "{{route('admin.product.delete')}}",
                            method: 'DELETE',
                            data:
                            {
                                "_token": "{{ csrf_token() }}", 
                                "arrid":arrid,
                            },
                            success: function (res) {
                            if(res.code == 200){
                                alert(res.message);
                                window.location.href = '{{ route('admin.product.list') }}'
                            }                            

                            }
                        });
                    }else{
                        alert("Please check the product you want to delete."); 
                    }
                }
            });

        //Submit with Param sort, per_page
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

        //Load Modal Speccifiacation
        $('.specopen').click(function() {

            var valuespec = JSON.parse($(this).attr('data-specification'));

            $('#specram').empty();
            $('#specdisplay').empty();
            $('#specos').empty();
            $('#specrom').empty();

            if(valuespec !== null){

                switch(valuespec.material){
                    case 1:
                        $('#specram').append('Leather');
                        break;
                    case 2:
                        $('#specram').append('Canvas');
                        break;
                    default:
                        $('#specram').append('Other');
                        break;
                }

                switch(valuespec.gender){
                    case 1:
                        $('#specdisplay').append('Male');
                        break;
                    case 2:
                        $('#specdisplay').append('Female');
                        break;
                    default:
                        $('#specdisplay').append('Unisex');
                        break;
                }

                switch(valuespec.trendy){
                    case 1:
                        $('#specos').append('Sreet Wear');
                        break;
                    case 2:
                        $('#specos').append('Vintage');
                        break;
                    case 2:
                        $('#specos').append('High-end');
                        break;
                    default:
                        $('#specos').append('Other');
                        break;
                }
              
                $('#specrom').append(valuespec.weight + ' Kg');

            }else{

                $('#specram').append("N/A");
                $('#specdisplay').append("N/A");
                $('#specos').append("N/A");
                $('#specrom').append("N/A");
            }
        });

        //Clean Modal Add
        $('#btnAddPro').click(function(event) {
            $('#avatarEdit').attr('src', '');
        });


        //Ajax Add
        $('form#addForm').submit(function (e) {

            e.preventDefault();
            var formData = new FormData($('form#addForm')[0]);
            $.ajax({
                url: "{{route('admin.product.store')}}",
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
                        window.location.href = '{{ route('admin.product.list') }}'
                    }
                }
            });
        });

        //Load Image on Add and Edit
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


        //Show/hide Column
        if( sessionStorage.getItem('status_chucnang') == 0 )
        {
            $(".thchucnang").css('display','none');
            $(".tdchucnang").css('display','none');
        }else{
            $(".thchucnang").css('display','table-cell');
            $(".tdchucnang").css('display','table-cell');
            $("#cchucnang").prop('checked', 'true');
        }

        $('#cchucnang').click(function(){
            if( $('#cchucnang').prop('checked') == true){
             $(".thchucnang").css('display','table-cell');
             $(".tdchucnang").css('display','table-cell');
             sessionStorage.setItem('status_chucnang', 1);
         }else{
            $(".thchucnang").css('display','none');
            $(".tdchucnang").css('display','none');
            sessionStorage.setItem('status_chucnang', 0);
        }
        });

        if( sessionStorage.getItem('status_hinhanhsanpham') == 0 )
        {
            $(".thhinhanhsanpham").css('display','none');
            $(".tdhinhanhsanpham").css('display','none');
        }else{
            $(".thhinhanhsanpham").css('display','table-cell');
            $(".tdhinhanhsanpham").css('display','table-cell');
            $("#chinhanhsanpham").prop('checked', 'true');
        }

        $('#chinhanhsanpham').click(function(){
            if( $('#chinhanhsanpham').prop('checked') == true){
               $(".thhinhanhsanpham").css('display','table-cell');
               $(".tdhinhanhsanpham").css('display','table-cell');
               sessionStorage.setItem('status_hinhanhsanpham', 1);
            }else{
                $(".thhinhanhsanpham").css('display','none');
                $(".tdhinhanhsanpham").css('display','none');
                sessionStorage.setItem('status_hinhanhsanpham', 0);
            }
        });


        if( sessionStorage.getItem('status_soluong') == 0 )
        {
            $(".thsoluong").css('display','none');
            $(".tdsoluong").css('display','none');
        }else{
            $(".thsoluong").css('display','table-cell');
            $(".tdsoluong").css('display','table-cell');
            $("#csoluong").prop('checked', 'true');
        }

        $('#csoluong').click(function(){
            if( $('#csoluong').prop('checked') == true){
               $(".thsoluong").css('display','table-cell');
               $(".tdsoluong").css('display','table-cell');
               sessionStorage.setItem('status_soluong', 1);
            }else{
                $(".thsoluong").css('display','none');
                $(".tdsoluong").css('display','none');
                sessionStorage.setItem('status_soluong', 0);
            }
        });

         if( sessionStorage.getItem('status_thongso') == 0 )
        {
            $(".ththongso").css('display','none');
            $(".tdthongso").css('display','none');
        }else{
            $(".ththongso").css('display','table-cell');
            $(".tdthongso").css('display','table-cell');
            $("#cthongso").prop('checked', 'true');
        }

        $('#cthongso').click(function(){
            if( $('#cthongso').prop('checked') == true){
               $(".ththongso").css('display','table-cell');
               $(".tdthongso").css('display','table-cell');
               sessionStorage.setItem('status_thongso', 1);
            }else{
                $(".ththongso").css('display','none');
                $(".tdthongso").css('display','none');
                sessionStorage.setItem('status_thongso', 0);
            }
        });

        if( sessionStorage.getItem('status_loaisanpham') == 0 )
        {
            $(".thloaisp").css('display','none');
            $(".tdloaisp").css('display','none');
        }else{
            $(".thloaisp").css('display','table-cell');
            $(".tdloaisp").css('display','table-cell');
            $("#cloaisp").prop('checked', 'true');
        }

        $('#cloaisp').click(function(){
            if( $('#cloaisp').prop('checked') == true){
               $(".thloaisp").css('display','table-cell');
               $(".tdloaisp").css('display','table-cell');
               sessionStorage.setItem('status_loaisanpham', 1);
            }else{
                $(".thloaisp").css('display','none');
                $(".tdloaisp").css('display','none');
                sessionStorage.setItem('status_loaisanpham', 0);
            }
        });

        
        if( sessionStorage.getItem('status_thuonghieu') == 0 )
        {
            $(".ththuonghieu").css('display','none');
            $(".tdthuonghieu").css('display','none');
        }else{
            $(".ththuonghieu").css('display','table-cell');
            $(".tdthuonghieu").css('display','table-cell');
            $("#cthuonghieu").prop('checked', 'true');
        }

        $('#cthuonghieu').click(function(){
            if( $('#cthuonghieu').prop('checked') == true){
               $(".ththuonghieu").css('display','table-cell');
               $(".tdthuonghieu").css('display','table-cell');
               sessionStorage.setItem('status_thuonghieu', 1);
            }else{
                $(".ththuonghieu").css('display','none');
                $(".tdthuonghieu").css('display','none');
                sessionStorage.setItem('status_thuonghieu', 0);
            }
        });

            
        if( sessionStorage.getItem('status_trangthai') == 0 )
        {
            $(".thtrangthai").css('display','none');
            $(".tdtrangthai").css('display','none');
        }else{
            $(".thtrangthai").css('display','table-cell');
            $(".tdtrangthai").css('display','table-cell');
            $("#ctrangthai").prop('checked', 'true');
        }

        $('#ctrangthai').click(function(){
            if( $('#ctrangthai').prop('checked') == true){
               $(".thtrangthai").css('display','table-cell');
               $(".tdtrangthai").css('display','table-cell');
               sessionStorage.setItem('status_trangthai', 1);
            }else{
                $(".thtrangthai").css('display','none');
                $(".tdtrangthai").css('display','none');
                sessionStorage.setItem('status_trangthai', 0);
            }
        });

        if( sessionStorage.getItem('status_gia') == 0 )
        {
            $(".thgiasp").css('display','none');
            $(".tdgiasp").css('display','none');
        }else{
            $(".thgiasp").css('display','table-cell');
            $(".tdgiasp").css('display','table-cell');
            $("#cgia").prop('checked', 'true');
        }

        $('#cgia').click(function(){
            if( $('#cgia').prop('checked') == true){
               $(".thgiasp").css('display','table-cell');
               $(".tdgiasp").css('display','table-cell');
               sessionStorage.setItem('status_gia', 1);
            }else{
                $(".thgiasp").css('display','none');
                $(".tdgiasp").css('display','none');
                sessionStorage.setItem('status_gia', 0);
            }
        });

        //AutoComplete Search Name
        var getAllTenSanPham = <?php echo json_encode($listNameProduct); ?>; 

            $( "#tenspsearch" ).autocomplete({
                source: getAllTenSanPham,
                appendTo: "#containerTen",
                minLength: 2,
                delay: 500
            });


        //Show/hide Delete Button
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
        
    </script>
@endsection