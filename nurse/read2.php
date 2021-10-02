<!doctype html>
<html lang="en">
<title>Read</title>

<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Nurse";
$msg="View Bed Details";
sessions_check($msg,$usertype,1,0);
$username = "nurse";
$password = "nurse123";
$conn = user_connect($username,$password);
svg_script();
$sql = "SELECT ward.Ward_ID,ward.Name,bed.Bed_ID FROM ward,bed where ward.Ward_ID=bed.Ward_ID;";
$result = $conn->query($sql);
if($result) {
    back_to_dashboard();
    if ($result->num_rows > 0) {

       
        echo'<div class="table-responsive-sm">';
        echo('<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Ward ID</th>
      <th scope="col">Ward Name</th>
      <th scope="col">Bed ID</th>
    </tr>
  </thead><tbody>');
        while ($row = $result->fetch_assoc()) {
            echo('
    <tr>
      <th scope="row">' . $row['Ward_ID'] . '</th>
      <td>' . $row['Name'] . '</td>
      <td>' . $row['Bed_ID'] . '</td>
    </tr>');
        }
        echo('</tbody>
</table>
        </div>');

    } else {
        echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>No Treatment History Available / Invalid Patient ID</div></div><br>");
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