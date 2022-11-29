<?php include ("includes/db.php")?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MSU CLINIC MANAGEMENT SYSTEM</title>
    <link rel="icon" type="image/x-icon" href="img/msu.jpg">

    <!-- Custom fonts for this template-->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: lightblue" class="">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <h3 style="color: black" class="font-weight-bolder text-center mt-1">
                    MSU CLINIC MANAGEMENT SYSTEM</h3>
                <div class="card-body p-0">
                    <div class="text-center">
                        <img src="img/msu.jpg" class="rounded" width="300" height="150"  alt="">
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-none d-lg-block">
                            <div class="card">
                                <div class="bg-secondary card-header text-white text-center font-weight-bolder">Forgot Password</div>
                                <div class="card-body">
                                    <div class="">
                                        <?php
                                        if(isset($_POST['student_forgot'])){
                                            $email = $conn -> real_escape_string($_POST['email']);
                                            $reg_number = $conn -> real_escape_string($_POST['reg_number']);
                                            $gender = $conn -> real_escape_string($_POST['gender']);

                                            $query = "select * from students where email = '$email' and reg_number = '$reg_number' and gender = '$gender'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                            $count = mysqli_num_rows($result);

                                            if ($count == 1) {
                                                $_SESSION['email'] = $row['email'];
                                                header('location: forgot1.php');
                                            } else {
                                                echo "<p style='background-color: red' class='alert text-white alert-danger'>Student with that information Not Found</p>";
                                            }
                                        }
                                        ?>

                                        <form class="user" method="post">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control form-control-user"
                                                       id="MsuEmail" aria-describedby="emailHelp"
                                                       placeholder="Enter Email Your Address..." required>
                                            </div>
                                            <div class="form-group">
                                                <input pattern="(?=(?:[^a-zA-Z]*[a-zA-Z]){2})(?=(?:\D*\d){5}).*" title="Min. 5 digits and min. 2 letters are required" type="text" name="reg_number" class="form-control form-control-user"
                                                       id="MsuEmail" aria-describedby="emailHelp"
                                                       placeholder="Enter Reg Number" minlength="4" maxlength="9" required>
                                                <small>eg: R219826H</small>
                                            </div>
                                            <div class="form-group">
                                                <select name="gender" class="form-control" id="">
                                                    <option value="not selected">Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                            <button type="submit" name="student_forgot" class="btn btn-info btn-user">
                                                Submit
                                            </button>
                                        </form>
                                        <a class="float-right" href="index.php">Login</a>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>