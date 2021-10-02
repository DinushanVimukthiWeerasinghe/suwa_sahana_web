<!doctype html>
<html lang="en">
<title>Update</title>
<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Nurse";
$msg="Update On Arrival Inspection Details of a Patient";
sessions_check($msg,$usertype,1,0);
svg_script();
$username = "nurse";
$password = "nurse123";
$conn = user_connect($username,$password);

$sql = "UPDATE `patient_onarrival_inspection` SET `Temp`='95.5' WHERE OnArrival_Inspection_Code='1';";
$result = $conn->query($sql);
if($result)
{
    back_to_dashboard();
}
query_succession(1,$conn,$result);
?>


</html>