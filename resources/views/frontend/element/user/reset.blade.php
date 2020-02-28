<div class="register-box">
  <div class="register-logo">
    <a><b>RESET PASSWORD</b></a>
  </div>

  <div class="register-box-body">
    <form id="myForm" method="POST" action="{{ route('password.request') }}">
      {{ csrf_field() }}
      <!-- email -->
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="email" id="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <p id="error_email" style="color: red"></p>
      </div>
      <!-- password -->
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p id="error_pass" style="color: red"></p>
      </div>

       <!-- password -->
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p id="error_pass" style="color: red"></p>
      </div>

      <div class="row text-center" style="margin-left: 0px;">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary" id="submit" style="width: 322px;">Submit</button>
        </div>
      </div>

    </form>
  </div>
</div>

<script type="text/javascript">
  $('form#myForm').submit(function (e) {

    e.preventDefault();
    var formData = new FormData($('form#myForm')[0]);
    $.ajax({
      url: "{{ route('password.request') }}",
      method: 'POST',
      data: formData,
      contentType: false,
      cache : false,
      processData: false,
      success: function (res) {

        console.log(res.code);

        if(res.code == 200){
          alert(res.status);
          window.location.href = '{{ route('frontend.login') }}'
        }
        
        if (res.code == 500) {

          var errors = res.data;

          var errors_array = JSON.parse(JSON.stringify(errors));

          for (var i = 0; i < errors_array.length; i++) {

          $('#myForm :input[name="' + errors_array[i].key + '"]').parent().append('<p style="color: red;">' + errors_array[i].mess + '</p>');
          }
        }
      }
    });
  });

</script>


