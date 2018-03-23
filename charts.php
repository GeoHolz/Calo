<?php include "config.php" ?>
<?php include "header.php" ?>
<?php include "menu.php" ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Charts</li>
      </ol>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Area Chart Example</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
            <div class="card-body">
              <canvas id="myBarChart" width="100" height="50"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Pie Chart Example</div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<!-- Page level plugin JavaScript-->
<script src="vendor/chart.js/Chart.min.js"></script>
<script type="text/javascript">
Chart.defaults.global.defaultFontFamily='-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif',
Chart.defaults.global.defaultFontColor="#292b2c";
var ctx=document.getElementById("myAreaChart"),
myLineChart=new Chart(ctx, {
    type:"line", data: {
        labels:["Mar 1", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7", "Mar 8", "Mar 9", "Mar 10", "Mar 11", "Mar 12", "Mar 13", "Mar 14"], datasets:[ {
            label: "Sessions", lineTension: .3, backgroundColor: "rgba(2,117,216,0.2)", borderColor: "rgba(2,117,216,1)", pointRadius: 5, pointBackgroundColor: "rgba(2,117,216,1)", pointBorderColor: "rgba(255,255,255,0.8)", pointHoverRadius: 5, pointHoverBackgroundColor: "rgba(2,117,216,1)", pointHitRadius: 20, pointBorderWidth: 2, data: [1e4, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451, 26000]
        }
        ]
    }
    , options: {
        scales: {
            xAxes:[ {
                time: {
                    unit: "date"
                }
                , gridLines: {
                    display: !1
                }
                , ticks: {
                    maxTicksLimit: 7
                }
            }
            ], yAxes:[ {
                ticks: {
                    min: 0, max: 4e4, maxTicksLimit: 5
                }
                , gridLines: {
                    color: "rgba(0, 0, 0, .125)"
                }
            }
            ]
        }
        , legend: {
            display: !1
        }
    }
}

),
ctx=document.getElementById("myBarChart"),
myLineChart=new Chart(ctx, {
    type:"bar", data: {
        labels:["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"], datasets:[ {
            label: "heures", backgroundColor: "rgba(2,117,216,1)", borderColor: "rgba(2,117,216,1)", data: [7, 8, 7, 8, 7, 0]
        }
        ]
    }
    , options: {
        scales: {
            xAxes:[ {
                time: {
                    unit: "day"
                }
                , gridLines: {
                    display: !1
                }
                , ticks: {
                    maxTicksLimit: 6
                }
            }
            ], yAxes:[ {
                ticks: {
                    min: 0, max: 12, maxTicksLimit: 5
                }
                , gridLines: {
                    display: !0
                }
            }
            ]
        }
        , legend: {
            display: !1
        }
    }
}

),
ctx=document.getElementById("myPieChart"),
myPieChart=new Chart(ctx, {
    type:"pie", data: {
        labels:["Blue", "Red", "Yellow", "Green"], datasets:[ {
            data: [12.21, 15.58, 11.25, 8.32], backgroundColor: ["#007bff", "#dc3545", "#ffc107", "#28a745"]
        }
        ]
    }
}

);
</script>
<?php include "footer.php" ?>