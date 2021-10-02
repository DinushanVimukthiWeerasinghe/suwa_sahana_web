<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Read</title>

<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Nurse";
$msg="View On-Arrival Inspeciton History of a Patient";
sessions_check($msg,$usertype,1,0);
$username = "nurse";
$password = "nurse123";
$conn = user_connect($username,$password);
svg_script();
$sql = "SELECT patient_onarrival_inspection.*,patient_onarrival_inspection_symptoms.Symptoms FROM patient_onarrival_inspection, patient_onarrival_inspection_symptoms WHERE patient_onarrival_inspection.OnArrival_Inspection_Code=patient_onarrival_inspection_symptoms.OnArrival_Inspection_Code AND patient_onarrival_inspection.Patient_ID='P0001';";
$result = $conn->query($sql);

if($result){
back_to_dashboard();

echo ('
<div class="table-responsive-sm">
<table class="table table-dark"  >
  <thead>
    <tr>
      <th scope="col">Patient_ID</th>
      <th scope="col">On_Arrival_inspection_code</th>
      <th scope="col">Employee_Number</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Temperature</th>
      <th scope="col">Weight</th>
      <th scope="col">Blood Pressure</th>
      <th scope="col">Pulse</th>
      <th scope="col">Symptoms</th>
    </tr>
  </thead><tbody>');
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo ('
    <tr>
      <th scope="row">' . $row['Patient_ID'] . '</th>
      <td>' . $row['OnArrival_Inspection_Code'] . '</td>
      <td>' . $row['Emp_No'] . '</td>
      <td>' . $row['Date'] . '</td>
      <td>' . $row['Time'] . '</td>
      <td>' . $row['Temp'] . '</td>
      <td>' . $row['Weight'] . '</td>
      <td>' . $row['Blood_Pres'] . '</td>
      <td>' . $row['Pulse'] . '</td>
      <td>' . $row['Symptoms'] . '</td>
    </tr>');
  }
  echo ('</tbody>
</table>
</div>
');
} else {
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