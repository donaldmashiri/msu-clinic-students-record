<li class="nav-item ">
    <a class="nav-link collapsed " href="index.php"><i class="fas fa-fw fa-user"></i>Profile   </a>
</li>
<li class="nav-item ">
    <a class="nav-link collapsed " href="makeApp.php"><i class="fas fa-fw fa-address-book"></i>Make Appointment </a>
</li>
<li class="nav-item ">
    <a class="nav-link collapsed " href="yourApp.php"><i class="fas fa-fw fa-book"></i>View Your Appointment </a>
</li>
<li class="nav-item ">
    <a class="nav-link collapsed " href="medi_history.php"><i class="fas fa-fw fa-hospital"></i>Medical History </a>
</li>

<li class="nav-item ">
    <a class="nav-link collapsed " href="../index.php?logout='logout'"><i class="fas fa-fw fa-reply"></i>Logout </a>
</li>

<?php
if(isset($_GET['logout'])){
    unset($_SESSION['stud_id']);
}
?>