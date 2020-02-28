<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><b>Best-selling Products</b></h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <ul class="products-list product-list-in-box">
      @foreach($listTopProduct as $item)
      <li class="item">
        <div class="product-img">
          <img src="{{asset($item->image)}}" alt="Product Image">
        </div>
        <div class="product-info">
          <a href="javascript:void(0)" class="product-title">{{$item->name}}
            <span class="label label-warning pull-right" style="background-color: #3c8dbc !important;">{{'$'.$item->price}}</span></a>
            <span class="product-description">
              {{$item->description}}
            </span>
          </div>
        </li>
      @endforeach
          </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="{{route('admin.product.list')}}" class="uppercase">View All Products</a>
        </div>
        <!-- /.box-footer -->
      </div>