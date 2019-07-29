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
            Produk
          </h1>
        </section>
		<section class="content">
		<?php

if(isset($_GET['id'])){

$stmt = $connect->query("SELECT * FROM produk WHERE id='$_GET[id]'");
$s = $stmt->fetch_assoc();
$nama = $s['nama'];
$image = $s['gambar'];
$kategori = $s['kategori'];
$berat = $s['berat'];
$deskripsi = $s['deskripsi'];
$harga = $s['harga'];
$hargalama = $s['harga_lama'];
$hargagrosir= $s['harga_grosir'];
$tokped = $s['tokped'];
$bukalapak = $s['bukalapak'];
$shopee = $s['shopee'];
$date=$s['waktu'];
$btnv = "Update";
$btn = "upd";
}else{
$nama = ""; 
$image = "";
$kategori = "";
$berat = "";
$deskripsi = "";
$harga = "";
$hargalama = "";
$hargagrosir = "";
$tokped = "";
$bukalapak = "";
$shopee = "";
$date="";
$btn = "add";
$btnv = "Tambah";
}


		if(isset($_POST['add'])){
            $idforproduk=null;

            $alle = $connect->query("SELECT MAX(id) as idterakhir FROM produk");            
            while($datae = $alle->fetch_assoc()){ 
                $idforproduk=$datae['idterakhir']+1;
                if($idforproduk==null){
                    $idforproduk=1;
                }
            }
            
			$nama = $_POST['nama'];
            $kategori=$_POST['kategori'];
            $berat=$_POST['berat'];
            $deskripsi=$_POST['deskripsi'];
            $harga=$_POST['harga'];
            $hargalama=$_POST['hargalama'];
            $hargagrosir=$_POST['hargagrosir'];
            $tokped=$_POST['tokped'];
            $bukalapak=$_POST['bukalapak'];
            $shopee=$_POST['shopee'];
            $target;        
            $image = $_FILES['gambar']['name'];
            $target = "./images/".basename($image);
            
            move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
			$date = date('Y-m-d H:i:s');

            $connectPDO = new PDO("mysql:host=localhost;dbname=gutbalan_sop", "root", "");
            $queryvarian = "INSERT INTO varian ( produk_id, `nama`, `stok`,`berat`, `harga`) VALUES (:produk_id,:nama,:stok,:berat,:harga)";

            for($count = 0; $count < count($_POST['hidden_nama']); $count++)
                {
                $data = array(
                ':produk_id' => $idforproduk,
                ':nama' => $_POST['hidden_nama'][$count],
                ':stok' => $_POST['hidden_stok'][$count],
                ':berat' => $_POST['hidden_berat'][$count],
                ':harga' => $_POST['hidden_harga'][$count]
                );
                $statement = $connectPDO->prepare($queryvarian);
                $statement->execute($data);
            }
            if($statement){
                echo '<div class="alert alert-success" role="alert">Tambah Varian Berhasil</div>';
                }else{
                echo '<div class="alert alert-danger" role="alert">Tambah Varian Belum Tersimpan</div>';
                }  


            $in = $connect->query("INSERT INTO produk SET id='$idforproduk',nama ='$nama', gambar='$target'
            , kategori='$kategori', berat='$berat', deskripsi='$deskripsi', harga='$harga', 
            harga_lama='$hargalama', harga_grosir='$hargagrosir', tokped='$tokped', bukalapak='$bukalapak'
            , shopee='$shopee', waktu='$date'");
			if($in){
			echo '<div class="alert alert-success" role="alert">Buat Produk Berhasil</div>';
			}else{
			echo '<div class="alert alert-danger" role="alert">Produk Belum Tersimpan</div>';
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
            $nama = $_POST['nama'];
            $kategori=$_POST['kategori'];
            $berat=$_POST['berat'];
            $deskripsi=$_POST['deskripsi'];
            $harga=$_POST['harga'];
            $hargalama=$_POST['hargalama'];
            $hargagrosir=$_POST['hargagrosir'];
            $tokped=$_POST['tokped'];
            $bukalapak=$_POST['bukalapak'];
            $shopee=$_POST['shopee'];
            $date = date('Y-m-d H:i:s');

            $connectPDO = new PDO("mysql:host=localhost;dbname=gutbalan_sop", "root", "");
            $queryvarian = "INSERT INTO varian ( produk_id, `nama`, `stok`,`berat`, `harga`) VALUES (:produk_id,:nama,:stok,:berat,:harga)";

            for($count = 0; $count < count($_POST['hidden_nama']); $count++)
                {
                $data = array(
                ':produk_id' => $getID,
                ':nama' => $_POST['hidden_nama'][$count],
                ':stok' => $_POST['hidden_stok'][$count],
                ':berat' => $_POST['hidden_berat'][$count],
                ':harga' => $_POST['hidden_harga'][$count]
                );
                $statement = $connectPDO->prepare($queryvarian);
                $statement->execute($data);
            }
            if($statement){
                echo '<div class="alert alert-success" role="alert">Tambah Varian Berhasil</div>';
                }else{
                echo '<div class="alert alert-danger" role="alert">Tambah Varian Belum Tersimpan</div>';
                } 
		
		$in = $connect->query("UPDATE produk SET nama ='$nama', gambar='$target', 
        kategori='$kategori', berat='$berat', deskripsi='$deskripsi', harga='$harga', 
        harga_lama='$hargalama', harga_grosir='$hargagrosir', tokped='$tokped', bukalapak='$bukalapak',
        shopee='$shopee', waktu='$date'
        WHERE id='$getID'");
		
		if($in){
		echo '<div class="alert alert-success" role="alert">Update Berhasil</div>';
		}else{
        echo '<div class="alert alert-danger" role="alert">Update Belum Tersimpan</div>';
        echo $in;        
        }
        
}else if(isset($_GET['d'])){
$stmt = hapus('produk','id',$_GET['d']);
echo '<div class="alert alert-success" role="alert">Hapus Berhasil</div>';
}else{  
		?>
        <!-- Main content -->
        <form method="POST"  enctype="multipart/form-data">
        <form method="post" id="produk_form">
		<label>Nama</label><br>
		<input name="nama" type="text" class="form-control" value="<?php echo $nama;?>" required="required"><br>		
		<label>Gambar</label><br>
		<img class="img-thumbnail" src=<?php echo $image;?> alt="Photo">
        <input readonly="" type="hidden" name="gambarbefore" value="<?php echo $image;?>" class="form-control">
        <input type="file" name="gambar" class="form-control-file"  id="uploadImage" value="<?php echo $image;?>">
        <br>

        <label>Kategori</label><br>
        <select name="kategori">                                                                  
        <?php
        $sql = $connect->query("SELECT * FROM kategori ");                      
        while($data = $sql->fetch_assoc()){ 
            ?>
            <option <?php
            
                if($data['id']==$kategori){
                    echo "selected";
                    }
                    ?> value=<?php echo $data['id'] ?>><?php echo $data['nama'];?></option>
                    <?php                                         
                    }?>                                      
                    </select>
        <br>  

        <label>Berat</label><br>
        <input name="berat" type="text" class="form-control" value="<?php echo $berat;?>" required="required"><br>
        <label>Deskripsi</label><br>
        <input name="deskripsi" type="text" class="form-control" value="<?php echo $deskripsi;?>" required="required"><br>		
        <label>Harga</label><br>
        <input name="harga" type="text" class="form-control" value="<?php echo $harga;?>" required="required"><br>		
        <label>Harga Lama</label><br>
        <input name="hargalama" type="text" class="form-control" value="<?php echo $hargalama;?>" required="required"><br>		
        <label>Harga Grosir</label><br>
        <input name="hargagrosir" type="text" class="form-control" value="<?php echo $hargagrosir;?>" required="required"><br>		
        
        <label>Varian</label><br>
        <a href="#" name="add" id="add" class="btn btn-info">Tambah Varian</a><br>
        
        <div class="table-responsive">
        <table class="table table-striped table-bordered" id="varian_data">
        <tr>
        <th>Nama Varian</th>        
        <th>Stok Varian</th>
        <th>Berat Varian</th>
        <th>Harga Varian</th>
        <th>Aksi</th>
        <th>Remove</th>
        </tr>
    <?php
        $id = $_GET['id'];
        $page = (isset($_GET['page']))? $_GET['page'] : 1;
        $limit = 10; // Jumlah data per halamannya
        $limit_start = ($page - 1) * $limit;
        $all = $connect->query("SELECT * FROM varian WHERE produk_id ='$id'");
        $sql = $connect->query("SELECT * FROM varian WHERE produk_id ='$id'");          
        $no = $limit_start + 1; 
        $jumlah_page = ceil($all->num_rows/ $limit);
        while($data = $sql->fetch_assoc()){ 
          echo '<tr><td>'.$data['nama'].'</td><td>'.$data['stok'].'</td><td>'.$data['berat'].'</td><td>'.$data['harga'].'</td>
          <td><a href="editvarian.php?id='.$data['id'].'"class="label bg-green">Ubah</a> 
          <a href="varian.php?produkid='.$data['produk_id'].'&d='.$data['id'].'" class="label bg-red" onClick="return confirm(\'Apakah Anda yakin?\')">Hapus</a></td></tr>';
          $no++; // Tambah 1 setiap kali looping
        }
    ?>
        </table>
        </div>
        
        <label>Link Tokopedia</label><br>
        <input name="tokped" type="text" class="form-control" value="<?php echo $tokped;?>" required="required"><br>		
        <label>Link Bukalapak</label><br>
        <input name="bukalapak" type="text" class="form-control" value="<?php echo $bukalapak;?>" required="required"><br>		
        <label>Link Shopee</label><br>
		<input name="shopee" type="text" class="form-control" value="<?php echo $shopee;?>" required="required"><br>		
        
        <input name="<?php echo $btn;?>" type="submit" value="<?php echo $btnv;?>" class="btn btn-success">
        <a href="produk.php" class="btn btn-info">Back</a>
        </form>
        </form>


    <div id="addvarian" title="Tambah Varian">
    <div class="form-group">
    <label>Nama Varian</label>
    <input type="text" name="nama" id="nama" class="form-control" />
    <span id="error_nama" class="text-danger"></span>
   </div>
   <div class="form-group">
    <label>Stok</label>
    <input type="text" name="stok" id="stok" class="form-control" />
    <span id="error_stok" class="text-danger"></span>
   </div>
   <div class="form-group">
    <label>Berat</label>
    <input type="text" name="berat" id="berat" class="form-control" />
    <span id="error_berat" class="text-danger"></span>
   </div>
   <div class="form-group">
    <label>Harga</label>
    <input type="text" name="harga" id="harga" class="form-control" />
    <span id="error_harga" class="text-danger"></span>
   </div>
   <div class="form-group" align="center">
    <input type="hidden" name="row_id" id="hidden_row_id" />
    <button type="button" name="sa  ve" id="save" class="btn btn-info">Save</button>
   </div>
  </div>
  <div id="action_alert" title="Action">

  </div>

<script>  
$(document).ready(function(){ 

var count = 0;

 $('#addvarian').dialog({
  autoOpen:false,
  width:400
 });

 $('#add').click(function(){
  $('#addvarian').dialog('option', 'title', 'Tambah Varian');
  $('#nama').val('');
  $('#stok').val('');
  $('#berat').val('');
  $('#harga').val('');
  $('#error_nama').text('');
  $('#error_stok').text('');
  $('#error_berat').text('');
  $('#error_harga').text('');
  $('#nama').css('border-color', '');
  $('#stok').css('border-color', '');
  $('#berat').css('border-color', '');
  $('#harga').css('border-color', '');
  $('#save').text('Save');
  $('#addvarian').dialog('open');
 });

 $('#save').click(function(){
  var error_nama = '';
  var error_stok = '';
  var error_berat = '';
  var error_harga = '';
  var nama = '';
  var stok = '';
  var berat = '';
  var harga = '';
  if($('#nama').val() == '')
  {
   error_nama = 'Nama Kosong !';
   $('#error_nama').text(error_nama);
   $('#nama').css('border-color', '#cc0000');
   nama = '';
  }
  else
  {
   error_nama = '';
   $('#error_nama').text(error_nama);
   $('#nama').css('border-color', '');
   nama = $('#nama').val();
  } 
  if($('#stok').val() == '')
  {
   error_stok = 'Stok Kosong !';
   $('#error_stok').text(error_stok);
   $('#stok').css('border-color', '#cc0000');
   stok = '';
  }
  else
  {
   error_stok = '';
   $('#error_stok').text(error_stok);
   $('#stok').css('border-color', '');
   stok = $('#stok').val();
  }
  if($('#berat').val() == '')
  {
   error_berat = 'Berat Kosong !';
   $('#error_berat').text(error_stok);
   $('#berat').css('border-color', '#cc0000');
   berat = '';
  }
  else
  {
   error_berat = '';
   $('#error_berat').text(error_berat);
   $('#berat').css('border-color', '');
   berat = $('#berat').val();
  }
  if($('#harga').val() == '')
  {
   error_harga = 'harga Kosong !';
   $('#error_harga').text(error_harga);
   $('#harga').css('border-color', '#cc0000');
   harga = '';
  }
  else
  {
   error_harga = '';
   $('#error_harga').text(error_harga);
   $('#harga').css('border-color', '');
   harga = $('#harga').val();
  }
  if(error_nama != '' || error_stok != ''||error_berat != ''|| error_harga != '')
  {
   return false;
  }
  else
  {
   if($('#save').text() == 'Save')
   {
    count = count + 1;
    output = '<tr id="row_'+count+'">';
    output += '<td>'+nama+' <input type="hidden" name="hidden_nama[]" id="nama'+count+'" class="nama" value="'+nama+'" /></td>';
    output += '<td>'+stok+' <input type="hidden" name="hidden_stok[]" id="stok'+count+'" value="'+stok+'" /></td>';
    output += '<td>'+berat+' <input type="hidden" name="hidden_berat[]" id="berat'+count+'" value="'+berat+'" /></td>';
    output += '<td>'+harga+' <input type="hidden" name="hidden_harga[]" id="harga'+count+'" value="'+harga+'" /></td>';
    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
    output += '</tr>';
    $('#varian_data').append(output);
   }
   else
   {
    var row_id = $('#hidden_row_id').val();
    output = '<td>'+nama+' <input type="hidden" name="hidden_nama[]" id="nama'+row_id+'" class="nama" value="'+nama+'" /></td>';
    output += '<td>'+stok+' <input type="hidden" name="hidden_stok[]" id="stok'+row_id+'" value="'+stok+'" /></td>';
    output += '<td>'+berat+' <input type="hidden" name="hidden_berat[]" id="berat'+row_id+'" value="'+berat+'" /></td>';
    output += '<td>'+harga+' <input type="hidden" name="hidden_harga[]" id="harga'+row_id+'" value="'+harga+'" /></td>';
    output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
    output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
    $('#row_'+row_id+'').html(output);
   }

   $('#addvarian').dialog('close');
  }
 });

 $(document).on('click', '.view_details', function(){
  var row_id = $(this).attr("id");
  var nama = $('#nama'+row_id+'').val();
  var stok = $('#stok'+row_id+'').val();
  var berat = $('#berat'+row_id+'').val();
  var harga = $('#harga'+row_id+'').val();
  $('#nama').val(nama);
  $('#stok').val(stok);
  $('#berat').val(berat);
  $('#harga').val(harga);
  $('#save').text('Edit');
  $('#hidden_row_id').val(row_id);
  $('#addvarian').dialog('option', 'title', 'Edit varian');
  $('#addvarian').dialog('open');
 });

 $(document).on('click', '.remove_details', function(){
  var row_id = $(this).attr("id");
  if(confirm("apakah anda ingin menhapus data ini ?"))
  {
   $('#row_'+row_id+'').remove();
  }
  else
  {
   return false;
  }
 });

 $('#action_alert').dialog({
  autoOpen:false
 });

 $('#produk_form').on('submit', function(event){
  event.preventDefault();
  var count_data = 0;
  $('.nama').each(function(){
   count_data = count_data + 1;
  });
  if(count_data > 0)
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"editproduk.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#varian_data').find("tr:gt(0)").remove();
    //  $('#action_alert').html('<p>Data Inserted Successfully</p>');
    //  $('#action_alert').dialog('open');
    }
   })
  }
  else
  {
//    $('#action_alert').html('<p>Please Add atleast one data</p>');
//    $('#action_alert').dialog('open');
  }
 });
 
});  
</script>      
<?php
}
echo '</section>	
      </div>';
include "footer.php";
}else{
header('location:signin.php');
}
?>