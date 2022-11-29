<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

<?php
$look = $_GET['look'];

$sql = "SELECT * FROM students WHERE stud_id ='$look'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $stud_id = $row["stud_id"];
        $full_names = $row["full_names"];
        $gender = $row["gender"];
        $reg_number = $row["reg_number"];
        $email = $row["email"];
        $status = $row["status"];
        $address = $row["address"];
       
    }}

?>


    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-9">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Student Medical History</h6>
                       <a class="btn btn-warning text-white btn-sm justify-content-end" data-toggle="modal" data-target="#staticBackdrop">Add New</a>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <div class="row">
                    
                <div class="col-md-4 mt-2">
                    <div class="card">
                        <div class="card-header font-weight-bold">Student Details</div>
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
                                            echo "<tr><th scope='col'>Registration Status: </th> <td class='font-weight-bold alert alert-danger'>$status</td></tr>";
                                        }elseif($status === 'registered'){
                                            echo "<tr><th scope='col'>Registration Status: </th> <td class='font-weight-bold alert alert-success'>$status</td></tr>";
                                        }
                                        else{
                                            echo "<tr><th scope='col'>Status: </th> <td class='font-weight-bold alert alert-warning'>$status</td></tr>";
                                        } 
                                ?>
                                
                                </thead>
                            </table>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                    <?php 
                    if(isset($_POST['submit'])){

                        $conditions = $conn -> real_escape_string($_POST['conditions']);
                        $prescription = $conn -> real_escape_string($_POST['prescription']);

                        $sql = "INSERT INTO treatments (stud_id, conditions, prescription, date)
                        VALUES ({$stud_id},'{$conditions}','{$prescription}', now())";

                        if ($conn->query($sql) === TRUE) {
                            echo "<h4 class='alert alert-success'>Medical Record was successfully added</h4>";
                        }else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                        
                    ?>
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">MDL#</th>
                                <th scope="col">Condition</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM treatments JOIN students ON students.stud_id = treatments.stud_id WHERE treatments.stud_id = '$stud_id'";
                                $result = $conn->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $treat_id = $row["treat_id"];
                                        $conditions = $row["conditions"];
                                        $prescription = $row["prescription"];
                                        $date = $row["date"];
                                ?>
                                <tr>
                                    <th scope="row">MDL00<?php echo $treat_id ?></th>
                                    <td><?php echo $conditions ?></td>
                                    <td><?php echo $prescription ?></td>
                                    <td><?php echo $date ?></td>
                                </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                    </div>
                    
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Record Treatment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class="user" method="post">
                <div class="form-group">
                    <select class="form-control" name="conditions" id="">
                        <option value="headache">Headache</option>
                        <option value="flue">Flue</option>
                        <option value="tonsils">Tonsils</option>
                        <option value="stomach pains">Stomach Pain</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="prescription" id="" class="form-control form-control-user" placeholder="Enter prescription" cols="5" rows="3"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                    Submit
                </button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Submit</button> -->
      </div>
    </div>
  </div>
</div>



    <!-- End of Main Content -->
<?php include_once ('../includes/footer.php'); ?>