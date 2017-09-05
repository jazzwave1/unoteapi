  <!-- Morris charts -->
  <link rel="stylesheet" href="<?=IMGURL?>/plugins/morris/morris.css">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Members</span>
              <span class="info-box-number"><?=$nAccount?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-file-text-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">등록된 노트</span>
              <span class="info-box-number"><?=$nNote?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-floppy-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">전체 학습윤문</span>
              <span class="info-box-number"><?=$sBSCnt?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">미들웨어상태</span>
              <span class="info-box-number"><?=$sServerStatus?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

      </div>

    <div class="col-md-6">
        <!-- DONUT CHART -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">글감 수집 현황</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body chart-responsive">
            <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>


    <div class="col-md-6">
        <!-- LINE CHART -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">등록중인 글 ( 최근 30일 )</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body chart-responsive">
                <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    

    <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">맞춤법 & 윤문추천 Count ( 최근 10일 )</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body chart-responsive">
            <div class="chart" id="bar-chart" style="height: 300px;"></div>
          </div>
          <!-- /.box-body -->
        </div>
    </div>


    <div class="col-md-6">
        <!-- AREA CHART -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">윤문학습누적데이터</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="revenue-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->  

    </div>


<script>
$(function () {
    "use strict";
    //DONUT CHART
    var donut = new Morris.Donut({
        element: 'sales-chart',
        resize: true,
        colors: ["#3c8dbc","#00a65a","#f56954"],
        //data: [
        //    {label: "Facebook", value: 12},
        //    {label: "Naver Blog", value: 30},
        //    {label: "Daum Cafe", value: 20}
        //],
        data : <?=$sArticleString?>
        ,
        hideHover: 'auto'
    });

    var area = new Morris.Area({
        element: 'revenue-chart',
        resize: true,
        data: [
            {y: '2017 Q1', item1: 2666},
            {y: '2017 Q2', item1: 2778},
            {y: '2017 Q3', item1: 4912},
            {y: '2017 Q4', item1: 5767}
        ],
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['윤문학습량'],
        lineColors: ['#a0d0e0'],
        hideHover: 'auto'
    });


    //BAR CHART
    var bar = new Morris.Bar({
        element: 'bar-chart',
        resize: true,
        //data: [
        //{y: '2006', a: 100, b: 90},
        //{y: '2007', a: 75, b: 65},
        //{y: '2008', a: 50, b: 40},
        //{y: '2009', a: 75, b: 65},
        //{y: '2010', a: 50, b: 40},
        //{y: '2011', a: 75, b: 65},
        //{y: '2012', a: 100, b: 90}
        //],
        data:<?=$sApiCallString?> 
        ,
        barColors: ['#00a65a', '#f56954'],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['윤문추천', '맞춤법검사'],
        hideHover: 'auto'
    });
    // LINE CHART
    var line = new Morris.Line({
        element: 'line-chart',
        resize: true,
//      data: [
//      {y: '2011 Q1', item1: 2666},
//      {y: '2011 Q2', item1: 2778},
//      {y: '2011 Q3', item1: 4912},
//      {y: '2011 Q4', item1: 3767},
//      {y: '2012 Q1', item1: 6810},
//      {y: '2012 Q2', item1: 5670},
//      {y: '2012 Q3', item1: 4820},
//      {y: '2012 Q4', item1: 15073},
//      {y: '2013 Q1', item1: 10687},
//      {y: '2013 Q2', item1: 8432}
//      ],
        data : <?=$sNoteString?>,
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Item 1'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto'
    });
    
});
</script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?=IMGURL?>/plugins/morris/morris.min.js"></script>
