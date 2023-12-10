<div class="static-content">
	<div class="page-content">
		<ol class="breadcrumb">

			<li class="active">Dashboard</li>

		</ol>
		<div class="page-heading">
      <div class="row">
      <div class="col-md-4"> <h1>Dashboard</h1> </div>
      <div class="col-md-4"><a href="<?php echo $this->config->item('admin_url')."dashboard/dbBackup"; ?>"><button class="dw-btn btn-warning btn"><i class="fa fa-download"></i> DOWNLOAD DATABASE : USERS WITH ABSTRACTS</button> </a></div>
       <div class="col-md-4"><a href="<?php echo $this->config->item('admin_url')."dashboard/dbBackup2"; ?>"><button class="dw-btn btn-warning btn"><i class="fa fa-download"></i> DOWNLOAD DATABASE : COMPLETE USERS</button> </a></div>
    </div>
		</div>
		<div class="container-fluid">



      <div class="row"> </div>


      <div class="row">

                    <div class="col-md-4">
                        <a href="<?php echo $this->config->item('admin_url');?>pages">
                            <div class="info-tile info-tile-alt tile-danger elsq">
                                <div class="tile-icon"><i class="fa fa-arrows fa-5x"></i></div>
                                <div class="tile-heading"><span>PAGES!</span></div>
                                <div class="tile-body">
                                    <span><?php echo $pages; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>



                    <div class="col-md-4">
                        <a href="<?php echo $this->config->item('admin_url');?>news">
                            <div class="info-tile info-tile-alt tile-primary elsq">
                                <div class="tile-icon"><i class="fa fa-arrows fa-5x"></i></div>
                                <div class="tile-heading"><span>NEWS & EVENTS!</span></div>
                                <div class="tile-body">
                                    <span><?php echo $news; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-md-4">
                        <a href="<?php echo $this->config->item('admin_url');?>attractions">
                            <div class="info-tile info-tile-alt tile-success elsq">
                                <div class="tile-icon"><i class="fa fa-arrows fa-5x"></i></div>
                                <div class="tile-heading"><span>ATTRACTIONS!</span></div>
                                <div class="tile-body">
                                    <span><?php echo $attractions; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
      </div>





                  <div class="row">
                    <div class="col-md-4">
                        <a href="<?php echo $this->config->item('admin_url');?>speakers">
                            <div class="info-tile info-tile-alt tile-success elsq">
                                <div class="tile-icon"><i class="fa fa-arrows fa-5x"></i></div>
                                <div class="tile-heading"><span>SPEAKERS!</span></div>
                                <div class="tile-body">
                                    <span><?php echo $speakers?></span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a href="<?php echo $this->config->item('admin_url');?>paidusers">
                            <div class="info-tile info-tile-alt tile-danger elsq">
                                <div class="tile-icon"><i class="fa fa-arrows fa-5x"></i></div>
                                <div class="tile-heading"><span>PAID USERS!</span></div>
                                <div class="tile-body">
                                    <span><?php echo $paid?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo $this->config->item('admin_url');?>freeusers">
                            <div class="info-tile info-tile-alt tile-primary elsq">
                                <div class="tile-icon"><i class="fa fa-arrows fa-5x"></i></div>
                                <div class="tile-heading"><span>UNPAID USERS!</span></div>
                                <div class="tile-body">
                                    <span><?php echo $unpaid?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>







  


      








      <div class="row"> </div>



      <div class="row"> </div>






    </div> <!-- .container-fluid -->
  </div> <!-- #page-content -->






</div>

