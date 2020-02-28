  <style type="text/css">
  .tab-pane{
    border: 1px solid #0000002b;
    margin-top: 5px;
    border-radius: 5px;
    padding: 15px;
  }
  a{
    cursor: pointer;
  }
</style>


<div class="container" style="margin-top: 55px; margin-bottom: 15px">
  <ul class="nav nav-tabs" role="tablist" style="font-size: 20;">
    <li class="nav-item">
      <a class="nav-link tab_profile" href="#profile" role="tab" data-toggle="tab" id="">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link tab_bill" href="#buzz" role="tab" data-toggle="tab" id="">Bills</a>
    </li>
    <li class="nav-item">
      <a class="nav-link tab_activities" href="#references" role="tab" data-toggle="tab" id="">Activities</a>
    </li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane  tab_profile" id="profile">
      <form id="myForm" method="POST" action="{{route('frontend.post_user_profile')}}">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-lg-3">
            <div class="text-center">
              <img id="avatar" src="{{asset($user->image)}}" class="avatar img-circle img-thumbnail" alt="avatar" width="180px;">
              <p style="font-size: 10px; font-style: italic;">Can't upload file bigger than 2MB</p>
              <input name="avatarfile" id="avatarfile" type="file" class="text-center center-block file-upload" style="display: none;">
            </div>
          </div>
          <div class="col-lg-9 mt-10">
            <div class="row">
              <div class="col-lg-12">
                <label for="first_name" style="font-weight: bolder;">Email</label>
                <input  class="form-control" type="text" name="" disabled value="{{$user->email}}"> 
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-12">
                <label for="first_name" style="font-weight: bolder;">First Name</label>
                <input  class="form-control" type="text" name="first_name" value="{{$user->first_name}}"> 
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-12">
                <label for="last_name" style="font-weight: bolder;">Last Name</label>
                <input  class="form-control" type="text" name="last_name" value="{{$user->last_name}}"> 
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-12">
                <label for="address" style="font-weight: bolder;">Address</label>
                <input  class="form-control" type="text" name="address" value="{{$user->address}}"> 
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-12">
                <label for="phone" style="font-weight: bolder;">Phone Number</label>
                <input  class="form-control" type="text" name="phone" value="{{$user->phone}}"> 
              </div>
            </div>  
            <div class="row mt-3">
              <div class="col-lg-12">
                <label for="gender" style="font-weight: bolder;">Gender</label>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="col-lg-3">
                      <input class="" type="radio" name="gender" value="1" @if($user->gender == 1) {{'checked'}} @endif> Male
                    </div>
                    <div class="col-lg-9">
                      <input class="" type="radio" name="gender" value="2" @if($user->gender == 2) {{'checked'}} @endif> Female
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-center mt-5">
          <div class="col-lg-12">
            <button class="btn btn-primary" type="submit">Submit</button>
            @if(Auth::user()->provider_id == null)
            <button class="btn btn-danger" type="reset" data-toggle="modal" data-target="#myModal">Change Password</button>
            @endif
          </div>
        </div>
      </form>
    </div>

    <div role="tabpanel" class="tab-pane tab_bill" id="buzz">
      @if(count($listBill) ==0)
      <div class="row mt-3" style="font-weight: bolder; color: #00000066; text-align: center;">
        <div class="col-lg-12" style="text-align: center;">
            <h3> NO BILL </h3>
        </div>
      </div>
      @else
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" class="text-center">Bill ID</th>
            <th scope="col" class="text-center">Created At</th>
            <th scope="col" class="text-center">Total</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Detail</th>
          </tr>
        </thead>
        <tbody>
          @foreach($listBill as $bill)
          <tr>
            <td class="text-center">{{$bill['id']}}</td>
            <td class="text-center">{{$bill['created_at']}}</td>
            <td class="text-center">{{'$'.$bill['total']}}</td>
            <td class="text-center">{{$bill['status']}}</td>
            <td class="text-center"><a class="btn btn-primary detail_btn" style="color: white" data-toggle="modal" data-target="#detail-modal" data-bill="{{json_encode($bill)}}"><i class="fa fa-eye" ></i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>

    <div role="tabpanel" class="tab-pane tab_activities" id="references">
      @if(count($listComment) == 0)
      <div class="row mt-3" style="font-weight: bolder; color: #00000066; text-align: center;">
        <div class="col-lg-12" style="text-align: center;">
            <h3> NO COMMENT</h3>
        </div>
      </div>
      @else
      <div class="row mt-3" style="font-weight: bolder;">
          <div class="col-lg-12 mt-3"><a>Comments</a>
          </div>
      </div>
      @foreach($listComment as $comment)
      <div class="row mt-3">
        <div class="col-lg-12">
          <img src="{{asset($comment->product->image)}}" alt="" width="32"><a style="font-size: 20px;">{{' '.$comment->product->name }} <a style="font-size: 13px;color:yellow;"><i class="fa fa-star"></i></a><a style="color:black; font-style: italic;">{{' from '.$comment->date}} </a></a><i class="fa fa-minus-circle delete_comment" style="color: red; cursor: pointer;" data-comment="{{$comment->id}}" title="Delete this comment!"></i>
          <p style="margin-top: 15px;">{{$comment->content}}</p>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="passForm" method="POST" action="{{route('frontend.change_password')}}">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-lg-12 mt-10">
            <div class="row">
              <div class="col-lg-12">
                <label for="currentpassword">Current Password(*):</label>
                <input class="form-control" type="password" name="currentpassword" value=""> 
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-12">
                <label for="password">New Password</label>
                <input class="form-control" type="password" name="password" value=""> 
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-12">
                <label for="password_confirmation">Confirm Password</label>
                <input class="form-control" type="password" name="password_confirmation" value=""> 
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="row text-center mt-3 mb-3">
          <div class="col-lg-12">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

