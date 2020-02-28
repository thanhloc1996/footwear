<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><b>Latest Bill</b></h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
          <tr>
            <th width="10%">Bill ID</th>
            <th width="20%">Created At</th>
            <th width="20%">Username</th>
            <th>Email</th>
            <th width="12%">Total</th>
            <th width="10%">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($listBill as $item)
          <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['created_at']}}</td>
            <td>
              <a style="color: black; font-weight: bold;">
                {{ $item['user']['username'] }} 
              </a>
            </td>
            <td>
              <a class="btn-xs btn-primary">
                {{ $bill['user']['email'] or 'Undefined'}} 
              </a>
            </td>
            <td>{{'$'.$item['total']}}</td>
            <td>@if($item['status'] == 1)
              <a class="btn-xs btn-warning">Processing</a>
              @elseif($item['status'] == 2)
              <a class="btn-xs btn-success">Completed</a>
              @elseif($item['status'] == 4)
              <a class="btn-xs btn-primary">Checkout</a>
              @else
              <a class="btn-xs btn-danger">Canceled</a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix text-center">
     <a href="{{route('admin.bill.list')}}" class="uppercase">View All Bills</a>
  </div>
  <!-- /.box-footer -->
</div>