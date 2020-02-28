
// register
$('#myForm').submit(function (e) {
      e.preventDefault();
      $('#error_firstname').empty();
      $('#error_lastname').empty();
      $('#error_image').empty();
      $('#error_address').empty();
      $('#error_phone').empty();
      $('#error_email').empty();
      $('#error_pass').empty();
      $('#error_passconfirm').empty();
      var formData = new FormData($('form#myForm')[0]);
      var myFile = $('#image').prop('files');
      formData.append('image', myFile); 
      var urlRegister = $("#url").attr("data-link-register");
      var urlHome = $("#url").attr("data-link-home");
      $.ajax({
        url: urlRegister,
        type: 'POST',
        data: formData,
        contentType: false,
        cache : false,
        processData: false,
        success: function (res) {
          if(res.success){
           window.location.href = urlHome;
           alert('Đăng kí thành công :D');
         }
         else if(res.errors)
         {
          if(res.errors.first_name){$('#error_firstname').append(res.errors.first_name[0]);}
          if(res.errors.last_name){$('#error_lastname').append(res.errors.last_name[0]);}
          if(res.errors.image){$('#error_image').append(res.errors.image[0]);}
          if(res.errors.address)
          {
            $('#error_address').append(res.errors.address[0]);
          }
          if(res.errors.phone)
          {
            $('#error_phone').append(res.errors.phone[0]);
          }
          if(res.errors.email)
          {
            $('#error_email').append(res.errors.email[0]);
          }
          if(res.errors.password)
          {
            $('#error_pass').append(res.errors.password[0]);
          }
          if(res.errors.password_confirmation)
          {
            $('#error_passconfirm').append(res.errors.password_confirmation[0]);
          } 
        }
      }

  });
    });