<!doctype html>
<html lang="en">

<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Patient";
sessions_check($usertype,0);
svg_script();
$username = "patient";
$password = "patient123";
$conn = user_connect($username,$password);
back_to_dashboard();

$condition=0;
$sql = "SELECT Patient_Treatment.*, Name from Patient_Treatment, Test WHERE Patient_Treatment.Treatment_ID=Test.Treatment_ID AND Patient_ID='P0002';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo("<br><p class=\"lead text-center\"><b>Test Details - Patient P0002</b></p><br>");
  echo('<table class="table">
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
  while($row = $result->fetch_assoc()) {
  echo('
    <tr>
      <th scope="row">'.$row['Patient_Treatment_Code'].'</th>
      <td>'.$row['Treatment_ID'].'</td>
      <td>'.$row['Name'].'</td>
      <td>'.$row['Emp_No'].'</td>
      <td>'.$row['Date'].'</td>
      <td>'.$row['Time'].'</td>
    </tr>');

  
}
echo('</tbody>
</table>');
$condition=1;
}
$sql = "SELECT Patient_Treatment.*, Name from Patient_Treatment, Drug WHERE Patient_Treatment.Treatment_ID=Drug.Treatment_ID AND Patient_ID='P0002';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo("<br><p class=\"lead text-center\"><b>Drug Details - Patient P0002</b></p><br>");
  echo('<table class="table">
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
  while($row = $result->fetch_assoc()) {
  echo('
    <tr>
      <th scope="row">'.$row['Patient_Treatment_Code'].'</th>
      <td>'.$row['Treatment_ID'].'</td>
      <td>'.$row['Name'].'</td>
      <td>'.$row['Emp_No'].'</td>
      <td>'.$row['Date'].'</td>
      <td>'.$row['Time'].'</td>
    </tr>');

  
}
$condition=1;
echo('</tbody>
</table>');

}

if($condition==0){
  echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>No Treatment History Available / Invalid Patient ID</div></div><br>");
  echo mysqli_error($conn);
}

?>


</html>