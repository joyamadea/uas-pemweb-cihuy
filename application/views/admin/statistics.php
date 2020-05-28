<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php echo $style; ?>

</head>
<body id="page-top">
    
    <div id="wrapper"/>
        <?php echo $sidebar; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php echo $topbar; ?>

                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Statistics</h1>
                    </div>

                   
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Daily Earnings</h6>
                            
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myChart"></canvas>
                            </div>
                            </div>
                        </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Payment Methods</h6>
                            
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i> Cash
                                </span>
                                <span class="mr-2">
                                <i class="fas fa-circle text-success"></i> Debit
                                </span>
                                <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> Credit
                                </span>
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
    

    <!-- <div class="container">
        <canvas id="myChart"></canvas>
    </div> -->
    


    <?php echo $script; ?>

    <script type="text/javascript">
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
            <?php
                foreach ($trans as $f) {
                    echo "'" .date("d/m/y",strtotime($f->orderDate))."',";
                }   
            ?>
            ],
            datasets: [{
                label: 'Total',
                backgroundColor: '#ADD8E6',
                borderColor: '##93C3D2',
                data: [
                <?php
                    foreach ($trans as $f) {
                        echo $f->total . ", ";
                    }
                ?>
                ]
            }]
        },
        options: {
            maintainAspectRatio: false,
            elements: {
                line: {
                    tension: 0.2
                }
            },
            legend: {
                display: false
            }
        }
    });
    
    </script>

<script type="text/javascript">
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels:[<?php foreach($payment as $p){
              echo '"'.$p->payment.'",';

            }?>],
            datasets: [{
              data: [<?php foreach($payment as $p){
                echo $p->counted.",";
              }?>],
              backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
              hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
              hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
            },
            legend: {
              display: false
            },
            cutoutPercentage: 80,
          },
        });
    </script>
</body>
</html>