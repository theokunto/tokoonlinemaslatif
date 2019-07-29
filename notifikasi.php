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
if(isset($_GET['d'])){
$stmt = hapus('notifikasi','id',$_GET['d']);
if($stmt){
  echo '<div class="alert alert-success" role="alert">Hapus Berhasil</div>';
}else{
  echo '<div class="alert alert-warning" role="alert">Hapus Gagal</div>';
}}?>
<a href="editnotifikasi.php" class="btn btn-primary">Tambah Notifikasi</a><br>
      <div class="table-responsive" style="background:#FFF">
       <table class="table table-striped table-bordered">
<thead><tr><th>Judul</th><th>Deskripsi</th><th>Member</th><th>Aksi</th></tr></thead>
<tbody>
          
          <?php                    
          $page = (isset($_GET['page']))? $_GET['page'] : 1;
          $limit = 10; // Jumlah data per halamannya
          $limit_start = ($page - 1) * $limit;
          $all = $connect->query("SELECT * FROM notifikasi  ");
          $sql = $connect->query("SELECT * FROM notifikasi ORDER BY waktu DESC LIMIT ".$limit_start.",".$limit);          
          $no = $limit_start + 1; 
          $jumlah_page = ceil($all->num_rows/ $limit);
          while($data = $sql->fetch_assoc()){ 
            
            echo '<tr><td>'.$data['judul'].'</td><td>'.$data['deskripsi'].'</td><td>'.$data['member_id'].'</td>
            <td><a href="editnotifikasi.php?id='.$data['id'].'"class="label bg-green">Ubah</a> 
            <a href="notifikasi.php?d='.$data['id'].'" class="label bg-red" onClick="return confirm(\'Apakah Anda yakin?\')">Hapus</a></td></tr>';
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
          echo '<li><a href="notifikasi.php?page=1">First</a></li>
          <li><a href="notifikasi.php?page='.$link_prev.'">&laquo;</a></li>';
        }
        
        $jumlah_number = 3;
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
          echo '<li'.$link_active.'><a href="notifikasi.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($page == $jumlah_page){
          echo '<li class="disabled"><a href="#">&raquo;</a></li><li class="disabled"><a href="#">Last</a></li>';
        }else{
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        echo '<li><a href="notifikasi.php?page='.$link_next.'">&raquo;</a></li>
        <li><a href="notifikasi.php?page='.$jumlah_page.'">Last</a></li>';
        }
        ?>
      </ul>
    </div>
  <?php }?>
  </body>
</html>