<!doctype html>
<html lang="en">
<title>Update</title>
<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Doctor";
$msg="Update Emergency Contact Information of Patients";
sessions_check($msg,$usertype,1,0);
svg_script();
$username = "doctor";
$password = "doctor123";
$conn = user_connect($username,$password);
back_to_dashboard();
$sql = "UPDATE Emg_Contact SET Contact_Num='0773283617' WHERE NIC='200027492912'";
$result = $conn->query($sql);
if($result==TRUE){
    if(mysqli_affected_rows($conn)!=0) {
        echo("<br><div class=\"alert alert-success d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Success:\"><use xlink:href=\"#check-circle-fill\"/></svg><div>Successfully Executed</div></div><br>");
    }
    else
    {
        echo("<br><div class=\"alert alert-warning d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Success:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>Update Failed! Query already updated! </div></div><br>");

    }
}else{
  echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>Update Failed</div></div><br>");
  echo mysqli_error($conn);
}
?>


</html>