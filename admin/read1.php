<!doctype html>
<html lang="en">
<title>Read</title>
<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Admin";
$msg="See Drug Supply History";
sessions_check($msg,$usertype,1,0);
$username = "admin";
$password = "admin123";
$conn = user_connect($username,$password);

$sql = "SELECT Drug_Supply.*, Vendor.Name as Vendor_Name, drug.Name FROM Drug INNER JOIN Drug_Supply ON Drug_Supply.Drug_Code=Drug.Drug_Code INNER JOIN Vendor ON Vendor.Reg_No=Drug_Supply.Reg_No;";
$result = $conn->query($sql);

if($result){
back_to_dashboard();
echo('
<div class="table-responsive-sm">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Drug Supply Code</th>
      <th scope="col">Drug Code</th>
      <th scope="col">Drug Name</th>
      <th scope="col">Vendor Reg Number</th>
      <th scope="col">Vendor Name</th>
      <th scope="col">Date</th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit Cost</th>
    </tr>
  </thead><tbody>');
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo('
    <tr>
      <th scope="row">' . $row['Drug_Supply_Code'] . '</th>
      <td>' . $row['Drug_Code'] . '</td>
      <td>' . $row['Name'] . '</td>
      <td>' . $row['Reg_No'] . '</td>
      <td>' . $row['Vendor_Name'] . '</td>
      <td>' . $row['Date'] . '</td>
      <td>' . $row['Quantity'] . '</td>
      <td>' . $row['Unit_Cost'] . '</td>

    </tr>');


    }
    echo('</tbody>
</table>');
}
else {
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