<!doctype html>
<html lang="en">
<title>Report</title>

<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Admin";
$msg="View the Total Amount to be Paid for each Vendor for Purchases During the Past Month";
sessions_check($msg,$usertype,1,0);
$username = "admin";
$password = "admin123";
$conn = user_connect($username,$password);

$sql = "SELECT * FROM `vendorbill`";
$result = $conn->query($sql);
if($result) {
    back_to_dashboard();
    echo('
    <div class="table-responsive-sm">
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Registration Number</th>
      <th scope="col">Vendor Name</th>
      <th scope="col">Total to be Paid</th>
    </tr>
  </thead><tbody>');
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo('
    <tr>
      <th scope="row">' . $row['Reg_No'] . '</th>
      <td>' . $row['Name'] . '</td>
      <td>' . $row['total'] . '</td>

    </tr>');


        }
        echo('</tbody>
</table>');

    } else {
        echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>No Record Found!</div></div><br>");

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