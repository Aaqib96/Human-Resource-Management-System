<?php 
include 'includes/session.php';
include "includes/conn.php";
?>
<?php
  include '../timezone.php';
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<?php include 'includes/header.php'; ?>
<head>
<style>
  .small-box{
    border-radius: 20px;
  }
  .small-box-footer{
    border-bottom-left-radius:20px ;
    border-bottom-right-radius:20px ;
  }
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="border-top-left-radius:5px ;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                 $sql = "SELECT * FROM user_profile";
                // $sql = "call `StrProc_SelectUserProfileInfo`(0)";
               // $sql = "call 'StrProc_getUserProfileInfo'(UpId)";
                $query = $conn->query($sql);
                

                echo "<h3>".$query->num_rows."</h3>";
              ?>

              <p>Total Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="employee.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
              $sqla = "SELECT COUNT(*) AS OnTimeCount
              FROM (
                  SELECT
                      CASE
                          WHEN TIME(a.check_in) >= ADDTIME(TIME(s.time_in), '04:00:00') THEN 1
                          ELSE 0
                      END AS OnTimeFlag
                  FROM
                      attendance AS a
                  JOIN
                      user_profile AS up ON up.Employee_Id = a.Employee_Id
                  JOIN
                      shift AS s ON up.shift_id = s.RecId
                  WHERE
                      a.isactive = 1 AND s.isactive = 1 AND up.isactive = 1
                      AND DATE(a.check_in_date) = CURDATE() -- Filter for the current day's date
              ) AS OnTimeEntries;";
              $query = $conn->query($sqla);
              $row = $query->fetch_assoc();
                echo "<h3>".$row['OnTimeCount']."</h3>";
              ?>
              <p>On Time Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <?php
              $sqlb = "SELECT COUNT(*) AS LateCount
              FROM (
                  SELECT
                      CASE
                          WHEN TIME(a.check_in) > ADDTIME(TIME(s.time_in), TIME(s.grace_time)) AND TIME(a.check_in) < ADDTIME(TIME(s.time_in), '04:00:00') THEN 1
                          ELSE 0
                      END AS LateFlag
                  FROM
                      attendance AS a
                  JOIN
                      user_profile AS up ON up.Employee_Id = a.Employee_Id
                  JOIN
                      shift AS s ON up.shift_id = s.RecId
                  WHERE
                      a.isactive = 1 AND s.isactive = 1 AND up.isactive = 1
                      AND DATE(a.check_in_date) = CURDATE() -- Filter for the current day's date
                      AND TIME(a.check_in) > ADDTIME(TIME(s.time_in), TIME(s.grace_time)) -- Filter for 'Late' entries
                      AND TIME(a.check_in) < ADDTIME(TIME(s.time_in), '04:00:00') -- Filter for entries before 4:00 AM
              ) AS LateEntries;";
              $query = $conn->query($sqlb);
              $row = $query->fetch_assoc();
                echo "<h3>".$row['LateCount']."</h3>";
              ?>
              <p>Late Coming Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-clock"></i>
            </div>
            <a href="attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php
              $sqlc = "SELECT COUNT(*) AS AbsentCount
              FROM (
                  SELECT
                      CASE
                          WHEN TIME(a.check_in) >= ADDTIME(TIME(s.time_in), '04:00:00') THEN 1
                          ELSE 0
                      END AS AbsentFlag
                  FROM
                      attendance AS a
                  JOIN
                      user_profile AS up ON up.Employee_Id = a.Employee_Id
                  JOIN
                      shift AS s ON up.shift_id = s.RecId
                  WHERE
                      a.isactive = 1 AND s.isactive = 1 AND up.isactive = 1
                      AND DATE(a.check_in_date) = CURDATE() -- Filter for the current day's date
                      AND TIME(a.check_in) >= ADDTIME(TIME(s.time_in), '04:00:00') -- Filter for 'Absent' entries
              ) AS AbsentEntries;";
              $query = $conn->query($sqlc);
              $row = $query->fetch_assoc();
                echo "<h3>".$row['AbsentCount']."</h3>";
              ?>
              <p>Absent Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <a href="attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Attendance Report</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Select Year: </label>
                    <select class="form-control input-sm" id="select_year">
                    <?php
                        for($i=2015; $i<=2065; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <br>
                <div id="legend" class="text-center">
                </div>
                <canvas id="barChart" style="height:350px"></canvas>
              </div>
            </div>
          </div>
        </div>

       <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Pie Chart</h5>
                    </div>
                    <div class="card-body">
                        <div id="pie-chart-1" style="width:100%"></div>
                    </div>
                </div>
            </div>
       </div>


      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Chart Data -->
<?php
  $and = 'AND YEAR(date) = '.$year;
  $months = array();
  $ontime = array();
  $late = array();
  for( $m = 1; $m <= 12; $m++ ) {
   
  }

  $months = json_encode($months);
  $late = json_encode($late);
  $ontime = json_encode($ontime);

?>
<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Late',
        fillColor           : 'rgba(210, 214, 222, 1)',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : <?php echo $late; ?>
      },
      {
        label               : 'Ontime',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $ontime; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#00a65a'
  barChartData.datasets[1].strokeColor = '#00a65a'
  barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
<!-- ------------------ ----------------------------------------->




<!-- ------------------ ---pie charts---------------------------------->

<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script>
function generatePieChart(percentage, onTimeToday, lateToday) {
  // Set up the data for the pie chart
  var data = {
    labels: ['On Time Percentage','On Time Today', 'Late Today'],
    datasets: [{
      data: [percentage, onTimeToday, lateToday],
      backgroundColor: ['#00a65a','#ffba57', '#f56954'],
    }]
  };

  // Configure the chart options
  var options = {
    responsive: true,
    maintainAspectRatio: false,
  };

  // Get the canvas element
  var ctx = document.getElementById('pieChart').getContext('2d');

  // Create the pie chart
  var pieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
  });
}

