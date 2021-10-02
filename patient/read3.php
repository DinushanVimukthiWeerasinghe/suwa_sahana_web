<!doctype html>
<html lang="en">
<title>Read</title>

<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Patient";
$msg="View Emergency Contact Details";
sessions_check($msg,$usertype,1,0);
svg_script();
$username = "patient";
$password = "patient123";
$conn = user_connect($username,$password);
back_to_dashboard();

$sql = "SELECT `NIC`, `First_Name`, `Last_Name`, `Relationship`, `Contact_Num`, `Address` FROM `Emg_Contact` WHERE Patient_ID='P0001';";
$result = $conn->query($sql);

if($result) {
if ($result->num_rows > 0) {
  echo("<br><p class=\"lead text-center\"><b>Emergency Contact Details - Patient P0001</b></p><br>");
  echo('
<div class="table-responsive-sm">
<table class="table table-dark"">
  <thead>
    <tr>
      <th scope="col">NIC</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Relationship</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Address</th>
    </tr>
  </thead><tbody>');
  while($row = $result->fetch_assoc()) {
  echo('
    <tr>
      <th scope="row">'.$row['NIC'].'</th>
      <td>'.$row['First_Name'].'</td>
      <td>'.$row['Last_Name'].'</td>
      <td>'.$row['Relationship'].'</td>
      <td>'.$row['Contact_Num'].'</td>
      <td>'.$row['Address'].'</td>
    </tr>');

  
}
echo('</tbody>
</table>
</div>');

}else{
    echo("<br><div class=\"alert alert-warning d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>No Records Found!</div></div><br>");
}
}else
{
    echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>".mysqli_error($conn)."</div></div><br>");
}



?>



</html>