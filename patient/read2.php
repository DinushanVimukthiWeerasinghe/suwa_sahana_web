<!doctype html>
<html lang="en">
<title>Read</title>

<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Patient";
$msg="View Diagnosis History";
sessions_check($msg,$usertype,1,0);
svg_script();
$username = "patient";
$password = "patient123";
$conn = user_connect($username,$password);
back_to_dashboard();


$sql = "SELECT Patient_Diagnosis.*, Name from Patient_Diagnosis, Diagnosis WHERE Patient_Diagnosis.Diagnosis_Code=Diagnosis.Diagnosis_Code AND Patient_ID='P0001';";
$result = $conn->query($sql);
if($result) {
    if ($result->num_rows > 0) {
        echo("<br><p class=\"lead text-center\"><b>Diagnosis History - Patient P0001</b></p><br>");
        echo('
<div class="table-responsive-sm">
<table class="table table-dark"">
  <thead>
    <tr>
      <th scope="col">Patient Diagnosis Code</th>
      <th scope="col">Diagnosis ID</th>
      <th scope="col">Diagnosis Name</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Doctor ID</th>
      <th scope="col">Description</th>
    </tr>
  </thead><tbody>');
        while ($row = $result->fetch_assoc()) {
            echo('
    <tr>
      <th scope="row">' . $row['Patient_Diagnosis_Code'] . '</th>
      <td>' . $row['Diagnosis_Code'] . '</td>
      <td>' . $row['Name'] . '</td>
      <td>' . $row['Date'] . '</td>
      <td>' . $row['Time'] . '</td>
      <td>' . $row['Emp_No'] . '</td>
      <td>' . $row['Description'] . '</td>
    </tr>');


        }
        echo('</tbody>
</table></div>');

    } else {
        echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>No Record Found</div></div><br>");
    }
}
else
{
    echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>".mysqli_error($conn)."</div></div><br>");
}



?>



</html>