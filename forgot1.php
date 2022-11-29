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
                                <div class="bg-success card-header text-white text-center font-weight-bolder">Enter New Password</div>
                                <div class="card-body">
                                    <div class="">
                                        <?php
                                        if(isset($_POST['student_login'])){
                                            $password = $conn -> real_escape_string($_POST['password']);
                                            $con_password = $conn -> real_escape_string($_POST['con_password']);

                                            if($password === $con_password){
                                                $sql = "UPDATE students SET ";
                                                $sql .= "password  = '{$password}' ";
                                                $sql .= "WHERE email = '{$_SESSION['email']}' ";

                                                if ($conn->query($sql) === TRUE) {
                                                    echo "<h4 style='background-color: green' class='alert text-white alert-success'>Password successfully reseted</h4>";
                                                }else {
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                }
                                            }else{
                                                echo "<h4 style='background-color: red' class='alert alert-dark text-white text-center'>Password did not match</h4>";
                                            }



                                        }

                                        ?>

                                        <form class="user" method="post">
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user"
                                                       id="MsuPassword" placeholder="Enter New Password" minlength="4" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="con_password" class="form-control form-control-user"
                                                       id="MsuPassword" placeholder="Confirm Password" minlength="4" required>
                                            </div>
                                            <button type="submit" name="student_login" class="btn btn-info btn-user">
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