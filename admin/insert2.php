<!doctype html>
<html lang="en">
<title>Insert</title>
<?php
require_once ("../include/database.php");
include_src();
$usertype="Admin";
$msg="Insert a new Vendor for Drug Supply";
sessions_check($msg,$usertype,1,0);
$page=basename(__FILE__);
if(isset($_SESSION['panel']) && $_SESSION['panel']=="NO")
{
Panel($page);
back_to_dashboard();


  if(isset($_POST['regno'])) {
      if (isset($_SESSION['record']) && $_SESSION['record'] == 'NO') {
          $regno = $_POST['regno'];
          $name = $_POST['name'];
          $address = $_POST['address'];
          $contact = $_POST['contactnum'];


          $username = "admin";
          $password = "admin123";


          $sql = "INSERT INTO `Vendor`(`Reg_No`, `Name`, `Address`, `Contact_Num`) VALUES ('$regno','$name','$address','$contact');";


          $conn = user_connect($username, $password);
          $result = $conn->query($sql);

          query_succession(0, $conn, $result);
      }
  }
?>
<form method="POST" action="insert2.php" style="margin-left:30px; margin-right:30px;">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Registration Number</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="regno" placeholder="Registration Number" required>
        </div>
    </div><br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Name" required>
        </div>
    </div><br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" placeholder="Address" required>
        </div>
    </div><br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Contact Number</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="contactnum" placeholder="Contact Number" required>
        </div>
    </div><br>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Insert</button>
        </div>
    </div>
</form>
    <?php
}
else
{
    nextchance($page);
}

?>
<style>
    body{
        background-image: none !important;
    }
</style>
</html>