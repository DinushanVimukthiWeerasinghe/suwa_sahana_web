<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <title>Nurse Dashboard</title>
</head>
<?php
require_once("../include/database.php");
include_src();
$usertype="Nurse";
$msg="Welcome ";
sessions_check($msg,$usertype,0,0,0);
$_SESSION['record']='NO';
$_SESSION['panel']='NO';
//$str="INSERT INTO `patient_onarrival_inspection`(`Patient_ID`, `Emp_No`, `Date`, `Time`, `Temp`, `Weight`, `Blood_Pres`, `Pulse`) VALUES ('P0008','E003','2021-02-25','10:50:14','90','50','80/120','50')";
$strI_1= "INSERT INTO `inpatient_daily_examination`( `Patient_ID`, `Emp_No`, `Date`, `Time`, `Temp`, `Weight`, `Blood_Pres`, `Pulse`) VALUES ('P0002','E002','2015-10-02','12:34:55','90','50','80/120','50')";
$strI_2="INSERT INTO `In_Patient`(`Patient_ID`, `DOB`, `Bed_ID`, `Ward_ID`, `Admitted_Time`, `Admitted_Date`, `Admitted_Doc_No`) VALUES ('P0005','2010-10-21','B002','W001','11:25:10','2021-09-23','E008');";
$strS_1="SELECT patient_onarrival_inspection.*,patient_onarrival_inspection_symptoms.Symptoms FROM patient_onarrival_inspection, patient_onarrival_inspection_symptoms WHERE patient_onarrival_inspection.OnArrival_Inspection_Code=patient_onarrival_inspection_symptoms.OnArrival_Inspection_Code AND patient_onarrival_inspection.Patient_ID='P0001';";
$strS_2="SELECT ward.Ward_ID,ward.Name,bed.Bed_ID FROM ward,bed where ward.Ward_ID=bed.Ward_ID;";
$strU_1="UPDATE `patient_onarrival_inspection` SET `Temp`='95.5' WHERE OnArrival_Inspection_Code='1';";
$strU_2="UPDATE `in_patient` SET Admitted_Time='01:08:08' WHERE Patient_ID='P0001';";
$strD_1="DELETE FROM Patient WHERE Patient_ID='P0005';";
$strD_2="DELETE FROM Patient_OnArrival_Inspection WHERE OnArrival_Inspection_Code='12';";

$DesI_1="Insert New Daily Examination Details of In Patients";
$DesI_2="Insert New On-Arrival Inspection Details of a Patient";
$DesS_1="View On-Arrival Inspeciton History of a Patient";
$DesS_2="View Bed Details";
$DesU_1="Update On Arrival Inspection Details of a Patient";
$DesU_2="Update Admitted Time of a Patient";
$DesD_1="Delete a Patient";
$DesD_2="Delete a Patient On Arrival Inspection Record";
dashboard($usertype,$DesI_1,$DesI_2,$DesS_1,$DesS_2,$DesU_1,$DesU_2,$DesD_1,$DesD_2,$strI_1,$strI_2,$strS_1,$strS_2,$strU_1,$strU_2,$strD_1,$strD_2);
?>
</html> 