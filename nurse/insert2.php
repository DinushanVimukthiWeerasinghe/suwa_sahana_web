<!doctype html>
<html lang="en">
<title>Insert</title>
<?php
require_once ("../include/database.php");
$usertype="Nurse";
$msg="Insert New On-Arrival Inspection Details of a Patient";
sessions_check($msg,$usertype,1,0);
include_src();
$page=basename(__FILE__);

if(isset($_SESSION['panel']) && $_SESSION['panel']=="NO") {
Panel($page);
back_to_dashboard();
if (isset($_POST['Submit'])) {
if (isset($_SESSION['record']) && $_SESSION['record'] == 'NO') {

    $Patient_ID = $_POST['patient_id'];
    $Emp_No = $_POST['emp_no'];
    $Date = $_POST['date'];
    $Time = $_POST['time'];
    $Temp = $_POST['temparature'];
    $Weight = $_POST['weight'];
    $Blood_Pres = $_POST['blood_press'];
    $Pulse = $_POST['pulse'];

$username = "nurse";
$password = "nurse123";
$conn=user_connect($username,$password);

$sql = "INSERT INTO `patient_onarrival_inspection`(`Patient_ID`, `Emp_No`, `Date`, `Time`, `Temp`, `Weight`, `Blood_Pres`, `Pulse`) VALUES ('$Patient_ID','$Emp_No','$Date','$Time','$Temp','$Weight','$Blood_Pres','$Pulse')";
$result = $conn->query($sql);
    query_succession(0, $conn, $result);

}
}
?>
<form method="POST" action="insert2.php" >
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label"> Patient ID</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="patient_id" placeholder="Patient ID" required>
        </div>
    </div><br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Employee No</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="emp_no" placeholder="Employee No" required>
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
        <label for="inputPassword3" class="col-sm-2 col-form-label">Temparature</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="temparature" placeholder="Temaparature( Farenheit )" required>
        </div>
    </div><br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Weight</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="weight" placeholder="Weight (kg)" required>
        </div>
    </div><br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">BloodPressure</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="blood_press" placeholder="BloodPressure(Hg/mm)" required>
        </div>
    </div><br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Pulse </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="pulse" placeholder="Pulse" required>
        </div>
    </div><br>
    <div class="form-group row">
        <div class="col-sm-10">

            <button type="submit" name="Submit" class="btn btn-primary">Insert</button>
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