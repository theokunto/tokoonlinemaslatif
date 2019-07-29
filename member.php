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
            Member
          </h1>
        </section>
    <section class="content">
      <?php
      if(isset($_GET['d'])){
$stmt = hapus('member','id',$_GET['d']);
if($stmt){
  echo '<div class="alert alert-success" role="alert">Hapus Berhasil</div>';
}else{
  echo '<div class="alert alert-warning" role="alert">Hapus Gagal</div>';
}}?>
      <div class="table-responsive" style="background:#FFF">
       <table class="table table-striped table-bordered">
<thead><tr><th>Nama</th><th>Alamat</th><th>Email</th><th>HP</th>
<th>Waktu Buat</th><th>Waktu Login</th><th>Aksi</th></tr></thead>
<tbody>
          
          <?php
          $page = (isset($_GET['page']))? $_GET['page'] : 1;
          $limit = 10; // Jumlah data per halamannya
          $limit_start = ($page - 1) * $limit;
          $all = $connect->query("SELECT * FROM member");
          $sql = $connect->query("SELECT * FROM member LIMIT ".$limit_start.",".$limit);          
          $no = $limit_start + 1; 
          $jumlah_page = ceil($all->num_rows/ $limit);
          while($data = $sql->fetch_assoc()){ 
            echo '<tr><td>'.$data['nama'].'</td><td>'.$data['alamat'].'</td><td>'.$data['email'].'</td><td>'.$data['hp'].'</td><td>'.$data['waktu_buat'].'</td><td>'.$data['waktu_login'].'</td>
            <td><a href="member.php?d='.$data['id'].'" class="label bg-red" onClick="return confirm(\'Apakah Anda yakin?\')">Nonaktifkan Member</a></td></tr>';
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
          echo '<li><a href="member.php?page=1">First</a></li>
          <li><a href="member.php?page='.$link_prev.'">&laquo;</a></li>';
        }
        
        $jumlah_number = 3;
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
          echo '<li'.$link_active.'><a href="member.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($page == $jumlah_page){
          echo '<li class="disabled"><a href="#">&raquo;</a></li><li class="disabled"><a href="#">Last</a></li>';
        }else{
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        echo '<li><a href="member.php?page='.$link_next.'">&raquo;</a></li>
        <li><a href="member.php?page='.$jumlah_page.'">Last</a></li>';
        }
        ?>
      </ul>
    </div>
  <?php }?>
  </body>
</html>