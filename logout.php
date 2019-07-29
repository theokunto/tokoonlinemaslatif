<?php
 session_start();
 unset($_SESSION["id"]);
 echo 'Redirect to Signin';
 header('Refresh: 1; URL = signin.php');
?>