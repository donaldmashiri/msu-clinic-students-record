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
                                    <h6 class="m-0 font-weight-bold text-primary">Profile Details For Students</h6>
                                   
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <thead>
                                        <?php

                                                echo "<tr><th scope='col'>Student Reg Number: </th> <td>$reg_number</td></tr>";
                                                echo "<tr><th scope='col'>Full Names: </th> <td>$full_names</td></tr>";
                                                echo "<tr><th scope='col'>Email: </th> <td>$email</td></tr></tr>";
                                                echo "<tr><th scope='col'>Gender: </th> <td>$gender</td></tr>";
                                                echo "<tr><th scope='col'>Address: </th> <td>$address</td></tr>";
                                                if($status === 'not registered'){
                                                    echo "<tr><th scope='col'>Status: </th> <td class='font-weight-bold alert alert-danger'>$status</td></tr>";
                                                }elseif($status === 'registered'){
                                                    echo "<tr><th scope='col'>Status: </th> <td class='font-weight-bold alert alert-success'>$status</td></tr>";
                                                }
                                                else{
                                                    echo "<tr><th scope='col'>Status: </th> <td class='font-weight-bold alert alert-warning'>$status</td></tr>";
                                                } 
                                        ?>
                                        <tr>
                                            <th></th>
                                            <td>

                                            </td>
                                        </tr>
                                        </thead>
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