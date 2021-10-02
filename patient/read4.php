<!doctype html>
<html lang="en">
<title>Read</title>

<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Patient";
$msg="View Insurance Company Details ";
sessions_check($msg,$usertype,1,0);
svg_script();
$username = "patient";
$password = "patient123";
$conn = user_connect($username,$password);
back_to_dashboard();

$sql = "SELECT `Name`, `Reg_Branch`, `Branch_Address`, `Contact_Num`, `Sub_Flag`, `Sub_First_Name`, `Sub_Last_Name`, `Sub_Relationship`, `Sub_Address`, `Sub_Contact_Num` FROM `Insurance_Comp` WHERE Patient_ID='P0002';";
$result = $conn->query($sql);
$error=mysqli_error($conn);
$subscriber=0;
if($result) {
    echo("<br><p class=\"lead text-center\"><b>Insurance Company Details - Patient P0002</b></p><br>");
    if ($result->num_rows > 0) {
    echo('
<div class="table-responsive-sm">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Company Name</th>
      <th scope="col">Registered Branch</th>
      <th scope="col">Branch Address</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Is Subscriber?</th>
    </tr>
  </thead><tbody>');
    while ($row = $result->fetch_assoc()) {
        echo('
    <tr>
      <th scope="row">' . $row['Name'] . '</th>
      <td>' . $row['Reg_Branch'] . '</td>
      <td>' . $row['Branch_Address'] . '</td>
      <td>' . $row['Contact_Num'] . '</td>');
        $subscriber=$row['Sub_Flag'];
        if ($subscriber == 1) {
            echo('<td>Yes</td>');
        } else {
            echo('<td>No</td>');
        }

        echo('</tr>');
    }
    echo('</tbody>
</table>');
    $result = $conn->query($sql);

  if($subscriber==0){
    echo("<br><p class=\"lead text-center\"><b>Insurance Subscriber Details - Patient P0002</b></p><br>");
    echo('<table class="table table-dark"">
    <thead>
      <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Branch</th>
        <th scope="col">Relationship</th>
        <th scope="col">Address</th>
        <th scope="col">Contact Number</th>
      </tr>
    </thead><tbody>');
      while($row = $result->fetch_assoc()) {
    echo('
      <tr>
        <th scope="row">'.$row['Sub_First_Name'].'</th>
        <td>'.$row['Sub_Last_Name'].'</td>
        <td>'.$row['Sub_Relationship'].'</td>
        <td>'.$row['Sub_Address'].'</td>
        <td>'.$row['Sub_Contact_Num'].'</td>

        
      </tr>');


  }
  echo('</tbody>
  </table>
  </div>');
  }
}
else
{
        echo("<br><div class=\"alert alert-warning d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>No Records Found!</div></div><br>");
}
}else{
    echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>".$error."</div></div><br>");

}



?>



</html>