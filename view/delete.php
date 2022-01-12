<?php  

$con = new mysqli("localhost","root", "","pasien_hilda");
  
  if(isset($_POST['delete'])) {
      $id=$_POST['id'];
         
  
      //Insert user data info table
      $result = mysqli_query($con, "DELETE FROM `tabel_pasien` WHERE `tabel_pasien`.`id` = $id" ); 

      header("Location:view.php?pesan=success&&frm=del");
    }

  ?>
