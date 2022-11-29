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
                <div class="card-body p-0">
                    <div class="text-center">
                        <h3 style="color: black" class="font-weight-bolder text-center mt-1">
                        MSU CLINIC MANAGEMENT SYSTEM</h3>
                        <img src="img/msu.jpg" class="rounded" width="300" height="150"  alt="">
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-none d-lg-block">
                            <div class="p-3">
                                <div class="text-center">
                                    <p> Have an Account <a href="index.php">login</a></p>
                                    <h1 class="h4 text-gray-900">Create Account</h1>
                                </div>

                                <script>
                                    // Email validation
                                    let em = document.forms['Login']['email'].value;
                                    let atpos = em.indexOf("@");
                                    let domain = em.split("@")[1]; // Saves user input after the @ (at)

                                    if (em == null || em == "") {
                                        alert("Email can not be empty.");
                                        document.getElementById('e').focus();
                                        return false;
                                    }
                                    // First test checks for atleast one character before @
                                    else if (atpos < 1 || domain != "gmail.com"){ // Second test checks if the user entered a gmail.com domain after @
                                        alert("Not a valid e-mail address. Please write your gmail address like this: username@gmail.com.");
                                        document.getElementById('e').focus();
                                        return false;
                                    }
                                </script>

                                <?php

                                if(isset($_POST['student_register'])){
                                    $reg_number = $conn -> real_escape_string($_POST['reg_number']);
                                    $full_names = $conn -> real_escape_string($_POST['full_names']);
                                    $gender = $conn -> real_escape_string($_POST['gender']);
                                    $email = $conn -> real_escape_string($_POST['email']);
                                    $address = $conn -> real_escape_string($_POST['address']);
                                    $password = $conn -> real_escape_string($_POST['password']);
                                    $con_password = $conn -> real_escape_string($_POST['con_password']);

                                $sql = "SELECT * FROM students WHERE email = '$email' OR reg_number = '$reg_number'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo "<h4 style='background-color: lightcoral' class='alert alert-dark text-white         text-center'>The email/reg number  already exists</h4>";
                                }else{
                                    if($password === $con_password){
                                        $sql = "INSERT INTO students (reg_number, full_names, email, gender, address, password)
                            VALUES ('{$reg_number}','{$full_names}','{$email}', '{$gender}', '{$address}','{$password}')";

                                        if ($conn->query($sql) === TRUE) {
                                            echo "<h4 style='background-color: green' class='alert text-white alert-success'>Your Account Was successfully created</h4>";
                                        }else {
                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                        }
                                    }else{
                                        echo "<h4 style='background-color: red' class='alert alert-dark text-white text-center'>Password did not match</h4>";
                                    }
                                }
                                }
                                ?>

                                <form class="user" method="post">
                                    <div class="form-group">
                                        <input pattern="(?=(?:[^a-zA-Z]*[a-zA-Z]){2})(?=(?:\D*\d){5}).*" title="Min. 5 digits and min. 2 letters are required" type="text" name="reg_number" class="form-control form-control-user"
                                               id="MsuEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Reg Number" minlength="4" maxlength="9" required>
                                        <small>eg: R219826H</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" pattern="^[a-zA-Z0-9]+@students.msu.ac\.[a-zA-z]+$" title="Email should contain @students.msu.zw" name="full_names" class="form-control form-control-user"
                                               id="MsuEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Full Names" minlength="4" maxlength="25" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                               id="MsuEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Email Address..." minlength="4" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="gender" class="form-control" id="">
                                            <option value="not selected">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="address" id="" cols="5" rows="3" class="form-control form-control-user"
                                                  placeholder="Address" minlength="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                               id="MsuPassword" placeholder="Password" minlength="4" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="con_password" class="form-control form-control-user"
                                               id="MsuPassword" placeholder="Confirm Password" minlength="4" required>
                                    </div>
                                    <button type="submit" name="student_register" class="btn btn-primary btn-user btn-block">
                                        Submit
                                    </button>
                                </form>
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