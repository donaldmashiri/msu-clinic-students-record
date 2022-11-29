<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->

        <div class="row">
    

            <!-- Area Chart -->
            <div class="col-xl-7 col-lg-9">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Search Student For Treatments </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="Search Student Reg Number">
                            </div>
                            <button name="submit" class="btn btn-primary float-right mb-5">Search <i class="fa fa-search"></i></button>
                        </form>

                        <hr>
                        <br>

                        <?php
						
			
						
						
if(isset($_POST['submit'])) {

    $search = strtoupper($_POST['search']);

    $query = "SELECT * FROM students WHERE reg_number = '$search'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
        $stud_id = $row["stud_id"];
        $reg_number = $row["reg_number"];
        $full_names = $row["full_names"];
        $status = $row["status"];
        $email = $row["email"];

        echo "<ul class='list-group '>
                  <li class='list-group-item bg-success text-white'>Student is found</li> 
                  <li class='list-group-item'>Student Number :</span>  $reg_number </li> 
                  <li class='list-group-item'>Name(s) :</span>  $full_names </li> 
                  ";


        if ($status === "not registered" or $status === "rejected") {
            echo "<p class='alert alert-danger'>Student Not Registered</p>";
        } else {
            echo " <li class='list-group-item'>
<a href='look.php?look=$stud_id' class='btn btn-info'>view</a></li> ";
        }
        echo "</ul>";


    } else {
        echo "<ul class='list-group '>
                  <li class='list-group-item bg-danger text-white'>Student with $reg_number is  not found</li> 
               </ul>";
    }
}
                        ?>


                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>