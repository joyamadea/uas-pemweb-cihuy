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
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div cass="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Daily Earning</h6>
                                </div>
                                <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myChart"></canvas>
                                </div>
                                <hr>
                                Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
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
</body>
</html>