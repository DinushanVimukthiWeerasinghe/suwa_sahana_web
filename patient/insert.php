<!doctype html>
<html lang="en">
<title>Insert</title>
<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Patient";
$msg="Insert new Patient Record";
sessions_check($msg,$usertype,1,0);
$username = "patient";
$password = "patient123";
$conn = user_connect($username,$password);
$sql = "INSERT INTO `Patient`(`Patient_ID`, `Name`, `Type`) VALUES ('P0005','Nethsara Sandeepa','In Patient');";
$sql .= "INSERT INTO `In_Patient`(`Patient_ID`, `DOB`, `Bed_ID`, `Ward_ID`, `Admitted_Time`, `Admitted_Date`, `Admitted_Doc_No`) VALUES ('P0005','2010-10-21','B002','W001','11:25:10','2021-09-23','E008');";
$result=$conn->multi_query($sql);
query_succession(1,$conn,$result);

?>

</html>