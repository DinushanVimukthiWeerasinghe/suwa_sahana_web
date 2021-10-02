<!doctype html>
<html lang="en">
<title>Update</title>
<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Nurse";
$msg="Update Admitted Time of a Patient";
sessions_check($msg,$usertype,1,0);
svg_script();
$username = "nurse";
$password = "nurse123";
$conn = user_connect($username,$password);
$sql = "UPDATE `in_patient` SET Admitted_Time='01:08:08' WHERE Patient_ID='P0001';";
$result = $conn->query($sql);
if($result)
{
    back_to_dashboard();
}
query_succession(1,$conn,$result);
?>


</html>