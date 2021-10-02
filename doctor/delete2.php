
<!doctype html>
<html lang="en">
<title>Delete</title>

<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Doctor";
$msg="Delete a Patient Record";
sessions_check($msg,$usertype,1,0);
		$username = "doctor";
		$password = "doctor123";
		$conn = user_connect($username,$password);
$sql = "DELETE FROM Patient_Treatment WHERE Patient_Treament_Code='6';";
$result = $conn->query($sql);
query_succession(1,$conn,$result);
?>
</html>