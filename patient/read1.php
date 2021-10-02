<!doctype html>
<html lang="en">
<title>Read</title>

<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Patient";
$msg="View Treatment History ";
sessions_check($msg,$usertype,1,0);
svg_script();
$username = "patient";
$password = "patient123";
$conn = user_connect($username,$password);
back_to_dashboard();

$sql1 = "SELECT Patient_Treatment.*, Name from Patient_Treatment, Test WHERE Patient_Treatment.Treatment_ID=Test.Treatment_ID AND Patient_ID='P0001';";
$result1 = $conn->query($sql1);
$error=mysqli_error($conn);
if($result1) {
    echo("<br><p class=\"lead text-center\"><b>Test Details - Patient P0001</b></p><br>");
    if ($result1->num_rows > 0) {
        echo('
<div class="table-responsive-sm">

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Patient Treatment Code</th>
      <th scope="col">Treatment ID</th>
      <th scope="col">Test Name</th>
      <th scope="col">Doc ID</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
    </tr>
  </thead><tbody>');
        while ($row = $result1->fetch_assoc()) {
            echo('
    <tr>
      <th scope="row">' . $row['Patient_Treatment_Code'] . '</th>
      <td>' . $row['Treatment_ID'] . '</td>
      <td>' . $row['Name'] . '</td>
      <td>' . $row['Emp_No'] . '</td>
      <td>' . $row['Date'] . '</td>
      <td>' . $row['Time'] . '</td>
    </tr>');


        }
        echo('</tbody>
</table></div>');

    }
    else
    {
        echo("<br><div class=\"alert alert-warning d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>No Records Found!</div></div><br>");
    }
}
$sql2 = "SELECT Patient_Treatment.*, Name from Patient_Treatment, Drug WHERE Patient_Treatment.Treatment_ID=Drug.Treatment_ID AND Patient_ID='P0001';";
$result2 = $conn->query($sql2);
$error =mysqli_error($conn);
if($result2) {
    echo("<br><p class=\"lead text-center\"><b>Drug Details - Patient P0001</b></p><br>");
    if ($result2->num_rows > 0) {
        echo('
<div class="table-responsive-sm">
<table class="table table-dark"">
  <thead>
    <tr>
      <th scope="col">Patient Treatment Code</th>
      <th scope="col">Treatment ID</th>
      <th scope="col">Test Name</th>
      <th scope="col">Doc ID</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
    </tr>
  </thead><tbody>');
        while ($row = $result2->fetch_assoc()) {
            echo('
    <tr>
      <th scope="row">' . $row['Patient_Treatment_Code'] . '</th>
      <td>' . $row['Treatment_ID'] . '</td>
      <td>' . $row['Name'] . '</td>
      <td>' . $row['Emp_No'] . '</td>
      <td>' . $row['Date'] . '</td>
      <td>' . $row['Time'] . '</td>
    </tr>');


        }

        echo('</tbody>
</table></div>');

    }
    else
    {
        echo("<br><div class=\"alert alert-warning d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>No Records Found!</div></div><br>");

    }
}

if(!($result1 && $result2)) {
    echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>".$error."</div></div><br>");
}

?>


</html>