// Assuming you have already retrieved the data from PHP variables
// and stored them in JavaScript variables

// Example usage:
var onTimePercentage = <?php echo $percentage; ?>;
var onTimeToday = <?php echo $query->num_rows; ?>;
var lateToday = <?php echo $querya->num_rows; ?>;

// Call the function with the data to generate the pie chart
generatePieChart(onTimePercentage, onTimeToday, lateToday);
</script>

<!-- ------------------------Line charts------------------------- -->



<script>
function generatelineChart(percentage, onTimeToday, lateToday) {
  // Set up the data for the pie chart
  var data = {
    labels: ['On Time Percentage','On Time Today', 'Late Today'],
    datasets: [{
      label:'Today Table',
      data: [percentage, onTimeToday, lateToday],
      backgroundColor: ['#00a65a','#ffba57', '#f56954'],
    }]
  };

  // Configure the chart options
  var options = {
    responsive: true,
    maintainAspectRatio: false,
  };

  // Get the canvas element
  var ctx = document.getElementById('lineChart').getContext('2d');

  // Create the pie chart
  var pieChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
  });
}

// Assuming you have already retrieved the data from PHP variables
// and stored them in JavaScript variables

// Example usage:
var onTimePercentage = <?php echo $percentage; ?>;
var onTimeToday = <?php echo $query->num_rows; ?>;
var lateToday = <?php echo $querya->num_rows; ?>;

// Call the function with the data to generate the line chart
generatelineChart(onTimePercentage, onTimeToday, lateToday);
</script>


<!-- ------------------------------bar charts-------------------------- -->



<script>
function generatebarChart(percentage, onTimeToday, lateToday) {
  // Set up the data for the pie chart
  var data = {
    labels: ['On Time Percentage','On Time Today', 'Late Today'],
    datasets: [{
      label:'Today Table',
      data: [percentage, onTimeToday, lateToday],
      backgroundColor: ['#00a65a','#ffba57', '#f56954'],
    }]
  };


  // Configure the chart options
  var options = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 25,
            },
          },
        },
  };

  // Get the canvas element
  var ctx = document.getElementById('barChart').getContext('2d');

  // Create the pie chart
  var pieChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
  });
}

// Assuming you have already retrieved the data from PHP variables
// and stored them in JavaScript variables

// Example usage:
var onTimePercentage = <?php echo $percentage; ?>;
var onTimeToday = <?php echo $query->num_rows; ?>;
var lateToday = <?php echo $querya->num_rows; ?>;

// Call the function with the data to generate the bar chart
generatebarChart(onTimePercentage, onTimeToday, lateToday);
</script>

<!-- ----------------------------------------------------------------------- -->

<script>
          $(function() {
            var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                colors: ["#0e9e4a", "#ffba57", "#ff5252"],
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [{
                    name: 'Present Percentage',
                    data: [44, 55, 57, 56, 61, 58, 63, 54, 76, 34, 78, 23]
                }, {
                    name: 'Today On Time',
                    data: [76, 85, 10, 98, 87, 15, 91, 45, 76, 90, 34, 76]
                }, {
                    name: 'Today Late',
                    data: [35, 41, 36, 26, 45, 48, 52, 65, 85, 98, 45, 65]
                }],
                xaxis: {
                    categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug','Sep','Oct','Nov','Dec'],
                },
                yaxis: {
                    title: {
                        text: 'Employess'
                    }
                },
                fill: {
                    opacity: 1

                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return "$ " + val + " thousands"
                        }
                    }
                }
            }
            var chart = new ApexCharts(
                document.querySelector("#bar-chart-1"),
                options
            );
            chart.render();
        });
</script>

<!-- -------------------------------testing----------------------------------------- -->

<script>
              $(function() {
            var options = {
                chart: {
                    height: 320,
                    type: 'pie',
                },
                labels: ['On Time Percentage','On Time Today', 'Late Today'],
                series: [44, 55, 13],
                colors: [ "#0e9e4a", "#ffba57", "#ff5252"],
                legend: {
                    show: true,
                    position: 'bottom',
                },
                dataLabels: {
                    enabled: true,
                    dropShadow: {
                        enabled: false,
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            }
            var chart = new ApexCharts(
                document.querySelector("#pie-chart-1"),
                options
            );
            chart.render();
        });


</script>
<!-- ---------------------------------/testing------------------------------------------ -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/apexcharts.min.js"></script>
<!-- <script src="assets/js/pages/chart-apex.js"></script> -->

</body>
</html>
