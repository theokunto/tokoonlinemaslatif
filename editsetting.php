<?php
session_start();
if(isset($_SESSION['id'])){
include "header.php";
?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Setting
          </h1>
        </section>
		<section class="content">
		<?php

if(isset($_GET['id'])){

$stmt = $connect->query("SELECT * FROM setting WHERE id='$_GET[id]'");
$s = $stmt->fetch_assoc();
$kota = $s['kota'];
$info_pembayaran = $s['info_pembayaran'];
$info_about = $s['info_about'];
$sms = $s['sms'];
$whatsapp = $s['whatsapp'];
$line = $s['line'];
$btnv = "Update";
$btn = "upd";
}


		if(isset($_POST['upd'])){            
			$getID = $_GET['id'];
            $kota = $_POST['kota'];
            $info_pembayaran = $_POST['info_pembayaran'];
            $info_about = $_POST['info_about'];
            $sms = $_POST['sms'];
            $whatsapp = $_POST['whatsapp'];
            $line = $_POST['line'];
		
		$in = $connect->query("UPDATE setting SET kota ='$kota', info_pembayaran='$info_pembayaran', info_about='$info_about'
        , sms='$sms', whatsapp='$whatsapp', line='$line'
         WHERE id='$getID'");
		
		if($in){
		echo '<div class="alert alert-success" role="alert">Update Berhasil</div>';
		}else{
        echo '<div class="alert alert-danger" role="alert">Update Belum Tersimpan</div>';        
        }
        
}else if(isset($_GET['d'])){
$stmt = hapus('setting','id',$_GET['d']);
echo '<div class="alert alert-success" role="alert">Hapus Berhasil</div>';
}else{
		?>
        <!-- Main content -->
		<form method="POST" enctype="multipart/form-data">
		<label>Kota</label><br>
        <input name="kota" type="text" class="form-control" value="<?php echo $kota;?>" required="required"><br>
        <label>Info Pembayaran</label><br>
        <input name="info_pembayaran" type="text" class="form-control" value="<?php echo $info_pembayaran;?>" required="required"><br>
        <label>Info About</label><br>
		<input name="info_about" type="text" class="form-control" value="<?php echo $info_about;?>" required="required"><br>
		
        <label>SMS</label><br>
        <input name="sms" type="text" class="form-control" value="<?php echo $sms;?>" required="required"><br>
        <label>Whatsapp</label><br>
		<input name="whatsapp" type="text" class="form-control" value="<?php echo $whatsapp;?>" required="required"><br>
        <label>Line</label><br>
        <input name="line" type="text" class="form-control" value="<?php echo $line;?>" required="required"><br>

        <input name="<?php echo $btn;?>" type="submit" value="<?php echo $btnv;?>" class="btn btn-success">
        <a href="setting.php" class="btn btn-info">Back</a>
        </form>
        
<?php
}
echo '</section>	
      </div>';
include "footer.php";
}else{
header('location:signin.php');
}
?>