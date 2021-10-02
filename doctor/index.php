<!doctype html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Doctor Dashboard</title>
<?php
require_once ("../include/database.php");
include_src();
$usertype="Doctor";
$msg="Welcome";
sessions_check($msg,$usertype,0,1,0);
$_SESSION['record']='NO';
$_SESSION['panel']='NO';
$_SESSION['panel']='NO';

?>

<br>
<div class="accordion container" id="accordionExample">
  <div class="accordion-item bg-could">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button "  type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Insert Queries
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: Insert New Diagnosis Detail Of a Patient <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Sample Query"  data-bs-trigger="focus" data-bs-content="INSERT INTO `Patient_Diagnosis`(`Diagnosis_Code`, `Patient_ID`, `Date`, `Time`, `Emp_No`, `Description`) VALUES ('$diagcode','$patientid','$date','$time','$docid','$description');">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/doctor/insert1.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: Enter new In Patient Details <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Sample Query"  data-bs-trigger="focus" data-bs-content="INSERT INTO `Patient_Diagnosis`(`Diagnosis_Code`, `Patient_ID`, `Date`, `Time`, `Emp_No`) VALUES ('$diagcode','$patientid','$date','$time','$docid');">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/doctor/insert2.php">Execute Query</a></button>
      </div>
    </div>
  </div>
  <div class="accordion-item bg-could">
    <h2 class="accordion-header " id="headingTwo">
      <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      Read Queries
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: View In-Patient Details <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query"  data-bs-trigger="focus" data-bs-content="SELECT In_Patient.*, Patient.Name FROM `In_Patient` INNER JOIN Patient ON Patient.Patient_ID = In_Patient.Patient_ID;">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/doctor/read1.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: View Treatment History of a Patient <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query"  data-bs-trigger="focus" data-bs-content="SELECT Patient_Treatment.*, Name from Patient_Treatment, Test WHERE Patient_Treatment.Treatment_ID=Test.Treatment_ID AND Patient_ID='P0001'; / SELECT Patient_Treatment.*, Name from Patient_Treatment, Drug WHERE Patient_Treatment.Treatment_ID=Drug.Treatment_ID AND Patient_ID='P0001';">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/doctor/read2.php">Execute Query</a></button>
    </div>
    </div>
  </div>
  <div class="accordion-item bg-could">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed  type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      Update Queries
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: Update Treatment Details Given to Patients <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query"  data-bs-trigger="focus" data-bs-content="UPDATE Patient_Treatment SET Treatment_ID='T002' WHERE Patient_Treatment_Code='4'">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/doctor/update1.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: Update Emergency Contact Information of Patients <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query "  data-bs-trigger="focus" data-bs-content="UPDATE Emg_Contact SET Contact_Num='0773283617' WHERE NIC='200027492912'">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/doctor/update2.php">Execute Query</a></button>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
      Delete Queries
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body bg-could">
      <strong>Query 1</strong><br><br> Description: Delete a Patient Record <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query"  data-bs-trigger="focus" data-bs-content="DELETE FROM Patient WHERE Patient_ID='P0005';">View Query</button>
        <button type="button" class="btn btn-lg btn-danger"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/doctor/delete1.php">Execute Query</a></button>
          <br><br><br>
          <strong>Query 2</strong><br><br> Description: Delete a Patient Treatment Record <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query"  data-bs-trigger="focus" data-bs-content="DELETE FROM Patient_Treatment WHERE Patient_Treament_Code='6';">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/doctor/delete2.php">Execute Query</a></button>
</div>
    </div>
  </div>
</div>

</html>