<!doctype html>
<html lang="en">
<title>Read</title>




<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Doctor";
$msg="View In-Patient Details ";
sessions_check($msg,$usertype,1,0);
$username = "doctor";
$password = "doctor123";
$conn = user_connect($username,$password);

$sql = "SELECT In_Patient.*, Patient.Name FROM `In_Patient` INNER JOIN Patient ON Patient.Patient_ID = In_Patient.Patient_ID;";
$result = $conn->query($sql);


if($result){
    back_to_dashboard();
echo('
<div class="table-responsive-sm">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Patient ID</th>
      <th scope="col">Name</th>
      <th scope="col">DOB</th>
      <th scope="col">Bed ID</th>
      <th scope="col">Ward ID</th>
      <th scope="col">Admitted Date</th>
      <th scope="col">Admitted Time</th>
      <th scope="col">Discharged Date</th>
      <th scope="col">Discharged Time</th>
      <th scope="col">Admitted Doc ID</th>
    </tr>
  </thead><tbody>');
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo('
    <tr>
      <th scope="row">' . $row['Patient_ID'] . '</th>
      <td>' . $row['Name'] . '</td>
      <td>' . $row['DOB'] . '</td>
      <td>' . $row['Bed_ID'] . '</td>
      <td>' . $row['Ward_ID'] . '</td>
      <td>' . $row['Admitted_Date'] . '</td>
      <td>' . $row['Admitted_Time'] . '</td>
      <td>' . $row['Discharged_Date'] . '</td>
      <td>' . $row['Discharged_Time'] . '</td>
      <td>' . $row['Admitted_Doc_No'] . '</td>
    </tr>');

    }
    echo('</tbody>
</table>
</div>');
}else {
        echo ("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>No Record Found!</div></div><br>");

    }
}else{

    $mysql_error=mysqli_error($conn);

    echo '<script type="text/javascript">
        let x="'.$mysql_error.'";
        openRed(x);
        </script>';

}
?>




</html>