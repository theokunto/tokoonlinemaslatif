<?php
session_start();
if(isset($_SESSION['id'])){
include "header.php";
?>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Selamat Datang
          </h1>
        </section>

        
      </div><!-- /.content-wrapper -->
<?php
include "footer.php";
}else{
header('location:signin.php');
}
?>