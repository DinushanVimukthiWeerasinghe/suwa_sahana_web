<!doctype html>
<html lang="en">
<title>Patient Dashboard</title>
<?php
require_once ("../include/database.php");
include_src();
$usertype="Patient";
$msg="Welcome";
sessions_check($msg,$usertype,0,0,0);
$_SESSION['record']='NO';
$_SESSION['panel']='NO';



?>
<div class="accordion container" id="accordionExample">
  <div class="accordion-item bg-del">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Insert Queries
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: Insert new Patient Record <br><br>
      <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" data-bs-trigger="focus" title="Query" data-bs-content="INSERT INTO `Patient`(`Patient_ID`, `Name`, `Type`) VALUES ('P0005','Nethsara Sandeepa','In Patient'); / INSERT INTO `In_Patient`(`Patient_ID`, `DOB`, `Bed_ID`, `Ward_ID`, `Admitted_Time`, `Admitted_Date`, `Admitted_Doc_No`) VALUES ('P0005','2010-10-21','B002','W001','11:25:10','2021-09-23','E008');">View Query</button>
        <button type="button" class="btn btn-lg btn-danger"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/patient/insert.php">Execute Query</a></button>
    </div>
  </div>
</div>
  <div class="accordion-item bg-could">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      Read Queries
      </button>
    </h2>

    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: View Treatment History <br><br>
      <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-trigger="focus" data-bs-content="SELECT Patient_Treatment.*, Name from Patient_Treatment, Test WHERE Patient_Treatment.Treatment_ID=Test.Treatment_ID AND Patient_ID='P0002'; / SELECT Patient_Treatment.*, Name from Patient_Treatment, Drug WHERE Patient_Treatment.Treatment_ID=Drug.Treatment_ID AND Patient_ID='P0002';">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/patient/read1.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: View Diagnosis History <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-trigger="focus" data-bs-content="SELECT Patient_Diagnosis.*, Name from Patient_Diagnosis, Diagnosis WHERE Patient_Diagnosis.Diagnosis_Code=Diagnosis.Diagnosis_Code AND Patient_ID='P0001';">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/patient/read2.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 3</strong><br><br> Description: View Emergency Contact Details<br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-trigger="focus" data-bs-content="SELECT `NIC`, `First_Name`, `Last_Name`, `Relationship`, `Contact_Num`, `Address` FROM `Emg_Contact` WHERE Patient_ID='P0001';">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/patient/read3.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 4</strong><br><br> Description: View Insurance Company Details <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-trigger="focus" data-bs-content="SELECT `Name`, `Reg_Branch`, `Branch_Address`, `Contact_Num`, `Sub_Flag`, `Sub_First_Name`, `Sub_Last_Name`, `Sub_Relationship`, `Sub_Address`, `Sub_Contact_Num` FROM `Insurance_Comp` WHERE Patient_ID='P0002';">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/patient/read4.php">Execute Query</a></button>
      
      </div>
  </div>
  </div>
  <div class="accordion-item bg-del">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      Update Queries
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: Update a Patient Record <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-trigger="focus" data-bs-content="UPDATE Patient SET Name='Supun' WHERE Patient_ID='P0001'">View Query</button>
        <button type="button" class="btn btn-lg btn-danger"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/patient/update.php">Execute Query</a></button>
    </div>
    </div>
  </div>


  <div class="accordion-item bg-del">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
      Delete Queries
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: Delete a Patient Record <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-trigger="focus" data-bs-content="DELETE FROM Patient WHERE Patient_ID='P0001'">View Query</button>
        <button type="button" class="btn btn-lg btn-danger"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/patient/delete.php">Execute Query</a></button>

    </div>
  </div>
</div>

</html>