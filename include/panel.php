<?php
session_start();
$page=$_SESSION['page'];
$user=$_SESSION['usertype'];


if(isset($_POST['ADD']))
{
    $_SESSION['record']='NO';
    $_SESSION['panel']='NO';
    header("Location: /suwa_sahana_hospital/$user/$page");
    unset($_SESSION['page']);

}else if(isset($_POST['BACK']))
{
    $_SESSION['record']='NO';
    header("Location: /suwa_sahana_hospital/$user/");
}

