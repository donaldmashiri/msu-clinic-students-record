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
                        <h6 class="m-0 font-weight-bold text-primary">Your Medical History</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                    <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">MDL#</th>
                                <th scope="col">Condition</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM treatments JOIN students ON students.stud_id = treatments.stud_id WHERE treatments.stud_id = '{$_SESSION['stud_id']}'";
                                $result = $conn->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $treat_id = $row["treat_id"];
                                        $conditions = $row["conditions"];
                                        $prescription = $row["prescription"];
                                        $date = $row["date"];
                                ?>
                                <tr>
                                    <th scope="row">MDL00<?php echo $treat_id ?></th>
                                    <td><?php echo $conditions ?></td>
                                    <td><?php echo $prescription ?></td>
                                    <td><?php echo $date ?></td>
                                </tr>
                                <?php }}else{
                                    echo "<p class=''>You have No Medical History</p>";
                                } ?>
                            </tbody>
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