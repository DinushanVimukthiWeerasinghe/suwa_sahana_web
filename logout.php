<?php
session_start();
session_unset();
session_destroy();
header("Location: /suwa_sahana_hospital/login");
exit();
?>