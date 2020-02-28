<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><b>Latest Members</b></h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach($listLatestUser as $item)
                    <li>
                      <img src="{{asset($item->image)}}" alt="User Image" style="height: 52px;">
                      <a class="users-list-name" href="#">{{$item->full_name}}</a>
                      <span class="users-list-date">{{$item->date}}</span>
                    </li>
                    @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{route('admin.user.list')}}" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>