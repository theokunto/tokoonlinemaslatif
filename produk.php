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
if(isset($_GET['d'])){
$stmt = hapus('produk','id',$_GET['d']);
if($stmt){
  echo '<div class="alert alert-success" role="alert">Hapus Berhasil</div>';
}else{
  echo '<div class="alert alert-warning" role="alert">Hapus Gagal</div>';
}}?>

<a href="editproduk.php" class="btn btn-primary">Tambah produk</a><br>
<div class="table-responsive" style="background:#FFF">
<table class="table table-striped table-bordered">
<thead><tr><th>Nama</th><th>Gambar</th><th>Kategori</th><th>Berat (KG)</th><th>Deskripsi</th><th>Harga</th>
<th>Harga Lama</th><th>Harga Grosir</th><th>Jumlah Varian</th><th>Stok</th><th>Tokopedia</th><th>Bukalapak</th><th>Shopee</th><th>Aksi</th></tr></thead>
<tbody>
        
          <?php

          $page = (isset($_GET['page']))? $_GET['page'] : 1;
          $limit = 10; // Jumlah data per halamannya
          $limit_start = ($page - 1) * $limit;
          $all = $connect->query("SELECT * FROM produk");
          $sql = $connect->query("SELECT * FROM produk ORDER BY waktu DESC LIMIT ".$limit_start.",".$limit);          
          $no = $limit_start + 1; 
          $jumlah_page = ceil($all->num_rows/ $limit);
          
          while($data = $sql->fetch_assoc()){ 
            $kategori=null;

            $alle = $connect->query("SELECT * FROM kategori WHERE id = ".$data['kategori']."");            
            while($datae = $alle->fetch_assoc()){ 
                $kategori=$datae['nama'];
                if($kategori==null){
                    $kategori=null;
                }
            }
            $totalstok=null;
            $jumlahvarian=null;
            $sqljumlahproduk = $connect->query("SELECT COUNT(nama) as jmlvarian,SUM(stok) as totalstok FROM varian WHERE produk_id = ".$data['id']."");            
            while($datae = $sqljumlahproduk->fetch_assoc()){ 
                $jumlahvarian=$datae['jmlvarian'];
                $totalstok=$datae['totalstok'];
                
                if($totalstok==null){
                    $totalstok=0;
                }
                if($jumlahvarian==null){
                    $jumlahvarian=0;
                }
            }                                
            
            echo '<tr><td>'.$data['nama'].'</td><td>'.$data['gambar'].'</td><td>'.$kategori.'</td>
            <td>'.$data['berat'].'</td><td>'.$data['deskripsi'].'</td><td>'.$data['harga'].'</td><td>'.$data['harga_lama'].'</td>
            <td>'.$data['harga_grosir'].'</td><td>'.$jumlahvarian.'</td><td>'.$totalstok.'</td><td>'.$data['tokped'].'</td><td>'.$data['bukalapak'].'</td><td>'.$data['shopee'].'</td><td>
            <a href="varian.php?produkid='.$data['id'].'" class="label bg-blue">Lihat Varian</a> 
            <a href="editproduk.php?id='.$data['id'].'"class="label bg-green">Ubah</a> 
            <a href="produk.php?d='.$data['id'].'" class="label bg-red" onClick="return confirm(\'Apakah Anda yakin?\')">Hapus</a>
            </td></tr>';
            $no++; // Tambah 1 setiap kali looping
          }
          ?>
        </tbody>
        </table>
      </div>
     
      <ul class="pagination">
        <?php
        if($page == 1){ 
          echo '<li class="disabled"><a href="#">First</a></li><li class="disabled"><a href="#">&laquo;</a></li>';
        }else{ // Jika page bukan page ke 1
          $link_prev = ($page > 1)? $page - 1 : 1;
          echo '<li><a href="produk.php?page=1">First</a></li>
          <li><a href="produk.php?page='.$link_prev.'">&laquo;</a></li>';
        }
        
        $jumlah_number = 3;
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
          echo '<li'.$link_active.'><a href="produk.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($page == $jumlah_page){
          echo '<li class="disabled"><a href="#">&raquo;</a></li><li class="disabled"><a href="#">Last</a></li>';
        }else{
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        echo '<li><a href="produk.php?page='.$link_next.'">&raquo;</a></li>
        <li><a href="produk.php?page='.$jumlah_page.'">Last</a></li>';
        }
        ?>
      </ul>
    </div>
  <?php }?>
  </body>
</html>