<script type="text/javascript">
	
	jQuery(document).ready(function() {

    $(function() {


      function count($this){
        var current = parseInt($this.html(), 10);
        current = current + 1; /* Where 1 is increment */
        $this.html(++current);
        if(current > $this.data('count')){
          $this.html($this.data('count'));
        } else {
          setTimeout(function(){count($this)}, 50);
        }
      }
      jQuery(".stat-count").each(function() {
        jQuery(this).data('count', parseInt(jQuery(this).html(), 10));
        jQuery(this).html('0');
        count(jQuery(this));
      });





    // Chartist
    var Chartist1 = new Chartist.Line('#chart1', {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      series: [{
        label: 'Monthly Sales',
        data: [
        <?php foreach ($salesNum as $key => $value) { ?>
         {meta:'Monthly Sales', value: <?php echo $value; ?>},
         <?php } ?>
         ]
       }]
     }, {
      height: 368,
      fullWidth: true,
      low: 0,
      high: 20,
      showArea: true,
      axisY: {
        onlyInteger: true,
        offset: 20
      },
      plugins: [
      Chartist.plugins.tooltip()
      ]
    });


    var chartistData2 = {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      series: [{
        label: 'Sales',
        data: [ 
        <?php foreach ($orderAmount as $key => $value) { ?>
         {meta:'Sales', value: <?php echo $value; ?>},
         <?php }  ?>
         ]
       }]
     };

     var chartistOptions2 = {
      height: 525,
      lineSmooth: false,
      fullWidth: true,
      showArea: true,
      low: 0,
      high: 50,
      axisY: {
        onlyInteger: true,
        offset: 25,
        labelInterpolationFnc: function(value) {
          return '₹' + value + 'K';
        }
      },
      plugins: [
      Chartist.plugins.tooltip({prefix: "₹", suffix: "000"})
      ]
    };

    var Chartist2 = new Chartist.Line('#chart2', chartistData2, chartistOptions2);


    $(window).on('resize', function() {
      Chartist1.update();
      Chartist2.update();
    });



    // Chart.js

    var radarData = {
      labels: [
      <?php foreach ($topProducts as $key => $value) {  
       echo '"'.$value['product_name'].'",';
     } ?>
     ],
     datasets: [
     {
      label: "My First dataset",
      fillColor: "rgba(151,187,205,0.2)",
      strokeColor: "rgba(151,187,205,1)",
      pointColor: "rgba(151,187,205,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(151,187,205,1)",
      data: [
      <?php foreach ($topProducts as $key => $value) {  
        echo $value['totalQty'].',';
      } ?>
      ]
    }
    ]
  };


  var radarDataLeast = {
    labels: [
    <?php foreach ($topProducts as $key => $value) {  
      echo '"'.$value['product_name'].'",';
    } ?>
    ],
    datasets: [
    {
      label: "My First dataset",
      fillColor: "rgba(151,187,205,0.2)",
      strokeColor: "rgba(151,187,205,1)",
      pointColor: "rgba(151,187,205,1)",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(151,187,205,1)",
      data: [
      <?php foreach ($topProducts as $key => $value) {  
        echo $value['totalQty'].',';
      } ?>
      ]
    }
    ]
  };

  var radarOptions = {
    showScale: true,
    scaleLineColor: "rgba(0,0,0,.05)",
    scaleLineWidth: 1,
    scaleShowLabels: false,
    scaleLabel: "<%=value%>",
    scaleFontFamily: "'Open Sans', 'Helvetica', 'Arial', sans-serif",
    scaleFontSize: 11,
    scaleFontStyle: "normal",
    scaleFontColor: "#666",
    responsive: false,
    maintainAspectRatio: true,
    showTooltips: true,
    customTooltips: false,
    tooltipFillColor: "rgba(0,0,0,0.8)",
    tooltipFontFamily: "'Open Sans', 'Helvetica', 'Arial', sans-serif",
    tooltipFontSize: 10,
    tooltipFontStyle: "normal",
    tooltipFontColor: "#fff",
    tooltipTitleFontFamily: "'Open Sans', 'Helvetica', 'Arial', sans-serif",
    tooltipTitleFontSize: 11,
    tooltipTitleFontStyle: "bold",
    tooltipTitleFontColor: "#fff",
    tooltipYPadding: 6,
    tooltipXPadding: 6,
    tooltipCaretSize: 8,
    tooltipCornerRadius: 2,
    tooltipXOffset: 10,
    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
    multiTooltipTemplate: "<%= value %>",
  }
  var ctx = document.getElementById("radarChart").getContext("2d");
  var myRadarChart = new Chart(ctx).Radar(radarData, radarOptions);

  var ctxl = document.getElementById("radarChartLeast").getContext("2d");
  var myRadarChartLeast = new Chart(ctxl).Radar(radarDataLeast, radarOptions);



 // data
 var datax = [
 <?php foreach ($topSeller as $key => $value) { ?>
  { label: "<?php echo $value['seller']; ?>",  data: <?php echo $value['sale']; ?>, color: Utility.getBrandColor('<?php echo $clr[$key]; ?>')},
  <?php } ?>

  ];


//    for( var i = 0; i<series; i++)
//    var series = Math.floor(Math.random()*10)+1;
// /   {
//        datax[i] = { label: "Series"+(i+1), data: Math.floor(Math.random()*100)+1 }
//    }

$.plot($("#graph0"), datax,
{
  series: {
    pie: {
      show: true
    }
  },
  grid: {
    hoverable: true
  },
  tooltip: true,
  tooltipOpts: {
    content: "%p.0%, %s"    
  }
                    //,
                    //colors: [Utility.getBrandColor('primary'), Utility.getBrandColor('warning'),Utility.getBrandColor('success')]
                  });
function pieHover(event, pos, obj)
{
  if (!obj)
    return;
  percent = parseFloat(obj.series.percent).toFixed(2);
  $("#hover").html('<span style="font-weight: bold; color: '+obj.series.color+'">'+obj.series.label+' ('+percent+'%)</span>');
}





});

});

</script>