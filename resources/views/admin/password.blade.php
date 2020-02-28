@extends('admin.master')
@section('content')
<style type="text/css">
#shuffle > div {
    float: left;
    line-height: 30px;
    width: 50px;
    text-align: center;
    background-color: rgb(60, 141, 188);
    color: #fff;
    border-radius: 4px;
    margin: 3px;
    margin-left: 60px;
    font-size: 25px;
    font-style: italic;
}
</style>


    <div class="content-wrapper">
        <section class="content-header text-center">
            <b style="font-size: 30px; margin-bottom: 20px; color: rgb(60, 141, 188);">Type your 6 number</b>
        </section>

        <!-- Main content -->
        <section class="content text-center">
       
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-md-12">
                <div id="shuffle" style="cursor: pointer;">
                    <div class='number' data-value='0'>0</div>
                    <div class='number' data-value='1'>1</div>
                    <div class='number' data-value='2'>2</div>
                    <div class='number' data-value='3'>3</div>
                    <div class='number' data-value='4'>4</div>
                    <div class='number' data-value='5'>5</div>
                    <div class='number' data-value='6'>6</div>
                    <div class='number' data-value='7'>7</div>
                    <div class='number' data-value='8'>8</div>
                    <div class='number' data-value='9'>9</div>
                </div>
            </div>
        </div>

        <div class="row" style="font-size: 100px; color: #222d32;">
            <div class="col-md-12 parentnumbertext">
                <div class="col-md-12">
                    <a class="numbertext">******</a>
                </div>
            </div>
        </div>
        <form id="myForm">
        {{csrf_field()}}
        <div class="row" id="errormes" style="color: red; font-size: 15px; font-weight: bold; font-style: italic; margin-bottom: 10px;"></div>
        <input type="hidden" name="password2nd" value="" id="inputPassword">
        <button class="btn btn-success" id="btnChange">Submit</button>
        <button class="btn btn-danger" id="btnReset" type="reset">Reset</button>
        </form>
        </section>
    </div>
@endsection

@section('footer')
<script type="text/javascript">

    $('#inputPassword').empty();

    $('.numbertext').empty();

    $('#btnReset').click(function(){

        $('#inputPassword').empty();

        $('.numbertext').empty();
    });

    $('.number').click(function() {
        if($('#inputPassword').val().length <= 6){

            $('#inputPassword').val($('#inputPassword').val() + $(this).attr('data-value'));
        }
        
        var parent = $("#shuffle");
        var divs = parent.children();
        while (divs.length) {
            parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
        }
        // alert($('.parentnumbertext div:nth-child(1) .numbertext').html().length);
        if($('.parentnumbertext div:nth-child(1) .numbertext').html().length < 6){

            $('.numbertext').append('*');
        }

        // for(var i=1; i <= $('.numbertext').length; i++){

        //     if($('.parentnumbertext div:nth-child(' + i +') .numbertext').html().length == 0){

        //         $('.numbertext')[i].append('*');

        //         console.log($('.parentnumbertext div:nth-child('+ i +') .numbertext').html());

        //         return false;

        //     }else{

        //         alert('dasdasd');

        //         return false; 
        //     }   
        // }
    });

    $('form#myForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData($('form#myForm')[0]);
        $.ajax({
            url: "{{route('admin.post_password2nd')}}",
            type: 'POST',
            data: formData,
            contentType: false,
            cache : false,
            processData: false,
            success: function (res) {
                if (res.code == 201) {
                    $('#errormes').empty();
                    $('#errormes').append('Wrong password!!!');
                    $('#inputPassword').val('');
                    $('.numbertext').empty();
                }

                if (res.code == 200) {
                    $('#errormes').empty();
                    $('#errormes').css('color', 'green');
                    $('#errormes').append('Successfully');
                    window.location.href = '{{ route('admin.dashboard') }}';
                }
            }
        });
    });
</script>
@endsection