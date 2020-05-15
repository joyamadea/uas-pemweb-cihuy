<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php echo $style; ?>

</head>
<body>
    <?php echo $navbar; ?>

    <div class="container">
    <canvas id="myChart"></canvas>
        
    </div>
    


    <?php echo $script; ?>

    <script type="text/javascript">
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
            <?php
                foreach ($trans as $f) {
                    echo "'" .$f->orderDate ."',";
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
            elements: {
                line: {
                    tension: 0
                }
            }
        }
    });
    
    </script>
</body>
</html>