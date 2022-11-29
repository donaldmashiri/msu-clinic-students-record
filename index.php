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
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Log In As Student</h1>
                                    </div>

                                    <?php
                                    if(isset($_POST['student_login'])){
                                        $email = $conn -> real_escape_string($_POST['email']);
                                        $password = $conn -> real_escape_string($_POST['password']);

                                        $query = "select * from students where email = '$email' and password = '$password'";
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                        $count = mysqli_num_rows($result);

                                        if ($count == 1) {
                                            $_SESSION['stud_id'] = $row['stud_id'];
                                            header('location: student/index.php');
                                        } else {
                                            echo "<p style='background-color: red' class='alert text-white alert-danger'>Incorrect Password</p>";
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
                                            <input type="password" name="password" class="form-control form-control-user"
                                                   id="MsuPassword" placeholder="Password" required>
                                        </div>
                                        <button type="submit" name="student_login" class="btn btn-primary float-right btn-user">
                                            Login
                                        </button>
                                    </form>
                                   <div class="row">
                                        <div class="text-center mt-1">
                                            <a class="" href="account.php">Create Account</a>
                                        </div>
                                   </div>
                                    <hr>
                                    <a class="float-right" href="forgot.php">forgot password?</a>
                                    
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