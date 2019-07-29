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
           Notifikasi
          </h1>
        </section>
		<section class="content">
		<?php

if(isset($_GET['id'])){

$stmt = $connect->query("SELECT * FROM notifikasi WHERE id='$_GET[id]'");
$s = $stmt->fetch_assoc();
$judul = $s['judul'];
$deskripsi = $s['deskripsi'];
$member_id = $s['member_id'];
$btnv = "Update";
$btn = "upd";
}else{
$judul = ""; 
$deskripsi = "";
$member_id = "";
$btn = "add";
$btnv = "Tambah";
}


		if(isset($_POST['add'])){
			$judul = $_POST['judul'];						
            $deskripsi = $_POST['deskripsi'];					
            $member_id = $_POST['memberid'];							
			$date = date('Y-m-d H:i:s');
            
            $in = $connect->query("INSERT INTO notifikasi SET judul ='$judul', deskripsi='$deskripsi', member_id='$member_id'
            , waktu='$date'");
			if($in){
			echo '<div class="alert alert-success" role="alert">Buat Notifikasi Berhasil</div>';
			}else{
			echo '<div class="alert alert-danger" role="alert">Notifikasi Belum Tersimpan</div>';
            }
            
		}else if(isset($_POST['upd'])){            
			$getID = $_GET['id'];
            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $member_id = $_POST['memberid'];
		
		$in = $connect->query("UPDATE notifikasi SET judul ='$judul', deskripsi='$deskripsi', member_id='$member_id'
         WHERE id='$getID'");
		
		if($in){
		echo '<div class="alert alert-success" role="alert">Update Berhasil</div>';
		}else{
        echo '<div class="alert alert-danger" role="alert">Update Belum Tersimpan</div>';        
        }
        
}else if(isset($_GET['d'])){
$stmt = hapus('notifikasi','id',$_GET['d']);
echo '<div class="alert alert-success" role="alert">Hapus Berhasil</div>';
}else{
		?>
        <!-- Main content -->
		<form method="POST" enctype="multipart/form-data">
		<label>Judul</label><br>
        <input name="judul" type="text" class="form-control" value="<?php echo $judul;?>" required="required"><br>
        <label>Deskripsi</label><br>
        <input name="deskripsi" type="text" class="form-control" value="<?php echo $deskripsi;?>" required="required"><br>
        <label>Member</label><br>
		<input name="memberid" type="text" class="form-control" value="<?php echo $member_id;?>" required="required"><br>
		
		<input name="<?php echo $btn;?>" type="submit" value="<?php echo $btnv;?>" class="btn btn-success">
        <a href="notifikasi.php" class="btn btn-info">Back</a>
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