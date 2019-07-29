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
            Detail Pesanan
          </h1>
        </section>
    <section class="content">    
<a href="pesanan.php" class="btn btn-primary">Back</a><br>
<div class="table-responsive" style="background:#FFF">
<table class="table table-striped table-bordered">
<thead><tr><th>Invoice</th><th>Nama Produk</th><th>Harga</th><th>Jumlah</th>
</tr></thead>
<tbody>
        
          <?php
            $invoice=$_GET['id'];
          $page = (isset($_GET['page']))? $_GET['page'] : 1;
          $limit = 10; // Jumlah data per halamannya
          $limit_start = ($page - 1) * $limit;
          $all = $connect->query("SELECT * FROM pesanan_detail where invoice = '$invoice' ");
          $sql = $connect->query("SELECT * FROM pesanan_detail where invoice = '$invoice' "); 
          
          $no = $limit_start + 1; 
          $jumlah_page = ceil($all->num_rows/ $limit);
          
            while($data = $sql->fetch_assoc()){             
            ?>
            <tr><td><?php echo $data['invoice'];?></td><td><?php echo $data['nama_produk'];?></td><td><?php echo $data['harga']; ?></td>
            <td><?php echo $data['qty'];?></td><td>                        
            </td></tr>
            
            <?php
            $no++;
              
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
          echo '<li><a href="detailpesanan.php?page=1">First</a></li>
          <li><a href="detailpesanan.php?page='.$link_prev.'">&laquo;</a></li>';
        }
        
        $jumlah_number = 3;
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
          echo '<li'.$link_active.'><a href="detailpesanan.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($page == $jumlah_page){
          echo '<li class="disabled"><a href="#">&raquo;</a></li><li class="disabled"><a href="#">Last</a></li>';
        }else{
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        echo '<li><a href="detailpesanan.php?page='.$link_next.'">&raquo;</a></li>
        <li><a href="detailpesanan.php?page='.$jumlah_page.'">Last</a></li>';
        }
        ?>
      </ul>
    </div>
  <?php }?>
  </body>
</html>