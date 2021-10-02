<!doctype html>
<html lang="en">
<title>Delete</title>



<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Nurse";
$msg="Delete a Patient On Arrival Inspection Record";
sessions_check($msg,$usertype,1,0);
svg_script();
$username = "nurse";
$password = "nurse123";
$conn = user_connect($username,$password);
$sql = "DELETE FROM Patient_OnArrival_Inspection WHERE OnArrival_Inspection_Code='12';";
$result = $conn->query($sql);
if($result)
{
    back_to_dashboard();
}
query_succession(1,$conn,$result);
?>



</html>