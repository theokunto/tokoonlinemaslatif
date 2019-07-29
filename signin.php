<?php session_start();
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Warung Go</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="themes/css/bootstrap.min.css">
  <link rel="stylesheet" href="themes/css/AdminLTE.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  
<div class="login-logo">
    <a href="signin.php"><b>Warung</b><br>Test Web</a>
  </div>
  <div class="login-box-body">
    
    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Email" required=''>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required=''>
      </div>
      <?php
if(isset($_POST['login'])){
$username = $connect->real_escape_string($_POST['username']);
$password = $connect->real_escape_string($_POST['password']);
$passtrue = MD5($password);
$query = $connect->query("SELECT * FROM admin WHERE email = '$username' AND password='$passtrue'");
if($query->num_rows>0){
$r = $query->fetch_assoc();
$_SESSION['id']=$r['email'];
// $_SESSION['name']=$r['username'];
// $_SESSION['level'] = $r['level'];
header('location:index.php');

}else{
echo '<span class="alert-warning" role="alert" style="padding:5px">Username/ Password salah</span><br><br>';
}
}?>
    <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Masuk</button>

    </form>
  </div>
  <!-- /.login-box-body -->
</div>

</body>
</html>
