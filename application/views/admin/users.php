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
                        <h1 class="h3 mb-0 text-gray-800">Users Table</h1>
                        <a href="<?php echo site_url('admin/add/food_category'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add Category</a>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Records</h6>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Display Name</th>
                                    <th>Birth Date</th>
                                    <th>Profile Picture</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>Email</th>
                                    <th>Display Name</th>
                                    <th>Birth Date</th>
                                    <th>Profile Picture</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach($output as $o){
                                    echo "<tr>";
                                    echo "<td>".$o->email."</td>";
                                    echo "<td>".$o->displayName."</td>";
                                    echo "<td>".date("d M Y", strtotime($o->birthDate))."</td>";
                                    echo "<td><img style='height:100px;' src='".site_url('assets/uploads/profile/').$o->profileLink."'</td>";
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
    
    <?php echo $script; ?>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        })
    </script>
</body>
</html>