<!doctype html>
<html lang="en">
<title>Insert</title>
<?php
require_once ("../include/database.php");
$usertype="Doctor";
$msg="Enter new In Patient Details ";
sessions_check($msg,$usertype,1,0);
include_src();
if(isset($_SESSION['panel']) && $_SESSION['panel']=="NO") {
    $page = basename(__FILE__);
    Panel($page);
    back_to_dashboard();
    if (isset($_POST['patientid'])) {
        $patientid = $_POST['patientid'];
        $patientname = $_POST['patientname'];
        $dob = $_POST['dob'];
        $wardid = $_POST['wardid'];
        $bedid = $_POST['bedid'];
        $admittime = $_POST['admittime'];
        $admitdate = $_POST['admitdate'];
        $admitdoc = $_POST['admitdoc'];

        $username = "doctor";
        $password = "doctor123";
        $conn = user_connect($username, $password);
        $sql1 = "INSERT INTO `Patient`(`Patient_ID`, `Name`, `Type`) VALUES ('$patientid','$patientname','In Patient');";
        $sql2 = "INSERT INTO `In_Patient`(`Patient_ID`, `DOB`, `Bed_ID`, `Ward_ID`, `Admitted_Time`, `Admitted_Date`, `Admitted_Doc_No`) VALUES ('$patientid','$dob','$bedid','$wardid','$admittime','$admitdate','$admitdoc');";

        $result1 = $conn->query($sql1);
        $result2= $conn->query($sql2);

        query_succession(0,$conn, $result1,$result2);
    }
} else
{
    nextchance();
}

?>
<form method="POST" action="insert2.php" style="margin-left:30px; margin-right:30px;">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Patient ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="patientid" placeholder="Patient ID" required>
    </div>
  </div><br>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Patient Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="patientname" placeholder="Patient Name" required>
    </div>
  </div><br>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Date of Birth</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="dob" placeholder="YYYY-MM-DD" required>
    </div>
  </div><br>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Bed ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="bedid" placeholder="Bed ID" required>
    </div>
  </div><br>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Ward ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="wardid" placeholder="Ward ID" required>
    </div>
  </div><br>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Admitted Time </label>
    <div class="col-sm-10">
      <input type="time" class="form-control" name="admittime" placeholder="HH:MM:SS" required>
    </div>
  </div><br>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Admitted Date </label>
    <div class="col-sm-10">
    <input type="date" class="form-control" name="admitdate" placeholder="YYYY-MM-DD" required>
    </div>
  </div><br>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Admitted Doc ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="admitdoc" placeholder="Emp ID of the Doctor who admitted" required>
    </div>
  </div><br>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Insert</button>
    </div>
  </div><br>
  
</form>
<style>
    body{
        background-image: none !important;
    }
</style>

</html>