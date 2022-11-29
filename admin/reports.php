<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Reports</h6>
                    </div>
                    <!-- Card Body -->
                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    All Students </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $sql = "SELECT COUNT(*) AS total from students";
                                                    $result = $conn->query($sql);
                                                    $data =  $result->fetch_assoc();
                                                    echo $data['total'];
                                                    ?> students
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    All Appointments </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $sql = "SELECT COUNT(*) AS total from appointments";
                                                    $result = $conn->query($sql);
                                                    $data =  $result->fetch_assoc();
                                                    echo $data['total'];
                                                    ?> Medical Appointments
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-pen fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Approved Appointments </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $sql = "SELECT COUNT(*) AS total from appointments WHERE app_status = 'approved'";
                                                    $result = $conn->query($sql);
                                                    $data =  $result->fetch_assoc();
                                                    echo $data['total'];
                                                    ?> Approved Appointments
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-pen fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Declined Appointments </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    $sql = "SELECT COUNT(*) AS total from appointments WHERE app_status = 'declined'";
                                                    $result = $conn->query($sql);
                                                    $data =  $result->fetch_assoc();
                                                    echo $data['total'];
                                                    ?> Declined Appointments
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-pen fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

            <div class="col-xl-10 col-md-10 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Headache</th>
                                    <th scope="col">Flue</th>
                                    <th scope="col">Tonsils</th>
                                    <th scope="col">Stomach Pains</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>
                                        <?php $query = "SELECT count(*) FROM treatments WHERE conditions = 'headache'";
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($result);
                                        echo $headache = $row[0];
                                        if($headache > 2){
                                            echo "<p class='text-danger'>There is An outbreak for Headaches</p>";
                                        }elseif($headache >= 3){
                                            echo "<p class='text-dark'>More Pills for Headache are Needed</p>";
                                        }else{
                                            echo "<p class='text-info'>Pills still in stock</p>";
                                        }
                                        ?>
                                    </th>
                                    <th>
                                        <?php $query = "SELECT count(*) FROM treatments WHERE conditions = 'tonsils'";
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($result);
                                        echo $tonsils = $row[0];
                                        if($tonsils > 5){
                                            echo "<p class='text-danger'>There is An outbreak for tonsils</p>";
                                        }elseif($tonsils >= 3){
                                            echo "<p class='text-dark'>More Pills for tonsils are Needed</p>";
                                        }else{
                                            echo "<p class='text-info'>Pills still in stock</p>";
                                        }
                                        ?>

                                    </th>
                                    <th>
                                        <?php $query = "SELECT count(*) FROM treatments WHERE conditions = 'flue'";
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($result);
                                        echo $flue = $row[0];
                                        if($flue > 5){
                                            echo "<p class='text-danger'>There is An outbreak for flue</p>";
                                        }elseif($flue >= 3){
                                            echo "<p class='text-dark'>More Pills for flue are Needed</p>";
                                        }else{
                                            echo "<p class='text-info'>Pills still in stock</p>";
                                        }
                                        ?>
                                    </th>
                                    <th>
                                        <?php $query = "SELECT count(*) FROM treatments WHERE conditions = 'stomach pains'";
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($result);
                                        echo $stomach = $row[0];
                                        if($stomach > 5){
                                            echo "<p class='text-danger'>There is An outbreak for stomach pains</p>";
                                        }elseif($stomach >= 3){
                                            echo "<p class='text-dark'>More Pills for stomach pains are Needed</p>";
                                        }else{
                                            echo "<p class='text-info'>Pills still in stock</p>";
                                        }
                                        ?>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
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
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>