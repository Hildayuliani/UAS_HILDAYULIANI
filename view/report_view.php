<?php
include '../controller/Pasien.php';
  
$ctrl = new Pasien();
$hasil = $ctrl->index();

?>
<!DOCTYPE html>
<html>
<head>
  <!-- <title>DATA PASIEN</title> -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body onload="window.print()">
  <div class="container">
  <h1><center><b>DATA PASIEN</b></center></h1>
  <div class="example-modal">
    <div id="logout" class="modal fade" role="dialog" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
            <form class="row g-3" action="<?php echo $ctrl->Logout()?>" method="post" name="form1">
              <div class="modal-header">
            <!-- <h3 class="modal-title"></h3> -->
          </div>
          <div class="modal-body">
            <h4 align="center">Apakah Anda Yakin Ingin Keluar ?<strong><span class="grt"></span></strong></h4>
          </div>
          <div class="modal-footer">
           <button id="nologout" type="button" class="btn btn-primary pull-left" data-bs-dismiss="modal">Tidak</button> 
           <button type="submit" class="btn btn-danger" name="logout">Keluar</button>
          </div>
          </form>
          </div>
        </div>
      </div>
    </div>
     
  <table class="table table-bordered table-striped">
    <thead class="table-dark text-center">
      <tr>
        <th>Nomor Pasien</th>
        <th>Nama Pasien</th> 
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Umur</th>
        <th>Diagnosa Penyakit</th>
        <th>Nama Dokter</th>
        <th>Jenis Pelayanan</th>
      </tr>
    </thead>
<?php

  foreach ($hasil as $isi){
    if ($isi["jenis_pelayanan"]=='1'){
      $js = "UMUM";
    }
    else if($isi["jenis_pelayanan"]=='2'){
      $js = "BPJS";
    }else if ($isi["jenis_pelayanan"]=='3'){
      $js = "JAMKESMAS";
    }else{
      $js = "Kode Bermasalah";
    }
    ?>
  <tr>
    <td><?php echo $isi['nomor_pasien'];?></td>
    <td><?php echo $isi['nama_pasien'];?></td>
    <td><?php echo $isi['tgl_lahir'];?></td>
    <td><?php echo $isi['jenis_kelamin'];?></td>
    <td><?php echo $isi['umur'];?></td>
    <td><?php echo $isi['diagnosa_penyakit'];?></td>
    <td><?php echo $isi['nama_dokter'];?></td>
    <td><?php echo $js;?></td>
  </tr>
  <div class="example-modal">
    <div id="deletesurat<?php echo $isi ['id'];?>" class="modal fade" role="dialog" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class ="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Konfirmasi Delete Data Pasien</h3>
          </div>
          <form class="row g-3" action="<?php $ctrl->hapusPasien()?>" method="post" name="form1">
          <div class="modal-body">
              <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $isi ['id'];?>" required>
            <h4 align="center">Apakah Anda Yakin Ingin Menghapus Data Pasien? <?php echo $isi ['nomor_pasien'];?><strong><span class="grt"></span></strong></h4>
          </div>
          <div class="modal-footer">
           <button id="nodelete" type="button" class="btn btn-primary pull-left" data-bs-dismiss="modal">Cancel</button> 
           <button type="submit" class="btn btn-danger" name="delete">Delete</button>
          </div>
          </form>
          </div>
        </div>
      </div>
     </div>

  <?php
  }
?>
<!-- <p><a href="add.php"><button class="btn btn-danger">Tambah Pasien</button></a></p>
<p><a href="#" class="btn-btn-light action-button" role="button" data-bs-toggle="modal" data-bs-target="#logout"><button class="btn btn-danger">Log Out</button></a></p> -->
</div>


</body>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>


