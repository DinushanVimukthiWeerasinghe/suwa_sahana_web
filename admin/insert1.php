<!doctype html>
<html lang="en">
<title>Insert</title>
<?php
require_once ("../include/database.php");
include_src();
$usertype="Admin";
$msg="Insert a New Doctor ";
sessions_check($msg,$usertype,1,0);
$page=basename(__FILE__);
if(isset($_SESSION['panel']) && $_SESSION['panel']=="NO")
{
Panel($page);
back_to_dashboard();

  if(isset($_POST['empno'])){

    if (isset($_SESSION['record']) && $_SESSION['record'] == 'NO') {


        $empno = $_POST['empno'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        if ($_POST['workingstatus'] == 'full') {
            $workingstatus = "Full Time";
        } else if ($_POST['workingstatus'] == 'part') {
            $workingstatus = "Part Time";
        }
        $contact = $_POST['contactnum'];
        $mcreg = $_POST['mcreg'];
        $joindate = $_POST['joineddate'];
        $deareg = $_POST['deareg'];
        $speciality = $_POST['speciality'];

        $username = "admin";
        $password = "admin123";


        $sql = "INSERT INTO `Employee`(`Emp_No`, `Name`, `Address`, `Working_Status`, `Contact_Num`, `Type`) VALUES ('$empno','$name','$address','$workingstatus','$contact','Medical Staff');";
        $sql .= "INSERT INTO `Medical_Staff`(`Emp_No`, `MC_Reg_No`, `Joined_Date`, `Type`) VALUES ('$empno','$mcreg','$joindate','Doctor');";
        $sql .= "INSERT INTO `Doctor`(`Emp_No`, `DEA_Reg_No`, `Speciality`) VALUES ('$empno','$deareg','$speciality');";

        $conn = user_connect($username, $password);
        $result = $conn->multi_query($sql);
        query_succession(0, $conn, $result);
    }

  }
?>
<form method="POST" action="insert1.php" style="margin-left:30px; margin-right:30px;">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Employee Number</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="empno" placeholder="Employee Number" required>
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
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="workingstatus" id="gridRadios1" value="full" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Full Time
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="workingstatus" id="gridRadios2" value="part">
                    <label class="form-check-label" for="gridRadios2">
                        Part Time
                    </label>
                </div>
            </div>
        </div>
    </fieldset><br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Contact Number</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="contactnum" placeholder="Contact Number" required>
        </div>
    </div><br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Medical Council Reg No</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="mcreg" placeholder="Medical Council Reg No" required>
        </div>
    </div><br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Joined Date</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="joineddate" placeholder="YYYY-MM-DD" required>
        </div>
    </div><br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">DEA Reg No</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="deareg" placeholder="DEA Reg No" required>
        </div>
    </div><br>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Speciality </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="speciality" placeholder="Speciality" required>
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