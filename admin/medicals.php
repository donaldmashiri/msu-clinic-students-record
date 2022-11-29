<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->

        <div class="row">
            <div class="col-xl-10 col-lg-8">
            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Medical History</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope='col'>stud#: </th>
                                            <th scope='col'>Reg Number: </th>
                                            <th scope='col'>Full Names: </th>
                                            <th scope='col'>Gender: </th>
                                            <th scope='col'>Address: </th>
                                            <th scope='col'></th>
                                        </tr>
                                        </thead>
                                        <tbody>

<?php
$sql = "SELECT * FROM students ORDER BY stud_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $stud_id = $row["stud_id"];
        $reg_number = $row["reg_number"];
        $full_names = $row["full_names"];
        $email = $row["email"];
        $gender = $row["gender"];
        $address = $row["address"];
        $date = $row["date"];
        $status = $row["status"];
     ?>

        <tr>
            <td>MSU00<?php echo $stud_id ?></td>
            <td><?php echo $reg_number ?></td>
            <td><?php echo $full_names ?></td>
            <td><?php echo $gender ?></td>
            <td><?php echo $address ?></td>
            <td>
                <?php
                if($status === "not registered" OR $status === "rejected" ){
                    echo "<p class='alert alert-danger'>Student Not Registered</p>";
                }else{
                    echo "<a href='look.php?look=$stud_id' class='btn btn-info'>view</a>";
                }
                ?>
            </td>
        </tr>

            <?php
    }
} else {
    echo "0 results";
}
?>

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