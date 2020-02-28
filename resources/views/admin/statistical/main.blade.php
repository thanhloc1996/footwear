@extends('admin.master')
@section('content')
<style type="text/css">
.ct-series-a .ct-area, .ct-series-a .ct-slice-donut-solid, .ct-series-a .ct-slice-pie { fill: #3c8dbc; }
.ct-series-a .ct-bar, .ct-series-a .ct-line, .ct-series-a .ct-point, .ct-series-a .ct-slice-donut { stroke: #3c8dbc; }
.ct-label {
  font-size: 21px;
  color: black;
  fill: black;
}
.myclass0{
  fill:#3c8dbc;
  color:#3c8dbc;
}
.myclass1{
  fill:#dd4b39;
  color:#dd4b39;
}
.myclass2{
  fill:#00a65a;
  color:#00a65a;
}
.myclass3{
  fill:#f39c12;
  color:#f39c12;
}
.myclass4{
  fill:#666;
  color:#666;
}
.myclass5{
  fill:red;
  color:red;
}
.myclass6{
  fill:#171717;
  color:#171717;
}
.myclass7{
  fill:#ddd;
  color:#ddd;
}
.myclass8{
  fill:#ab327f;
  color:#ab327f;
}
.myclass9{
  fill:#432f6a;
  color:#432f6a;
}
</style>
    <div class="content-wrapper">
        <section class="content-header">
        </section>

        <div class="row">
          <div class="col-lg-12 text-center">
            <ul class="nav nav-tabs" style="display: inline-block;">
              <li class="active"><a data-toggle="tab" href="#menu1">Products In A Week</a></li>
              <li><a data-toggle="tab" href="#home">Best-selling Products</a></li>
            </ul>

            <div class="tab-content" style="margin-top: 25px;">
              <div id="home" class="tab-pane">
                <div class="col-lg-8">
                    <div class="ct-chart ct-perfect-fourth" style="width: 85%"></div>
                </div>
                <div class="col-lg-4" style="text-align: left;">
                  <h3 style="font-weight: bold;">Top 10 Best-selling Products</h3>
                  @foreach($listTopProduct as $index => $item)
                  <p><i class="fa fa-square myclass{{$index}}"></i>{{' '.$item['name'].' ('.$item['value'].'%)'}}</p>
                  @endforeach
                </div>
              </div>

              <div id="menu1" class="tab-pane active">
                <div class="col-md-12">
                  <div class="chart_two"></div>
                  <div><small style="font-style: italic;">Number of products on a week...</small></div>
                </div>
              </div>

            </div>

          </div>
        </div>
    </div>
    @endsection

@section('footer')
<script type="text/javascript">

  //Chart One
  var array = <?php echo json_encode($listTopProduct); ?>;
  var data = {
  series: array,
  total:100
  };

  var options = {
    showLabel: false,
    classNames: {
      chartPie: 'ct-chart-pie',
      chartDonut: 'ct-chart-donut',
      series: 'ct-series',
      slicePie: 'ct-slice-pie',
      sliceDonut: 'ct-slice-donut',
      sliceDonutSolid: 'ct-slice-donut-solid',
      label: 'ct-label'
    },
  };

  new Chartist.Pie('.ct-chart', data, options);

  //Two Chart
  var arrayTwo = <?php echo json_encode($countProductWeek); ?>;
  var arrLabel = [];
  var arrCount = [];
  var maxCount = 10;

  for (var i = 0; i < arrayTwo.length; i++) {
    arrLabel[i] = arrayTwo[i].date;
  }

  for (var i = 0; i < arrayTwo.length; i++) {
    arrCount[i] = arrayTwo[i].quantity;
  }

  var maxCount = Math.max.apply(Math, arrCount);

  var chart = new Chartist.Line('.chart_two', {
    labels: arrLabel,
    series: [
      arrCount
    ]
  }, {
    low: 0,
    high:maxCount + 10,
    height: 500,
    width: 1000,
    showArea: true,
    showPoint: false,
    fullWidth: false,
    axisY: {
      labelInterpolationFnc: function(value) {
        return Math.round(value);
      }
    }
  });

  chart.on('draw', function(data) {
    if(data.type === 'line' || data.type === 'area') {
      data.element.animate({
        d: {
          begin: 2000 * data.index,
          dur: 2000,
          from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
          to: data.path.clone().stringify(),
          easing: Chartist.Svg.Easing.easeOutQuint
        }
      });
    }
  });

</script>
@endsection