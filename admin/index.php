<?php include_once ('../includes/header.php'); ?>

    <div class="container bg-primary">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <h3 style="color: black" class="font-weight-bolder text-center mt-1">
                    MSU CLINIC MANAGEMENT SYSTEM</h3>
                    <div class="card-body p-0">
                        <div class="text-center">
                            <img src="../img/msu.jpg" class="rounded" width="300" height="150"  alt="">
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-none d-lg-block">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Administration</h1>
                                    </div>

                                    <?php
                                    if(isset($_POST['admin_login'])){
                                        $password = $conn -> real_escape_string($_POST['password']);

                                        if ($password === "12345") {
                                            header('location: home.php');
                                        } else {
                                            echo "<p class='alert alert-danger'>Incorrect credentials</p>";
                                        }
                                    }
                                    ?>

                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                   id="MsuPassword" placeholder="PASSCODE" required>
                                        </div>
                                        <button type="submit" name="admin_login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<?php include_once ('../includes/footer.php'); ?>