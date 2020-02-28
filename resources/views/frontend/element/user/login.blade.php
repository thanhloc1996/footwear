<div class="register-box">
  <div class="register-logo">
    <a><b>LOGIN</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg"><a href="{{route('password.request')}}">Forgot Password ?</a></p>
    <form id="myForm" enctype="multipart/form-data" method="POST" action="{{route('frontend.post_login')}}">
      {{ csrf_field() }}
      <!-- email -->
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="email" id="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <p id="error_email" style="color: red"></p>
      </div>
      <!-- password -->
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p id="error_pass" style="color: red"></p>
      </div>

      <div class="row text-center" style="margin-left: 0px;">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary" id="submit" style="width: 322px;">Login</button>
        </div>
      </div>

      <div class="row text-center" style="margin-left: 0px; margin-top: 5px;">
        <div class="col-xs-12">
          <a class="btn btn-danger" style="color: white;" href="{{route('admin.login_social_re',['social'=>'google'])}}">Google +</a>
          <a style="margin-left: 57px; margin-right: 57px;">or</a>
          <a class="btn btn-primary" style="color: white;"href="{{route('admin.login_social_re',['social'=>'facebook'])}}">Facebook</a>
        </div>
      </div>

    </form>
  </div>
</div>

<script type="text/javascript">
  $('form#myForm').submit(function (e) {
    $("#lock_overlay").css("display", "block");
    e.preventDefault();
    var formData = new FormData($('form#myForm')[0]);
    $.ajax({
      url: "{{route('frontend.post_login')}}",
      type: 'POST',
      data: formData,
      contentType: false,
      cache : false,
      processData: false,
      success: function (res) {

        $("#lock_overlay").css("display", "none");
        $('input').parent().find('p').remove();

        if (res.code == 200) {
          var data = JSON.parse(JSON.stringify(res.data));
          alert(data + ' ' + res.message);
          location.href = document.referrer;
        }

        if (res.code == 201) {
          var errors = res.data;
          var errors_array = JSON.parse(JSON.stringify(errors));
          for (var i = 0; i < errors_array.length; i++) {
              //console.log(errors_array[i].key);
              $('input[name="' + errors_array[i].key + '"]').parent().append('<p style="color: red;">' + errors_array[i].mess + '</p>');
          }
        }

      }
    });
  });
</script>


