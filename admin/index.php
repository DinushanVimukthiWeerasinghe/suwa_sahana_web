<!doctype html>
<html lang="en">
<title>Admin Dashboard</title>
<?php
require_once ("../include/database.php");
include_src();
$usertype="Admin";
$msg="Welcome";
sessions_check($msg,$usertype,0,0,0);
$_SESSION['record']='NO';
$_SESSION['panel']='NO';
$_SESSION['panel']='NO';

?>
<br>
<div class="accordion container" id="accordionExample">
  <div class="accordion-item bg-could">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Insert Queries
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: Insert a New Doctor <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="INSERT INTO `Employee`(`Emp_No`, `Name`, `Address`, `Working_Status`, `Contact_Num`, `Type`) VALUES ('$empno','$name','$address','$workingstatus','$contact','Medical Staff'); / INSERT INTO `Medical_Staff`(`Emp_No`, `MC_Reg_No`, `Joined_Date`, `Type`) VALUES ('$empno','$mcreg','$joindate','Doctor'); / INSERT INTO `Doctor`(`Emp_No`, `DEA_Reg_No`, `Speciality`) VALUES ('$empno','$deareg','$speciality');">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/admin/insert1.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: Insert a new Vendor for Drug Supply<br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="INSERT INTO `Vendor`(`Reg_No`, `Name`, `Address`, `Contact_Num`) VALUES ('$regno','$name','$address','$contact');">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/admin/insert2.php">Execute Query</a></button>
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
      <strong>Query 1</strong><br><br> Description: See Drug Supply History <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="SELECT Drug_Supply.*, Vendor_Name, Name FROM Drug INNER JOIN Drug_Supply ON Drug_Supply.Drug_Code=Drug.Drug_Code INNER JOIN Vendor ON Vendor.Reg_No=Drug_Supply.Reg_No;">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/admin/read1.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: View the list of Doctors <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="SELECT Employee.Emp_No, Name, Address, Working_Status, Contact_Num, MC_Reg_No, Joined_Date, DEA_Reg_No, Speciality FROM Employee INNER JOIN Medical_Staff ON Employee.Emp_No=Medical_Staff.Emp_No INNER JOIN Doctor ON Doctor.Emp_No = Medical_Staff.Emp_No;">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/admin/read2.php">Execute Query</a></button>
      </div>
    </div>
  </div>
  <div class="accordion-item bg-could">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      Update Queries
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: Update Attendant's Hourly Charge Rate <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="UPDATE Attendant SET Hourly_Chg_Rate='750' WHERE Emp_No='E006'">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/admin/update1.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: Update Head Employee of Patient Care Unit <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="UPDATE Patient_Care_Unit SET Head_Emp_ID='E007' WHERE PCU_ID='PCU004'">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/admin/update2.php">Execute Query</a></button>
      </div>
    </div>
  </div>
  <div class="accordion-item bg-could">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
      Delete Queries
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: Delete a Bed from a Ward <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="DELETE FROM Bed WHERE Bed_ID='B006';">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/admin/delete1.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: Delete a On-Arrival Inspection Record of a Patient <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="DELETE FROM Patient_OnAriival_Inspection WHERE OnArrival_Inspection_Code='12';">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/admin/delete2.php">Execute Query</a></button>
</div>
    </div>
  </div>
  <div class="accordion-item bg-could">
    <h2 class="accordion-header" id="headingFive">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
      Reports
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: View the Count of Treatments Done by Each Doctor During The Past Month <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="SELECT Employee.Emp_No, Name, count(Patient_Treatment_Code) AS count FROM `Patient_Treatment` INNER JOIN Employee ON Patient_Treatment.Emp_No=Employee.Emp_No WHERE Date BETWEEN '2021-09-01' AND '2021-09-30' GROUP BY Emp_No; / SELECT * FROM `doctortreatments`">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/admin/report1.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: View the Total Amount to be Paid for each Vendor for Purchases During the Past Month <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="SELECT vendor.Reg_No, Vendor_Name, sum(Unit_Cost*Quantity) as total FROM `Drug_Supply` INNER JOIN Vendor ON Drug_Supply.Reg_No=Vendor.Reg_No WHERE Date BETWEEN '2021-09-01' AND '2021-09-30' GROUP BY Reg_No; / SELECT * FROM `vendorbill`">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/admin/report2.php">Execute Query</a></button>
</div>
    </div>
  </div>
</div>
</html>