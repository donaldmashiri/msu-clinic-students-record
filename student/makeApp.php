<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add New Appointment</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <?php

                        if(isset($_POST['submit'])){

                            $title = $conn -> real_escape_string($_POST['title']);
                            $description = $conn -> real_escape_string($_POST['description']);
                            $date = $conn -> real_escape_string($_POST['date']);
                            $now = date("Y-m-d");


                            if($date < $now) {
                                echo "<h6 class='alert alert-success'>Date is in the past</h6>";
                            }else{
                                $sql = "INSERT INTO appointments (stud_id, title, description, date)
                            VALUES ({$_SESSION['stud_id']},'{$title}','{$description}','{$date}')";

                                if ($conn->query($sql) === TRUE) {

                                    echo "<h4 class='alert alert-success'>Your Appointment Requested Was successfully</h4>";

                                }else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }


                        }
                        ?>


                        <form action="" method="post">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Purpose" minlength="4" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description of Your Request</label>
                                <textarea class="form-control" name="description" minlength="4" required rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="title">Date</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>