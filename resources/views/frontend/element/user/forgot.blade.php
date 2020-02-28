<div class="register-box">
  <div class="register-logo">
    <a style="font-size: 30px;"><b>FORGOT PASSWORD</b></a>
  </div>

  <div class="register-box-body">
    <form id="myForm" enctype="multipart/form-data" method="POST" action="{{ route('password.email') }}">
      {{ csrf_field() }}
      <!-- email -->
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="email" id="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <p id="error_email" style="color: red"></p>
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
                url: "{{ route('password.email') }}",
                method: 'POST',
                data: formData,
                contentType: false,
                cache : false,
                processData: false,
                success: function (res) {

                    alert(res.status);
                    
                    window.location.href = '{{ route('frontend.login') }}'
                }
            });
        });
</script>


