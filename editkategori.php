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
            Kategori
          </h1>
        </section>
		<section class="content">
		<?php

if(isset($_GET['id'])){

$stmt = $connect->query("SELECT * FROM kategori WHERE id='$_GET[id]'");
$s = $stmt->fetch_assoc();
$name = $s['nama'];
$gambar = $s['gambar'];
$subkategori = $s['sub_kategori'];
$home = $s['home'];
$btnv = "Update";
$btn = "upd";
}else{
$name = ""; $gambar = "";$subkategori = "";$home = "";
$btn = "add";
$btnv = "Tambah";
}


		if(isset($_POST['add'])){
			$name = $_POST['username'];						
            
            $target;
            
            $image = $_FILES['gambar']['name'];

            $target = "./images/".basename($image);
                        
            move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
			$date = date('Y-m-d H:i:s');
            
            $subkategori = $_POST['subkategori'];						
            $home = 0;
            if(!isset($_POST['home'])){
                $home = 0;
            }else{
                $home = $_POST['home'];
            }						
            
            $in = $connect->query("INSERT INTO kategori SET nama ='$name', gambar='$target',
            sub_kategori='$subkategori', home='$home'");
			if($in){
			echo '<div class="alert alert-success" role="alert">Buat Kategori Berhasil</div>';
			}else{
			echo '<div class="alert alert-danger" role="alert">Kategori Belum Tersimpan</div>';
            }
            
		}else if(isset($_POST['upd'])){
            $image = $_FILES['gambar']['name'];
            $target;
            if($image==null){
                $images = $_POST['gambarbefore'];
                $target = "./images/".basename($images);            
                }else{
                $image = $_FILES['gambar']['name'];            
                $target = "./images/".basename($image);            
                }
            move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
			$getID = $_GET['id'];
			$name = $_POST['username'];			
            
            $subkategori = $_POST['subkategori'];						
            
            $home=0;
            if(!isset($_POST['home'])){
                $home = 0;
            }else{
                $home = $_POST['home'];
            }				

		$in = $connect->query("UPDATE kategori SET nama ='$name', gambar='$target',
        sub_kategori='$subkategori',home='$home' WHERE id='$getID'");
		
		if($in){
		echo '<div class="alert alert-success" role="alert">Update Berhasil</div>';
		}else{
        echo '<div class="alert alert-danger" role="alert">Update Belum Tersimpan</div>';        
        }
        
}else if(isset($_GET['d'])){
$stmt = hapus('kategori','id',$_GET['d']);
echo '<div class="alert alert-success" role="alert">Hapus Berhasil</div>';
}else{
		?>
        <!-- Main content -->
		<form method="POST" enctype="multipart/form-data">
		<label>Nama</label><br>
		<input name="username" type="text" class="form-control" value="<?php echo $name;?>" required="required"><br>
		
		<label>Gambar</label><br>
		<img class="img-thumbnail" src=<?php echo $gambar;?> alt="Photo">
        <input readonly="" type="hidden" name="gambarbefore" value="<?php echo $gambar;?>" class="form-control">
        <input type="file" name="gambar" class="form-control-file"  id="uploadImage" value="<?php echo $gambar;?>">
        <br>
        
        <label>Kategori Utama</label><br>
        
        <select name="subkategori">     

        <?php
        if( $subkategori != 0){
        ?>   
         <?php
        $sql = $connect->query("SELECT * FROM kategori ");                      
        while($data = $sql->fetch_assoc()){ 
            ?>
            
            <?php echo "<option" ?> 
            <?php
            
                if($data['id']==$subkategori){
                    echo "selected";
                    }
                    ?> <?php echo "value="?> <?php echo $data['id'] ?><?php echo ">"?> 
                    <?php echo $data['nama'];?><?php echo "</option>" ?>
                    <?php                                         
                    }
                    ?>                                      
        <?php
        }else{
                     
        ?>
        <?php
        echo "<option value='0'>Kategori Utama</option>";   
        $sql = $connect->query("SELECT * FROM kategori ");                      
        while($data = $sql->fetch_assoc()){ 
            ?>
            
            <?php echo "<option" ?> 
            <?php
            
                if($data['id']==$subkategori){
                    echo "selected";
                    }
                    ?> <?php echo "value="?> <?php echo $data['id'] ?><?php echo ">"?> 
                    <?php echo $data['nama'];?><?php echo "</option>" ?>
                    <?php                                         
                    }
                    ?>                                      
        
        <?php
            }
        ?>
        
                    </select>
        <br> 
        <br>
        <input type="checkbox" id="home" name="home" value="1" <?php    
        if($home==1){
            echo "checked";
        };
        ?>>
        <label>Tampilkan di halaman awal</label>
        <br>
        <br>
        <input name="<?php echo $btn;?>" type="submit" value="<?php echo $btnv;?>" class="btn btn-success">
        <a href="kategori.php" class="btn btn-info">Back</a>
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