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
            Varian
          </h1>
        </section>
		<section class="content">
		<?php

if(isset($_GET['id'])){

$stmt = $connect->query("SELECT * FROM varian WHERE id='$_GET[id]'");
$s = $stmt->fetch_assoc();
$nama = $s['nama'];
$stok = $s['stok'];
$berat = $s['berat'];
$harga = $s['harga'];
$btnv = "Update";
$btn = "upd";
}else{
$produkid=$_GET['produkid'];
$nama = ""; $stok = "";$berat = "";$harga = "";
$btn = "add";
$btnv = "Tambah";
}


		if(isset($_POST['add'])){
            $name = $_POST['nama'];
            $stok = $_POST['stok'];  
            $berat = $_POST['berat'];  
            $harga = $_POST['harga'];  
            $produkid = $_GET['produkid'];  
            // $target;
            // $image = $_FILES['gambar']['name'];

            // $target = "./images/".basename($image);
                        
            // move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
			$date = date('Y-m-d H:i:s');
            
            $in = $connect->query("INSERT INTO varian SET produk_id='$produkid',nama ='$name',stok ='$stok',berat ='$berat',harga ='$harga' ");
			if($in){
			echo '<div class="alert alert-success" role="alert">Buat Varian Berhasil</div>';
			}else{
			echo '<div class="alert alert-danger" role="alert">Varian Belum Tersimpan</div>';
            }
            
		}else if(isset($_POST['upd'])){
            // $image = $_FILES['gambar']['name'];
            // $target;
            // if($image==null){
            //     $images = $_POST['gambarbefore'];
            //     $target = "./images/".basename($images);            
            //     }else{
            //     $image = $_FILES['gambar']['name'];            
            //     $target = "./images/".basename($image);            
            //     }
            // move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
			$getID = $_GET['id'];
			$name = $_POST['nama'];			
            $stok = $_POST['stok'];  
            $berat = $_POST['berat'];  
            $harga = $_POST['harga'];  

		$in = $connect->query("UPDATE varian SET nama ='$name', stok='$stok',berat='$berat',harga='$harga' WHERE id='$getID'");
		
		if($in){
		echo '<div class="alert alert-success" role="alert">Update Berhasil</div>';
		}else{
        echo '<div class="alert alert-danger" role="alert">Update Belum Tersimpan</div>';        
        }
        
}else if(isset($_GET['d'])){
$stmt = hapus('varian','id',$_GET['d']);
echo '<div class="alert alert-success" role="alert">Hapus Berhasil</div>';
}else{
		?>
        <!-- Main content -->
		<form method="POST" enctype="multipart/form-data">
		<label>Nama Varian</label><br>
		<input name="nama" type="text" class="form-control" value="<?php echo $nama;?>" required="required"><br>
		<label>Stok</label><br>
        <input name="stok" type="text" class="form-control" value="<?php echo $stok;?>" required="required"><br>
        <label>Berat</label><br>
        <input name="berat" type="text" class="form-control" value="<?php echo $berat;?>" required="required"><br>
        <label>Harga</label><br>
		<input name="harga" type="text" class="form-control" value="<?php echo $harga;?>" required="required"><br>
		<!-- <label>Gambar</label><br>
		<img class="img-thumbnail" src="" alt="Photo">
        <input readonly="" type="hidden" name="gambarbefore" value="" class="form-control">
        <input type="file" name="gambar" class="form-control-file"  id="uploadImage" value="">
        <br> -->

        <input name="<?php echo $btn;?>" type="submit" value="<?php echo $btnv;?>" class="btn btn-success">
        <a href="varian.php?produkid=<?php echo $produkid;?>" class="btn btn-info">Back</a>
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