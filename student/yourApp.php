<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-10 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Your Appointments</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                            <tr>
                                <th scope="col">ref no:</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
<?php

$sql = "SELECT * FROM appointments WHERE stud_id = '{$_SESSION['stud_id']}' ORDER BY app_id DESC ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $app_id = $row["app_id"];
        $title = $row["title"];
        $description = $row["description"];
        $date = $row["date"];
        $status = $row["app_status"];
   
        ?>
                            <tr>
                                <th scope="row">MSUAPM00<?php echo $app_id ?></th>
                                <td><?php echo $title ?></td>
                                <td><?php echo $description ?></td>
                                <td><?php echo $date ?></td>
                                <td class="text font-weight-bold"><?php
                                    if($status === 'pending'){
                                        echo "<p class='text-warning'>$status</p>";
                                    }elseif ($status === 'rejected'){
                                        echo "<p class='text-danger'>$status</p>";
                                    }else{
                                        echo "<p class='text-success'>$status</p>";
                                    }
                                    ?></td>

                            </tr>
                           <?php  }
} ?>
                            </tbody>
                        </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>