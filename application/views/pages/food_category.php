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
                        <h1 class="h3 mb-0 text-gray-800">Food Table</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Total Earnings</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="categoryTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Food</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Food</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach($output as $o){
                                    echo "<tr>";
                                    echo "<td>".$o->categoryID."</td>";
                                    echo "<td>".$o->categoryName."</td>";
                                    echo "<td>";
                                        echo "<a href='#' class='btn btn-warning btn-circle mr-3'>";
                                        echo "<i class='fas fa-pencil-alt'></i>";
                                        echo "</a>";

                                        echo "<a href='#' class='btn btn-danger btn-circle'>";
                                        echo "<i class='fas fa-trash'></i>";
                                        echo "</a>";
                                    echo "</td>";
                                }?>
                                
                            </tbody>
                            </table>
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
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable();
        })
    </script>
</body>
</html>