<!doctype html>
<html lang="en">
<title>Update</title>
<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Admin";
$msg="Update Attendant's Hourly Charge Rate";
sessions_check($msg,$usertype,1,0);
svg_script();
$username = "admin";
$password = "admin123";
$conn = user_connect($username,$password);
back_to_dashboard();

$sql = "UPDATE Attendant SET Hourly_Chg_Rate='750' WHERE Emp_No='E006'";
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
    echo("<br><div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\"><svg class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\"><use xlink:href=\"#exclamation-triangle-fill\"/></svg><div>".mysqli_error($conn)."</div></div><br>");
}
?>


</html>