@include('frontend.element.user.modal_bill')

<script>
  $(document).ready(function() {

    <?php 
    if($errors->first()){
    ?>
      alert('Your bill is cashed!');
      sessionStorage.setItem('clicked', 'actionTabOne');
    <?php
    }
    ?>

    $('.detail_btn').click(function() {

       var value = JSON.parse($(this).attr('data-bill'));

       // console.log(value.created_at);
       $('#headerBill').empty();
       $('#orderBill').empty();
       $('#totalBill').empty();
       $('#headerBill').append('BILL ID: ' + value.id);
       $('#orderBill').append('ORDERED AT ' + value.created_at);
       $('#totalBill').append('Total: $' + value.total);

       $('#table-product').empty();
       jQuery.each(value.bill_detail, function(index , item) {
        index++;
        var a = '<tr style="margin-top:5px;"><td width="5%">'+ index +'</td><td width="50%">'+ item.product_detail.product.name +' ('+ item.product_detail.name+')</td><td width="10%">'+ '$'+item.product_detail.price+'</td><td width="10%">'+item.quantity+'</td><td width="15%">'+'$'+item.total+'</td></tr>';

        $('#table-product').append(a);
      });           
    });

    $('.delete_comment').click(function() { 
      var value = $(this).attr('data-comment');
      $.ajax({
        url: "{{route('frontend.comment.delete')}}",
        method: 'DELETE',
        data: {
          '_token': "{{csrf_token()}}",
          'comment_id': value
        },
        success: function (res) {

          alert(res.message);

          window.location.href = '{{ route('frontend.user_profile') }}'
        }
      });
    });

    var readURL = function(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.avatar').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $(".file-upload").on('change', function(){
      readURL(this);
    });
  });

  $('#avatar').on('click', function() {
    $('#avatarfile').trigger('click');
  });

  $('body').attr('color','red');

  $('form#myForm').submit(function (e) {
    $("#lock_overlay").css("display", "block");
    e.preventDefault();
    var formData = new FormData($('form#myForm')[0]);
    // console.log(formData);
    var myFile = $('#avatarfile').prop('files');
    formData.append('avatarfile', myFile); 
    $.ajax({
        url: "{{route('frontend.post_user_profile')}}",
        type: 'POST',
        data: formData,
        contentType: false,
        cache : false,
        processData: false,
        success: function (res) {

          $("#lock_overlay").css("display", "none");
          $('input').parent().find('p').remove();

          if (res.code == 200) {
            alert(res.message);
          }

          if (res.code == 201) {
            var errors = res.data;
            var errors_array = JSON.parse(JSON.stringify(errors));
            //console.log(errors_array);
            for (var i = 0; i < errors_array.length; i++) {
                //console.log(errors_array[i].key);
                $('input[name="' + errors_array[i].key + '"]').parent().append('<p style="color: red;">' + errors_array[i].mess + '</p>');
              }
            }
          }
    });
  });

  $('form#passForm').submit(function (e) {
    $("#lock_overlay").css("display", "block");
    e.preventDefault();
    var formData = new FormData($('form#passForm')[0]);
    // console.log(formData);
    $.ajax({
        url: "{{route('frontend.change_password')}}",
        type: 'POST',
        data: formData,
        contentType: false,
        cache : false,
        processData: false,
        success: function (res) {
          $("#lock_overlay").css("display", "none");
          $('input').parent().find('p').remove();
          
          if (res.code == 200) {
            alert(res.message);
            $('#myModal').modal('hide');
          }

          if (res.code == 201) {
            var errors = res.data;
            var errors_array = JSON.parse(JSON.stringify(errors));
            //console.log(errors_array);
            for (var i = 0; i < errors_array.length; i++) {
                //console.log(errors_array[i].key);
                $('input[name="' + errors_array[i].key + '"]').parent().append('<p style="color: red;">' + errors_array[i].mess + '</p>');
            }
          }
        }
    });
  });

  $('.tab_profile').click(function(){
    sessionStorage.setItem('clicked', 'actionTab');
  });
  $('.tab_bill').click(function(){
    sessionStorage.setItem('clicked', 'actionTabOne');
  });
  $('.tab_activities').click(function(){
    sessionStorage.setItem('clicked', 'actionTabTwo');
  });
  switch (sessionStorage.getItem('clicked')) {
    case 'actionTab':
    $('.tab_profile').addClass('active');
    break;
    case 'actionTabOne':
    $('.tab_bill').addClass('active');
    break;
    case 'actionTabTwo':
    $('.tab_activities').addClass('active');
    break;
    default:
    $('.tab_profile').addClass('active');
    break;
  }
</script>