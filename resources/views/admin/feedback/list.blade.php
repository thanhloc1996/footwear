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
                FEEDBACK MANAGEMENT &nbsp
                <a class="btn btn-danger" id="deletemultibutton"><i class="fa fa-trash"></i></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="active">Feedback Management</li>
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
                                <h3 class="box-title">TABLE FEEDBACK</h3>
                                <small>Showing <b> {{count($listFeedback)}}</b> on <b>{{count($listFeedback)}}</b> feedback</small>
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
                                                <th rowspan="2" class="text-center">Created At</th>
                                                <th rowspan="2" class="text-center">Platform</th>
                                                <th rowspan="2" class="text-center">Username</th>
                                                <th rowspan="2" class="text-center">Email</th>
                                                <th rowspan="2" class="text-center">Content</th>
                                                <th rowspan="2" class="text-center">Star</th>
                                                <th rowspan="2" class="text-center">Reply</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($listFeedback as $feedback)
                                            <tr>
                                                <td class="text-center tddeletemulti" style="display: none;">
                                                    <input type="checkbox" class="checkmasp" name="checkmasp" value="{{$feedback['id']}}"> 
                                                </td>
                                                <td class="text-center" width="13%">
                                                    {{ $feedback['created_at']}} 
                                                </td>
                                                 <td class="text-center" width="10%">
                                                    <b>{{ $feedback['user']['provider'] or 'website'}}</b>
                                                </td>
                                                <td class="text-center" width="13%">
                                                    <b>{{ $feedback['user']['username']}}</b>
                                                </td>
                                                <td class="text-center" width="17%">
                                                    <a class="btn-xs btn-primary emailBtn" data-toggle="modal" data-target="#add-modal" data-email="{{$feedback['user']['email']}}" data-username="{{$feedback['user']['username']}}" data-id="{{$feedback['id']}}">
                                                        {{ $feedback['user']['email'] or 'Undefined'}} 
                                                    </a> 
                                                </td>
                                                <td class="text-center content-text" width="50%">
                                                    {{$feedback['content']}} 
                                                </td>
                                                <td class="text-center star-rating" width="16%" data-star="{{ $feedback['star']}}" style="color:yellow;">
                                                </td>
                                                <td class="text-center" width="5%">
                                                    @if($feedback['reply'] == 0)
                                                        <a class="btn-xs btn-danger"><i class="fa fa-remove"></i></a>
                                                    @else
                                                        <a class="btn-xs btn-success"><i class="fa fa-check"></i></a>
                                                    @endif 
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    @if(count($listFeedback) == 0) 
                                    <h4 style="font-weight: bold;">No Feedback found</h4>
                                    @endif
                                </div>

                                @if($listFeedback->total() >= 20) 
                                <div class="row">
                                    <div class="col-xs-10 paginate text-right">
                                        {{$listFeedback->links()}}
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

@include('admin.feedback.modal_mail')

@include('admin.feedback.modal_content')

@endsection
@section('footer')
    <script>
        $('.content-text').dblclick(function(){
            $('#content-modal').modal('show');
            $('#content-append').empty();
            $('#content-append').append($(this).text());
        });

        $('form#myForm').submit(function (e) {

            e.preventDefault();
            var formData = new FormData($('form#myForm')[0]);
            $.ajax({
                url: "{{route('admin.feedback.send_mail')}}",
                method: 'POST',
                data: formData,
                contentType: false,
                cache : false,
                processData: false,
                success: function (res) {

                    $('#add-modal').modal('hide');

                    if (res.code == 201) {
                        
                        alert(res.message);
                    }
                    if (res.code == 200) {

                        window.location.href = "{{route('admin.feedback.list')}}"
                        alert(res.message);
                    }
                }
            });
        });

        $('.emailBtn').click(function(){
            $('#toUserInput').val($(this).attr('data-username') + ' (' +$(this).attr('data-email')+ ')');
            $('#emailInput').val($(this).attr('data-email'));
            $('#usernameInput').val($(this).attr('data-username'));
            $('#feedbackIdInput').val($(this).attr('data-id'));
        });

        //Ajax Delete 
        $('.dodeletemulti').click(function(){

            if (confirm('Are you sure to delete that feedback?')){
                var arrid = [];

                $(".checkmasp:checked").each(function(i) {
                    arrid[i]=$(this).val();
                });

                if(arrid.length > 0){
                        // console.log(masp);
                        //Ajax xóa Sản phẩm
                        $.ajax({
                            url: "{{route('admin.feedback.delete')}}",
                            method: 'DELETE',
                            data:
                            {
                                "_token": "{{ csrf_token() }}", 
                                "arrid":arrid,
                            },
                            success: function (res) {
                            if(res.code == 200){
                                alert(res.message);
                                window.location.href = "{{route('admin.feedback.list')}}"
                            }                            

                            }
                        });
                    }else{
                        alert("Please check the feedback you want to delete."); 
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