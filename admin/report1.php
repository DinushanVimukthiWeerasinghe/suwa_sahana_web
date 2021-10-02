<!doctype html>
<html lang="en">
<title>Report</title>

<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Admin";
$msg="View the Count of Treatments Done by Each Doctor During The Past Month";
sessions_check($msg,$usertype,1,0);
$username = "admin";
$password = "admin123";
$conn = user_connect($username,$password);

$sql = "SELECT * FROM `doctortreatments`;";
$result = $conn->query($sql);

if($result) {
    back_to_dashboard();
    echo('
    <div class="table-responsive-sm">
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Employee Number</th>
      <th scope="col">Doctor Name</th>
      <th scope="col">Count of Treatments</th>
    </tr>
  </thead><tbody>');
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo('
    <tr>
      <th scope="row">' . $row['Emp_No'] . '</th>
      <td>' . $row['Name'] . '</td>
      <td>' . $row['count'] . '</td>

    </tr>');


        }
        echo('</tbody>
</table>');

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