<!doctype html>
<html lang="en">
<title>Delete</title>



<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Admin";
$msg="Delete a On-Arrival Inspection Record of a Patient";
sessions_check($msg,$usertype,1,0);
$username = "admin";
$password = "admin123";
$conn = user_connect($username,$password);

$sql = "DELETE FROM patient_onarrival_inspection WHERE OnArrival_Inspection_Code='12';";
$result = $conn->query($sql);
if(!(mysqli_affected_rows($conn)))
{
    echo '<script type="text/javascript">
        
        openDel(0,"No Records Found! \n Deletion Failed");
        </script>';
}
else {
    query_succession(1, $conn, $result);
}
?>


</html>