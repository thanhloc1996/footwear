<body class="hold-transition">
  <div class="register-box">
    <div class="register-logo">
      <a><b>REGISTER</b></a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Register to be a new member...</p>

      <form id="myForm" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <!-- first name -->
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username" id="username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <p id="error_firstname" style="color: red"></p>
        </div>
        <!-- first name -->
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="First name" name="first_name" id="first_name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <p id="error_firstname" style="color: red"></p>
        </div>
        <!-- last name -->
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Last name" name="last_name" id="last_name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <p id="error_lastname" style="color: red"></p>
        </div>
        <!-- image -->
      <!--   <div class="form-group has-feedback">
          <input type="file" class="form-control" name="image" id="image">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <p id="error_image" style="color: red"></p>
        </div> -->
        <!-- address -->
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Address" name="address" id="address">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <p id="error_address" style="color: red"></p>
        </div>
        <!-- phone -->
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <p id="error_phone" style="color: red"></p>
        </div>
        <!-- email -->
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email" id="email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <p id="error_email" style="color: red"></p>
        </div>
        <!-- password -->
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <p id="error_pass" style="color: red"></p>
        </div>
        <!-- password confirmation -->
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" id="password_confirmation">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          <p id="error_passconfirm" style="color: red"></p>
        </div>
        <!-- gender -->
        <div>
          <input type="radio" name="gender"  checked="checked" value="1">Male 
          <input type="radio"  name="gender" value="2">Female
        </div>
        <div class="row" style="margin-left: 0px;">
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="button contact_submit_button" id="submit">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div>
<input type="hidden" id="url" data-link-register="{{ route('frontend.post.register') }}" data-link-home="{{ route('frontend.home') }}" >


@section('javascript')
<script src="{{asset('/template/frontend/')}}/js/users/user.js"></script>
@stop
