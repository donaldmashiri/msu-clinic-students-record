<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php');
$accept = $_GET['accept'];
$reject = $_GET['reject'];

if (isset($_GET['accept'])) {

    $acc = $_GET['accept'];
    $status = "registered";

    $query = "UPDATE students SET ";
    $query .= "status  = '{$status}' ";
    $query .= "WHERE stud_id = $acc ";

    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
}

if (isset($_GET['reject'])) {

    $rej = $_GET['reject'];
    $status = "rejected";

    $query = "UPDATE students SET ";
    $query .= "status  = '{$status}' ";
    $query .= "WHERE stud_id = $rej ";

    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
}

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-10 col-lg-9">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">All Students</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope='col'>stud#: </th>
                                            <th scope='col'>Reg Number: </th>
                                            <th scope='col'>Full Names: </th>
                                            <th scope='col'>Email: </th>
                                            <th scope='col'>Gender: </th>
                                            <th scope='col'>Address: </th>
                                            <th scope='col'>Status</th>
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
            <td><?php echo $email ?></td>
            <td><?php echo $gender ?></td>
            <td><?php echo $address ?></td>
            <td><?php
                if($status === 'not registered'){
                    echo "<p class='text-warning'>$status</p>";
                }elseif ($status === 'rejected'){
                    echo "<p class='text-danger'>$status</p>";
                }else{
                    echo "<p class='text-success'>$status</p>";
                }
                ?></td>
            <td>
                <a href="home.php?accept=<?php echo $stud_id ?>" class="btn btn-success btn-sm">Accept Registration</a>
                <a href="home.php?reject=<?php echo $stud_id ?>" class="btn btn-danger btn-sm">Reject Registration</a>
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