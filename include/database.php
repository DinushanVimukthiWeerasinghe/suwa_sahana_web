<?php 
//    function include_head($user_type)
//    {
//        echo '
//        <!doctype html>
//        <title>'.$user_type.'</title>
//        <html lang="en">
//        <meta charset="utf-8">
//        <meta name="viewport" content="width=device-width, initial-scale=1">
//        ';
//        if($user_type=="Doctor")
//        {
//            echo '<link rel="icon" type="image/png" href="../login/images/icons/patient.ico" />';
//        }else if($user_type=='Nurse')
//        {
//            echo '<link rel="icon" type="image/png" href="../login/images/icons/nurse.ico" />';
//        }
//        echo'
//        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
//        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
//        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
//        <script src="../assests/script.js"></script>
//        <link rel="stylesheet" href="/assests/style.css">
//        ';
//    }
    function user_connect($user_name,$password)
    {
        return new mysqli('localhost',$user_name,$password,'suwa_sahana_hospital');
    }
    function query_succession($Del,$conn,$result1,$result2=TRUE)
{
    if ($result1 && $result2) {
        $_SESSION['record'] = 'YES';
        $_SESSION['panel'] = 'YES';

        echo '<script type="text/javascript">openNav(1);</script>';
    } else {
        $mysql_error = mysqli_error($conn);
        $_SESSION['record'] = 'YES';
        $_SESSION['panel'] = 'YES';
        if($Del==1)
        {echo '<script type="text/javascript">
        let x="'.$mysql_error.'";
        openDel(0,x);
        </script>';
        }
        else {
            echo '<script type="text/javascript">
        let x="' . $mysql_error . '";
        openNav(0,x);
        </script>';
        }
    }
}
    function include_src()
    {
        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../assests/style.css">
        <script src="../assests/script.js"></script>
        ';
    }
    function log_out_btn($usertype)
    {
        echo("<h5 class=\"m-3\"> Hello you are logged in as <b>$usertype</b><h5>");
        echo('<button type="button" class="btn btn-primary m-3 float-right"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/logout.php">Log Out</a></button>');
    }
    function svg_script()
    {
        echo'
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
              <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </symbol>
              <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
              </symbol>
              <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
            </svg>
        ';
    }
    function View_Query_btn($query)
    {
      echo '<button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" data-bs-trigger="focus" title="Query" data-bs-content="'.$query;
      echo "\">View Query</button>'";
    }
    function navbar($msg,$usertype,$username,$val,$val2=1)
    {


        echo '
        <nav class="navbar navbar-light  bg-opacity">
            <div class="container-fluid ">
                 ';
        if($val==1)
        {
            echo '<h5 class="text-white mycss-1">'.$msg.' </h5>';
        }else
        {
            echo '<h5 class="navbar-brand text-white"><span class="text-uppercase mycss">'.$msg.'</span> </h5>';
        }
        echo '
              <div>
                      <h5 class=" navbar-brand text-white "><br> User Name : - <b>' .$username.'</b>  <br>  User Role/Level : <b>'.$usertype.'</b> </h5><br>
             ';
        if($val2==0) {
          echo '  <a class=" btn navbar-brand btn-primary m-auto" href = "../login/index.php" role = "button" > Log Out </a >';
         }
              echo'  </div>
            
            </div>
        </nav>
    
        ';


    }
    function sessions_check($msg,$usertype_session,$val=1,$log_btn=1,$val2=1)
    {
        echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
        session_start();
        $usertype=$_SESSION['usertype'];
        $username=$_SESSION['username'];
        if(!isset($_SESSION['usertype'])){
            header("Location: /suwa_sahana_hospital/login");
        }
        else if($usertype!=$usertype_session){
            header("Location: /suwa_sahana_hospital/login");
        }
        else{

                navbar($msg,$usertype,$username,$val,$val2);
        }
    }
    function dashboard($usertype,$DesI_1,$DesI_2,$DesS_1,$DesS_2,$DesU_1,$DesU_2,$DesD_1,$DesD_2,$strI_1,$strI_2,$strS_1,$strS_2,$strU_1,$strU_2,$strD_1,$strD_2)
    {
        echo'
        <div class="accordion container" id="accordionExample">
  <div class="accordion-item bg-could">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Insert Queries
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: '.$DesI_1.' <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" data-bs-trigger="focus" title="Query" data-bs-content="'.$strI_1.';">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/'.$usertype.'/insert1.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: '.$DesI_2.' <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" data-bs-trigger="focus" title="Query" data-bs-content="'.$strI_2.';">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/'.$usertype.'/insert2.php">Execute Query</a></button>
      </div>
    </div>
  </div>
  <div class="accordion-item bg-could">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      Read Queries
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: '.$DesS_1.' <br><br>
      <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" data-bs-trigger="focus" title="Query" data-bs-content="'.$strS_1.';">View Query</button>
      <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/'.$usertype.'/read1.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: '.$DesS_2.'<br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" data-bs-trigger="focus" title="Query" data-bs-content="'.$strS_2.';">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/'.$usertype.'/read2.php">Execute Query</a></button>
    </div>
    </div>
  </div>
  <div class="accordion-item bg-could">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      Update Queries
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: '.$DesU_1.' <br><br>
      <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" data-bs-trigger="focus" title="Query" data-bs-content="'.$strU_1.';">View Query</button>
      <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/'.$usertype.'/update1.php">Execute Query</a></button>
        <br><br><br>
        <strong>Query 2</strong><br><br> Description: '.$DesU_2.' <br><br>
        <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" data-bs-trigger="focus" title="Query" data-bs-content="'.$strU_2.';">View Query</button>
        <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/'.$usertype.'/update2.php">Execute Query</a></button>
      </div>
    </div>
  </div>
  <div class="accordion-item bg-could">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
      Delete Queries
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 1</strong><br><br> Description: '.$DesD_1.' <br><br>
      <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" data-bs-trigger="focus" title="Query" data-bs-content="'.$strD_1.';">View Query</button>
      <button type="button" class="btn btn-lg btn-danger"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/'.$usertype.'/delete1.php">Execute Query</a></button>
    </div>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Query 2</strong><br><br> Description: '.$DesD_2.' <br><br>
      <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="popover" data-bs-trigger="focus" title="Query" data-bs-content="'.$strD_2.';">View Query</button>
      <button type="button" class="btn btn-lg btn-primary"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/'.$usertype.'/delete1.php">Execute Query</a></button>
    </div>
    </div>
  </div>
</div>
        ';
    }
    function Panel($page)
    {
    $_SESSION['page']=$page;
        echo '
        <div id="myNav" class="overlay">
        <div class="overlay-content">
      <img src="" alt="image" id="ico">
      <Br><br>
      <h1 id="msg"></h1><br>
      <div class="font-monospace" id="Record"></div>
      <div class="border border-danger border-4 rounded-pill d-inline-flex justify-content-center w-75">
      
      <div class="font-monospace" id="Database_Error"></div>
      </div>
          <br>
      <br>
      <form action="../include/panel.php" method="post">
      <INPUT TYPE = "Submit"  class="btn btn-outline-success" value="Add Record" name="ADD">&nbsp;&nbsp;&nbsp;
      <INPUT TYPE = "Submit"  class="btn btn-outline-primary" value="Back to Dashoard" name="BACK">
        </form>
     
  </div>
</div>
        ';
    }
    function nextchance()
    {
        echo '
      <div id="myNav" class="overlay">
            <div class="overlay-content">
    
            
         
            <form action="../include/panel.php" method="post">
            <INPUT TYPE = "Submit"  class="btn btn-danger btn-lg w-25" value="Back to Dashoard" name="BACK">
            
            <br><br>
            <br><img src="" alt="image" id="ico"><Br><br><br>
            <br><br>
            <INPUT TYPE = "Submit"  class="btn btn-success btn-lg w-25 " value="Add Record" name="ADD">
            </form>
 
            </div>
            
            </div>
      ';
        echo '<script type="text/javascript">openNav(2);</script>';
    }
    function back_to_dashboard()
    {

        echo '
        <button type="button" class="btn btn-primary m-3 float-right"><a style="text-decoration:none;" class="text-white"href="/suwa_sahana_hospital/'.$_SESSION['usertype'].'/">Back to Main Dashboard</a></button>
        ';
    }
    function log_usertype($usertype)
    {
        echo("<h5 class=\"m-3\"> Hello you are logged in as <b>$usertype</b><h5>");
    }
    function OnDel($con)
    {
        $error=mysqli_error($con);
        echo '<script type="text/javascript">
        let x="'.$error.'";
        openDel(x);
        </script>';
    }
    function Del_Overlay()
    {
        echo '
        <div id="myNav" class="overlay">
    <div class="overlay-content">
        <img src="" alt="image" id="ico">
        <Br><br>
        <h1 id="msg"></h1><br>
        <div class="font-monospace" id="Record"></div>
        <div class="border border-danger border-4 rounded-pill d-inline-flex justify-content-center ">
            <div class="font-monospace" id="Database_Error"></div>
        </div>

        <br>
        <br>
        <form action="../include/panel.php" method="post">
            <INPUT TYPE = "Submit"  class="btn btn-primary" value="Back To Dashboard" name="BACK">
        </form>
    </div>
</div>
        ';
    }
    ?>