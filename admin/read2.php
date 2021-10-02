<!doctype html>
<html lang="en">
<title>Read</title>


<?php
require_once ("../include/database.php");
include_src();
Del_Overlay();
$usertype="Admin";
$msg="View the list of Doctors";
sessions_check($msg,$usertype,1,0);
$username = "admin";
$password = "admin123";
$conn = user_connect($username,$password);

$sql = "SELECT Employee.Emp_No, Name, Address, Working_Status, Contact_Num, MC_Reg_No, Joined_Date, DEA_Reg_No, Speciality FROM Employee INNER JOIN Medical_Staff ON Employee.Emp_No=Medical_Staff.Emp_No INNER JOIN Doctor ON Doctor.Emp_No = Medical_Staff.Emp_No;";
$result = $conn->query($sql);
if($result){
back_to_dashboard();

echo('
<div class="table-responsive-sm">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Employee Number</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Working Status</th>
      <th scope="col">Contact Number</th>
      <th scope="col">MC Reg Number</th>
      <th scope="col">DEA Reg Number</th>
      <th scope="col">Joined Date</th>
      <th scope="col">Speciality</th>
    </tr>
  </thead><tbody>');
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo('
    <tr>
      <th scope="row">' . $row['Emp_No'] . '</th>
      <td>' . $row['Name'] . '</td>
      <td>' . $row['Address'] . '</td>
      <td>' . $row['Working_Status'] . '</td>
      <td>' . $row['Contact_Num'] . '</td>
      <td>' . $row['MC_Reg_No'] . '</td>
      <td>' . $row['DEA_Reg_No'] . '</td>
      <td>' . $row['Joined_Date'] . '</td>
      <td>' . $row['Speciality'] . '</td>

    </tr>');


    }
    echo('</tbody>
</table>');

}
}else{

    $mysql_error=mysqli_error($conn);

    echo '<script type="text/javascript">
        let x="'.$mysql_error.'";
        openRed(x);
        </script>';

}
?>


</html>