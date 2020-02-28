@extends('admin.master')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

<style>
.mg-image img {
    -webkit-transition: all 1s ease; /* Safari and Chrome */
    -moz-transition: all 1s ease; /* Firefox */
    -o-transition: all 1s ease; /* IE 9 */
    -ms-transition: all 1s ease; /* Opera */
    transition: all 1s ease;
        max-width: 100%;
}
.mg-image:hover img {
    -webkit-transform:scale(1.25); /* Safari and Chrome */
    -moz-transform:scale(1.25); /* Firefox */
    -ms-transform:scale(1.25); /* IE 9 */
    -o-transform:scale(1.25); /* Opera */
     transform:scale(1.25);
}
/* just apply some height and width to the wrapper.*/
.mg-image {
  overflow: hidden;
}
</style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                GALLERY MANAGEMENT
                <small><b>{{$product->name}}</b></small> &nbsp
                <a class="btn btn-warning" data-toggle="modal" data-target="#formThemAnh"><i class="fa fa-plus"></i></a> 
                <a class="btn btn-success dodownload"><i class="fa fa-download"></i></a> 
                <a class="btn btn-danger dodeletemulti"><i class="fa fa-trash"></i></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                <li class="">Gallery Management</li>
                <li class="active">{{$product->name}}</li>
            </ol>
            &nbsp
            <div class="" style="margin-bottom: 10px;">
                <div class="text-left" style="float:left">
                    Number: &nbsp
                    <input type="radio" name="xemanh" value="3"> 3 &nbsp
                    <input type="radio" name="xemanh" value="4" checked=""> 4 &nbsp
                    <input type="radio" name="xemanh" value="6"> 6 
                </div>
                <div class="text-right" style="float:right">
                    <input type="checkbox" name="checkall" id="checkAll"> Check All
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Main row -->
        <form method="post">
        <div id="" style="overflow:scroll; height:800px;">
            <div class="row">
                <div class="col-lg-12">
                    @if(count($listGallery) > 0)
                    @foreach($listGallery as $gallery)
                    <div class="col-lg-3 listanh">
                        &nbsp
                        <a title=""><img src="{{asset($gallery->url)}}" width="100%" data-toggle="modal" data-target="#images-modal" data-zoom="{{asset($gallery->url)}}" class="zoomimg" width="150px" height="250px"></a>
                        <div class="text-center">
                            <input type="checkbox" class="checkmasp" name="checkmasp" value="{{$gallery->id}}" data-download="{{asset($gallery->url)}}"> 
                        </div>
                    </div>
                    @endforeach
                    @else
                        <div class="col-lg-12 listanh text-center">
                            <h4 style="font-weight: bold; color: #333333c7;">No Images found</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </form>
        <!-- /.row (main row) -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<div class="modal" id="formThemAnh">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="text-align: center;">
             <form action="{{route('admin.product_detail.post_gallery',['product_id'=>$product->id])}}" class="dropzone" id="dropzoneJS">
                {{ csrf_field() }}
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
                <div class="dz-message" data-dz-message>
                    <span>Drag & Drop Product images here to upload, or
                        <a class="btn-choose-file btn-link" id="btn-upload">browse.</a>
                    </span>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="images-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body appear text-center">
                Hình ảnh
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    <script>
        $('.zoomimg').click(function () {
            $('.appear').empty();
            var a = $(this).attr('data-zoom');
            $('.appear').append('<div class="mg-image"> <img id="myimage" src="'+ a +'""> </div>');
        });

        Dropzone.options.dropzoneJS = {
            uploadMultiple: true,
            parallelUploads: 10000,
            maxFilesize: 3, // MB
            init: function() {
                this.on('completemultiple', function () {

                    alert('Gallery Updated Successfully.')

                    window.location.href = "{{route('admin.product_detail.gallery',['product_id' => $product->id])}}"
                });
                this.on('error', function () {

                    alert('Failed.')

                    window.location.href = "{{route('admin.product_detail.gallery',['product_id' => $product->id])}}"
                });
            }
        };

        $('.dodownload').click(function(){

            var arrid = [];

            $(".checkmasp:checked").each(function(i) {
                arrid[i]=$(this).attr('data-download');
            });

            if(arrid.length > 0){

                $.each(arrid, function (index, value) {

                    //Download File
                    var file_path = value;
                    var a = document.createElement('A');
                    a.href = value;
                    a.download = file_path.substr(file_path.lastIndexOf('/') + 1);
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                });

            }else{
                alert("Please choose images you want to download!")
            }
        });


        $('.dodeletemulti').click(function(){

            if (confirm('Are you sure to delete that images?')){
                var arrid = [];

                $(".checkmasp:checked").each(function(i) {
                    arrid[i]=$(this).val();
                });

                if(arrid.length > 0){

                        $.ajax({
                            url: "{{route('admin.product_detail.delete_gallery',['product_id' => $product->id])}}",
                            method: 'DELETE',
                            data:
                            {
                                "_token": "{{ csrf_token() }}", 
                                "gallery_id":arrid,
                            },
                            success: function (res) {
                                if(res.code == 200){

                                    alert(res.message);

                                    window.location.href = "{{route('admin.product_detail.gallery',['product_id' => $product->id])}}"
                                }                            

                            }
                        });
                    }else{
                        alert("Please check the images you want to delete."); 
                    }
                }
            });

            $("#checkAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

            $('input[type=radio][name=xemanh]').change(function() {
                if (this.value == '3') {
                    $('.listanh').removeClass("col-lg-3");
                    $('.listanh').removeClass("col-lg-2");
                    $('.listanh').addClass("col-lg-4");
                }
                else if (this.value == '4') {
                    $('.listanh').removeClass("col-lg-2");
                    $('.listanh').removeClass("col-lg-4");
                    $('.listanh').addClass("col-lg-3");
                }
                 else if (this.value == '6') {
                    $('.listanh').removeClass("col-lg-3");
                    $('.listanh').removeClass("col-lg-4");
                    $('.listanh').addClass("col-lg-2");
                }
            });

    </script>
@endsection


