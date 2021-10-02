<!doctype html>
<html lang="en">
<title>Read</title>

<?php

require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Doctor";
$msg="View Treatment History of a Patient ";
sessions_check($msg,$usertype,1,0);
svg_script();
$username = "doctor";
$password = "doctor123";
$conn = user_connect($username,$password);
$sql1 = "SELECT Patient_Treatment.*, Name from Patient_Treatment, Test WHERE Patient_Treatment.Treatment_ID=Test.Treatment_ID AND Patient_ID='P0001';";
$result1 = $conn->query($sql1);
    back_to_dashboard();

    if($result1) {
        if ($result1->num_rows > 0) {
            echo("<br><p class=\"lead text-center\"><b>Test Details - Patient P0001</b></p><br>");
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
            while ($row1 = $result1->fetch_assoc()) {
                echo('
    <tr>
      <th scope="row">' . $row1['Patient_Treatment_Code'] . '</th>
      <td>' . $row1['Treatment_ID'] . '</td>
      <td>' . $row1['Name'] . '</td>
      <td>' . $row1['Emp_No'] . '</td>
      <td>' . $row1['Date'] . '</td>
      <td>' . $row1['Time'] . '</td>
    </tr>');
            }
            echo('</tbody>
</table></div>'
            );
        } else {
            echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>No Test Details Available ! </div></div><br>");

        }
    }
    else
    {

        echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>".mysqli_error($conn)."</div></div><br>");
    }
    $sql2 = "SELECT Patient_Treatment.*, Name from Patient_Treatment, Drug WHERE Patient_Treatment.Treatment_ID=Drug.Treatment_ID AND Patient_ID='P0001';";
    $result2 = $conn->query($sql2);
    if($result2) {
        if ($result2->num_rows > 0) {
            echo("<br><p class=\"lead text-center\"><b>Drug Details - Patient P0001</b></p><br>");
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
            while ($row2 = $result2->fetch_assoc()) {
                echo('
    <tr>
      <th scope="row">' . $row2['Patient_Treatment_Code'] . '</th>
      <td>' . $row2['Treatment_ID'] . '</td>
      <td>' . $row2['Name'] . '</td>
      <td>' . $row2['Emp_No'] . '</td>
      <td>' . $row2['Date'] . '</td>
      <td>' . $row2['Time'] . '</td>
    </tr>');
            }
            echo('</tbody>
</table>
</div>');

        } else {
            echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>No Drug Details Available !</div></div><br>");
        }
    }
    else
    {

        echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>".mysqli_error($conn)."</div></div><br>");
    }

?>


</html>