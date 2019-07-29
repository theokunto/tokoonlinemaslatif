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
            Data Pesanan
          </h1>
        </section>
    <section class="content">
    <?php
if(isset($_GET['d'])){
$stmt = hapus('pesanan','id',$_GET['d']);
if($stmt){
  echo '<div class="alert alert-success" role="alert">Hapus Berhasil</div>';
}else{
  echo '<div class="alert alert-warning" role="alert">Hapus Gagal</div>';
}}?>

<!-- <a href="edit_pesanan.php" class="btn btn-primary">Tambah Pesanan</a><br> -->

<div class="table-responsive" style="background:#FFF">
<table class="table table-striped table-bordered">
<thead><tr><th>Invoice</th><th>Member</th><th>Keterangan</th><th>Total Bayar</th><th>Alamat</th><th>Status</th>
<th>Aksi</th>
</tr></thead>
<tbody>
        
          <?php

          $page = (isset($_GET['page']))? $_GET['page'] : 1;
          $limit = 10; // Jumlah data per halamannya
          $limit_start = ($page - 1) * $limit;
          $all = $connect->query("SELECT * FROM pesanan");
          $sql = $connect->query("SELECT * FROM pesanan ORDER BY waktu DESC LIMIT ".$limit_start.",".$limit);          
          $no = $limit_start + 1; 
          $jumlah_page = ceil($all->num_rows/ $limit);
          
          while($data = $sql->fetch_assoc()){ 
            $nama;
            $alle = $connect->query("SELECT * FROM member WHERE id = ".$data['member_id']."");            
            while($datae = $alle->fetch_assoc()){ 
                $nama=$datae['nama'];
            }
            $statusname=null;
            if($data['status'] == 1){
                $statusname="Diproses";
              }else if($data['status'] == 2){
                $statusname="Dibatalkan";
              }else if($data['status'] == 0){
                $statusname="Belum Diproses";
              }
            

            echo '<tr><td>'.$data['invoice'].'</td><td>'.$nama.'</td><td>'.$data['keterangan'].'</td><td>'.$data['total_bayar'].'</td><td>'.$data['alamat'].'</td>
            <td>'.$statusname.'</td><td>
            <a href="detailpesanan.php?id='.$data['invoice'].'" class="label bg-blue">Detail</a> 
            <a href="editpesanan.php?id='.$data['invoice'].'"class="label bg-green">Ubah</a> 
            <a href="pesanan.php?d='.$data['invoice'].'" class="label bg-red" onClick="return confirm(\'Apakah Anda yakin?\')">Hapus</a>
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
          echo '<li><a href="pesanan.php?page=1">First</a></li>
          <li><a href="pesanan.php?page='.$link_prev.'">&laquo;</a></li>';
        }
        
        $jumlah_number = 3;
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
          echo '<li'.$link_active.'><a href="pesanan.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($page == $jumlah_page){
          echo '<li class="disabled"><a href="#">&raquo;</a></li><li class="disabled"><a href="#">Last</a></li>';
        }else{
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        echo '<li><a href="pesanan.php?page='.$link_next.'">&raquo;</a></li>
        <li><a href="pesanan.php?page='.$jumlah_page.'">Last</a></li>';
        }
        ?>
      </ul>
    </div>
  <?php }?>
  </body>
</html>