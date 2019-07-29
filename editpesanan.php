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
            Pesanan
          </h1>
        </section>
		<section class="content">
		<?php

if(isset($_GET['id'])){
    
$stmt = $connect->query("SELECT * FROM pesanan WHERE invoice='$_GET[id]'");
$s = $stmt->fetch_assoc();
$invoice = $s['invoice'];
$nama;
    $alle = $connect->query("SELECT * FROM member WHERE id = ".$s['member_id']."");            
    while($datae = $alle->fetch_assoc()){ 
        $nama=$datae['nama'];
    }
$keterangan = $s['keterangan'];
$totalbayar = $s['total_bayar'];
$alamat = $s['alamat'];
$status = $s['status'];
$btnv = "Update";
$btn = "upd";
}

if(isset($_POST['upd'])){
			$getID = $_GET['id'];			
			$status = $_POST['status'];			
		
		$in = $connect->query("UPDATE pesanan SET status='$status' WHERE invoice='$getID'");		

		if($in){
		echo '<div class="alert alert-success" role="alert">Update Berhasil</div>';
		}else{
		echo '<div class="alert alert-danger" role="alert">Update Belum Tersimpan</div>';
		}
}else{
		?>
        <!-- Main content -->
		<form method="POST" enctype="multipart/form-data">
		<label>Invoice</label><br>
		<input   class="form-control" value="<?php echo $_GET['id'];?>" disabled><br>
		
        <label>Member Name</label><br>
		<input   class="form-control" value="<?php echo $nama;?>" disabled><br>

        <label>Keterangan</label><br>
		<input   class="form-control" value="<?php echo $keterangan;?>" disabled><br>

        <label>Total Bayar</label><br>
        <input  class="form-control" value="<?php echo $totalbayar;?>" disabled><br>

        <label>Alamat</label><br>
		<input  class="form-control" value="<?php echo $alamat;?>" disabled><br>
        
		<label>Status</label><br>
		<select name="status" class="form-control">            
			<option <?php
                          if($status=="1"){
                            echo "selected";
                          }else{
                            echo "";
                          }
                          ?> value="1">Diproses</option>
			<option <?php
                          if($status=="2"){
                            echo "selected";
                          }else{
                            echo "";
                          }
                          ?> value="2">Dibatalkan</option>
			<option <?php
                          if($status=="0"){
                            echo "selected";
                          }else{
                            echo "";
                          }
                          ?> value="0">Belum Diproses</option>
		</select><br>
        <input name="<?php echo $btn;?>" type="submit" value="<?php echo $btnv;?>" class="btn btn-success">
        <a href="pesanan.php" class="btn btn-primary">Back</a><br>
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