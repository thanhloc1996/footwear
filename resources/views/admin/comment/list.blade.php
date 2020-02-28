@extends('admin.master')
@section('content')

<style type="text/css">
.content-text{
    overflow: hidden;
    width:100%;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
}
</style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                COMMENT MANAGEMENT
                <small><b>{{$product->name}}</b></small> &nbsp
                <a class="btn btn-danger" id="deletemultibutton"><i class="fa fa-trash"></i></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="">Comment Management</li>
                <li class="active">{{$product->name}}</li>
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
                                <h3 class="box-title">TABLE COMMENT</h3>
                                <small>Showing <b> {{count($listComment)}}</b> on <b>{{count($listComment)}}</b> comments of {{$product->name}}</small>
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
                                                <th rowspan="2" class="text-center">Created At</th>
                                                <th rowspan="2" class="text-center">Username</th>
                                                <th rowspan="2" class="text-center">Content</th>
                                                <th rowspan="2" class="text-center">Star</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($listComment as $comment)
                                            <tr>
                                                <td class="text-center tddeletemulti" style="display: none;" >
                                                    <input type="checkbox" class="checkmasp" name="checkmasp" value="{{$comment['id']}}"> 
                                                </td>
                                                <td class="text-center" width="17%">
                                                        {{ $comment['created_at']}} 
                                                </td>
                                                <td class="text-center" width="17%">
                                                    <a style="color: black; font-weight:bold;">
                                                        {{ $comment['user']['username']}} 
                                                    </a> 
                                                </td>
                                                <td class="text-center content-text" width="50%">
                                                    {{ $comment['content']}} 
                                                </td>
                                                <td class="text-center star-rating" width="16%" data-star="{{ $comment['star']}}" style="color:yellow;">

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    @if(count($listComment) == 0) 
                                    <h4 style="font-weight: bold;">No Comment found</h4>
                                    @endif
                                </div>

                                @if($listComment->total() >= 20) 
                                <div class="row">
                                    <div class="col-xs-10 paginate text-right">
                                        {{$listComment->links()}}
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

@include('admin.feedback.modal_content')

@endsection
@section('footer')
    <script>
        
        $('.content-text').dblclick(function(){
            $('#content-modal').modal('show');
            $('#content-append').empty();
            $('#content-append').append($(this).text());
        });

        //Ajax Delete 
        $('.dodeletemulti').click(function(){

            if (confirm('Are you sure to delete that comments?')){
                var arrid = [];

                $(".checkmasp:checked").each(function(i) {
                    arrid[i]=$(this).val();
                });

                if(arrid.length > 0){
                        // console.log(masp);
                        //Ajax xóa Sản phẩm
                        $.ajax({
                            url: "{{route('admin.product_detail.delete_comment',['product_id'=>$product->id])}}",
                            method: 'DELETE',
                            data:
                            {
                                "_token": "{{ csrf_token() }}", 
                                "arrid":arrid,
                            },
                            success: function (res) {
                            if(res.code == 200){
                                alert(res.message);
                                window.location.href = "{{route('admin.product_detail.comment',['product_id' => $product->id])}}"
                            }                            

                            }
                        });
                    }else{
                        alert("Please check the comments you want to delete."); 
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
        
        $('.star-rating').each(function() {

            var a = $(this).attr("data-star");

            var star = '<i class="fa fa-star"></i>';

            switch(a){
                case '1':
                    $(this).append(star.repeat(1));
                    break;
                case 2:
                    $(this).append(star.repeat(2));
                    break;
                case '3':
                    $(this).append(star.repeat(3));
                    break;
                case '4':
                    $(this).append(star.repeat(4));
                    break;
                case '5':
                    $(this).append(star.repeat(5));
                    break;
                default:
                    $(this).append(star.repeat(1));
                    break;
            }     
        });

</script>
@endsection