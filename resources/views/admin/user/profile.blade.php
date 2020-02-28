@extends('admin.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                MY PROFILE &nbsp
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="active">My Profile</li>
            </ol>
        </section>

        <!-- Main content -->
    <section class="content">
        <div class="row">
                    <div class="col-sm-3"><!--left col-->

                        <div class="text-center">
                            <img id="avatar" class="img-circle" src="{{asset($user->image)}}" alt="avatar" width="50%">
                            <h2>{{$user->username}}</h2>
                            <input id="avatarfile" type="file" class="text-center center-block file-upload" style="display: none;">
                        </div></hr><br>

                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-envelope"></i> Email</div>
                            <div class="panel-body"><a href="#">{{$user->email}}</a></div>
                        </div>



                    </div><!--/col-3-->
                    <div class="col-sm-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <hr>
                                <form id="editForm" action="" method="post">
                                    <div class="form-group">
                                        {{ csrf_field() }}
                                        <div class="col-xs-6">
                                            <label for="first_name"><h4>First name</h4></label>
                                            <input type="text" class="form-control" name="first_name" placeholder="first name" title="Type your First Name" value="{{$user->first_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="last_name"><h4>Last name</h4></label>
                                            <input type="text" class="form-control" name="last_name" placeholder="last name" title="Type your Last Name" value="{{$user->last_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="email"><h4>Phone</h4></label>
                                            <input type="text" class="form-control" placeholder="Type your phone" title="Type your phone" value="{{$user->phone}}" name="phone">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="password"><h4>Address</h4></label>
                                            <input type="text" class="form-control" name="address" placeholder="Type your address" title="Type your address" value="{{$user->address}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="gender"><h4>Gender</h4></label><br>
                                            <select class="select2" style="width: 100%;" name="gender">
                                                <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Male</option>
                                                <option value="2" {{ $user->gender == 2 ? 'selected' : '' }}>Female</option>
                                                <option value="3" {{ $user->gender == 3 ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="user_id" value="{{$user->id}}">

                                   <!--  <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="password"><h4>Password 2nd</h4></label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password." value="{{$user->address}}">
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <div class="col-xs-12 text-center mt-10">
                                            <br>
                                            <button class="btn btn-success" type="submit">Submit</button>
                                            <a class="btn btn-danger" data-toggle="modal" data-target="#myModal">Change Password</a>
                                        </div>
                                    </div>
                                </form>

                                <hr>

                            </div><!--/tab-pane-->
                    </div><!--/tab-content-->
        </div>
    </section>
    </div>

@include('admin.user.modal_password')

@endsection

@section('footer')
    <script type="text/javascript">

        $('form#passForm').submit(function (e) {
            e.preventDefault();
            var formData = new FormData($('form#passForm')[0]);

            $.ajax({
                url: "{{route('admin.user.change')}}",
                type: 'POST',
                data: formData,
                contentType: false,
                cache : false,
                processData: false,
                success: function (res) {

                  $('input').parent().find('p').remove();

                  if (res.code == 200) {
                    alert(res.message);
                    window.location.href = '{{ route('admin.user.profile') }}';
                }

                if (res.code == 201) {
                    var errors = res.data;
                    var errors_array = JSON.parse(JSON.stringify(errors));

                    for (var i = 0; i < errors_array.length; i++) {

                        $('input[name="' + errors_array[i].key + '"]').parent().append('<p style="color: red;">' + errors_array[i].mess + '</p>');
                    }
                }
            }
        });
        });


        $('form#editForm').submit(function (e) {
            e.preventDefault();
            var formData = new FormData($('form#editForm')[0]);
            var myFile = $('#avatarfile').prop('files')[0];
            formData.append('image', myFile); 

            $.ajax({
                url: "{{route('admin.user.update')}}",
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

                        window.location.href = '{{ route('admin.user.profile') }}'
                    }
                }
            });
        });

     var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $('#avatar').on('click', function() {
        $('#avatarfile').trigger('click');
    });
    </script>
@endsection