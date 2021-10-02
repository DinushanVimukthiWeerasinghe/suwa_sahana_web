
<!doctype html>
<html lang="en">
<title>Insert</title>

<?php
require_once ("../include/database.php");
$usertype="Doctor";
$msg="Insert New Diagnosis Detail Of a Patient";
sessions_check($msg,$usertype,1,0);
include_src();
$page=basename(__FILE__);
if(isset($_SESSION['panel']) && $_SESSION['panel']=="NO")
  {
      Panel($page);
      back_to_dashboard();
    if(isset($_POST['diagnosiscode']))
    {
      if (isset($_SESSION['record']) && $_SESSION['record'] == 'NO')
      {
          $diagcode = $_POST['diagnosiscode'];
          $patientid = $_POST['patientid'];
          $date = $_POST['date'];
          $time = $_POST['time'];
          $docid = $_POST['docid'];

          $username = "doctor";
          $password = "doctor123";
          $conn = user_connect($username, $password);
          if (strlen($_POST['description']) > 0) {
              $description = $_POST['description'];
              $sql = "INSERT INTO `Patient_Diagnosis`(`Diagnosis_Code`, `Patient_ID`, `Date`, `Time`, `Emp_No`, `Description`) VALUES ('$diagcode','$patientid','$date','$time','$docid','$description');";

          } else {
              $sql = "INSERT INTO `Patient_Diagnosis`(`Diagnosis_Code`, `Patient_ID`, `Date`, `Time`, `Emp_No`) VALUES ('$diagcode','$patientid','$date','$time','$docid');";
          }

          $result = $conn->query($sql);
          query_succession(0,$conn, $result);
      }
    }

    ?>

  <form method="POST" action="insert1.php" style="margin-left:30px; margin-right:30px;">
      <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Diagnosis Code</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="diagnosiscode" placeholder="Diagnosis Code" required>
          </div>
      </div><br>
      <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Patient ID</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="patientid" placeholder="Patient ID" required>
          </div>
      </div><br>
      <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
          <div class="col-sm-10">
              <input type="date" class="form-control" name="date" placeholder="YYYY-MM-DD" required>
          </div>
      </div><br>
      <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Time</label>
          <div class="col-sm-10">
              <input type="time" class="form-control" name="time" placeholder="HH:MM:SS" required>
          </div>
      </div><br>
      <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Admitted Doc ID </label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="docid" placeholder="Emp ID of the Doctor who admitted" required>
          </div>
      </div><br>
      <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Description </label>
          <div class="col-sm-10">
              <textarea rows="5" class="form-control" name="description" placeholder="Description"></textarea>

          </div>
      </div><br>
      <div class="form-group row">
          <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Insert</button>
          </div>
      </div>
  </form>
<?php
  }
else
{
    nextchance($page);
}

?>
<style>
    body{
        background-image: none !important;
    }
</style>

</html>