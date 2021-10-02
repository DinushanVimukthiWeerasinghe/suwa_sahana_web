<!doctype html>
<html lang="en">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-bs-toggle="popover"]').popover();   
});
</script>
<?php
session_start();
if(!isset($_SESSION['usertype'])){
    header("Location: /suwa_sahana_hospital/login");
}
$usertype=$_SESSION['usertype'];
if($usertype!="Nurse"){
    header("Location: /suwa_sahana_hospital/login");
}
		$servername = "localhost";
		$username = "nurse";
		$password = "nurse123";
		$db="suwa_sahana_hospital";
		$conn = new mysqli($servername, $username, $password, $db);
echo("<h5 class=\"m-3\"> Hello you are logged in as <b>$usertype</b><h5>");
echo('<button type="button" class="btn btn-primary m-3 float-right"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/logout.php">Log Out</a></button>')
?>

<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Insert Queries
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: Insert New Daily Examination Details of In Patients <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="And here's some amazing content. It's very engaging. Right?">View Query</button>
        <button type="button" class="btn btn-lg btn-primary">Execute Query</button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: Insert New On-Arrival Inspection Details of a Patient<br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="And here's some amazing content. It's very engaging. Right?">View Query</button>
        <button type="button" class="btn btn-lg btn-primary">Execute Query</button>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      Read Queries
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: View On-Arrival Inspeciton History of a Patient <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="And here's some amazing content. It's very engaging. Right?">View Query</button>
        <button type="button" class="btn btn-lg btn-primary">Execute Query</button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: View Bed Status of Beds in a Ward <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="And here's some amazing content. It's very engaging. Right?">View Query</button>
        <button type="button" class="btn btn-lg btn-primary">Execute Query</button>      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      Update Queries
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: Update Treatment Details Given to Patients <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="And here's some amazing content. It's very engaging. Right?">View Query</button>
        <button type="button" class="btn btn-lg btn-primary">Update Patient Daily Examination of Patients</button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: Update In-Patient Details<br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="And here's some amazing content. It's very engaging. Right?">View Query</button>
        <button type="button" class="btn btn-lg btn-primary">Execute Query</button>      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
      Delete Queries
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: Delete a Patient Record <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" title="Query" data-bs-content="And here's some amazing content. It's very engaging. Right?">View Query</button>
        <button type="button" class="btn btn-lg btn-danger">Execute Query</button>

    </div>
  </div>
</div>
</html>