<!doctype html>
<html lang="en">
<title>Delete</title>


<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Admin";
$msg="Delete a Bed from a Ward ";
sessions_check($msg,$usertype,1,0);
$username = "admin";
$password = "admin123";
$conn = user_connect($username,$password);

$sql = "DELETE FROM Bed WHERE Bed_ID='B006';";
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