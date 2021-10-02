<!doctype html>
<html lang="en">
<title>Delete</title>


<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Patient";
$msg="Delete a Patient Record";
sessions_check($msg,$usertype,1,0);
$username = "patient";
$password = "patient123";
$conn = user_connect($username,$password);
$sql = "DELETE FROM Patient WHERE Patient_ID='P0001'";
$result = $conn->query($sql);
if($result)
{
    back_to_dashboard();
}
query_succession(1,$conn,$result);
?>


</html>