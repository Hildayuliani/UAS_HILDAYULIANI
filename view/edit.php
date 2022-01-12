<?php 
error_reporting(0);
// $con = new mysqli("localhost", "root", "", "pasien_hilda");
// $tgl = date('d F Y');   
// $id = $_GET['id'];   
// $query = mysqli_query($con, "SELECT * FROM tabel_pasien where id = '$id'");
// $isi = $query->fetch_assoc();
include'../controller/Pasien.php';
$ctrl = new Pasien();
$id=$_GET['id'];
$isi = $ctrl->getData($id);
$query = $ctrl->getJenisData($id);



if ($isi['jenis_pelayanan'] == 1) {
  $js = 'UMUM';
} else if ($isi['jenis_pelayanan'] == 2) {
  $js = 'BPJS';
} else if ($isi['jenis_pelayanan'] == 3) {
  $js = 'JAMKESMAS'; 
} else {
  $js = 'Jenis Pelayanan Tidak Terdaftar';
}

?>



<!DOCTYPE html>
  <html>

  <head>
    <title>Update Data Pasien</title>
    <!-- <link rel="stylesheet" href="../asset/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
  </head>

 <body>

<script type="text/javascript">
    $(document).ready(function(){
      alert('test');
      show_jenis(); //memanggil function yang ada di bawah
      //
      function show_jenis(){ // untuk menampilkan data product
        $.ajax({
          type  : 'GET',
          url   : 'api.php', //memangggil controller/function
          async : false,
          dataType  : 'json',
          success : function(data){
            console.log(data);
            var html = '';
            var i;
            var no;
            for(i=0; i<data.length; i++){ //looping atau pengulangan
              no = i + 1;
              html +=
              '<option value="'+data[i].id+'">'+data[i].jenis_pelayanan+'</option>';

            } //akhir dari looping

            $('#jenis_pelayanan').html(html); //mengirim data
          }, 
          error:function(data){
            console.log(data);
          }
        });
      }
    });




    $('#btnSimpan').click(function(){
    // alert('button');
      $('#ModalJenis').modal('hide');
    var dataForm = $('#formJenisSurat').serialize();
    $.ajax({
    type  : 'POST',
    url   : 'api.php',//Memanggil Controller/Function
    async : false,
    dataType : 'json',
    data : dataForm, 
    success:function(response){
            if (response == 200) {
          Swal.fire({
          type: 'success',
          title: 'Berhasil di simpan!',
          text: 'Tunggu sejenak',
          timer: 1000,
          showCancelButton: false,
          showConfirmButton: false
          })
          .then (function() {
            show_jenis();
          });

            } else {

                Swal.fire({
                type: 'error',
                title: 'Gagal menyimpan',
                text: 'silahkan coba lagi!'
              });

            }

            console.log(response);

          },

          error:function(response){

              Swal.fire({
                type: 'error',
                title: 'Opps!',
                text: 'server error!'
              });

              console.log(response);

          }
    });

  });  
     
// });


  </script>


  <div class="container">
  <row>
    <div class="card">
    <H2 align="center">Edit Data Pasien</H2>
    <div class="card-body">
      <form class="row g-3" action="<?php echo $ctrl->updatePasien($id);?>" method="post" name="form1">
        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $isi['id']?>" required>
        <div class="col-md-6">
          <label for="noPasien" class="form-label">Nomor Pasien</label>
          <input type="text" class="form-control" id="nomor_pasien" name="nomor_pasien" value="<?php echo $isi['nomor_pasien']?>" required>
        </div>
        <div class="col-md-6">
          <label for="jenispelayanan" class="form-label">Jenis Pelayanan</label>
          <select id="jenis_pelayanan" name="jenis_pelayanan" class="form-select" value="<?php echo $isi['jenis_pelayanan']?>" required> 
            <option selected value="<?=$jp['jenis_pelayanan']?>"><?php echo $jp?></option>
            <option selected value="" >Silahkan pilih</option>
            <?php
      foreach ($query as $jp) {
      ?>
      <option value="<?=$jp['id']?>"><?=$jp['jenis_pelayanan']?></option>
      <?php 
      }
      ?>
            
          </select>
        </div>
        <div class="col-12">
          <label for="namaPasien" class="form-label">Nama Pasien</label>
          <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="" value="<?php echo $isi['nama_pasien']?>" required>
        </div>
            <div class="col-12">
          <label for="jk" class="form-label">Jenis Kelamin</label><br>
          <label><input type="radio" name="jenis_kelamin" value="Laki-Laki" required>Laki-Laki</label>
          <label><input type="radio" name="jenis_kelamin" value="Perempuan" required>Perempuan</label>
          <!-- <input type="text" class="form-control" id="jk" name="jk" placeholder="" required> -->
        </div>
        <div class="col-12">
          <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="" value="<?php echo $isi['tgl_lahir']?>" required>
        </div>
        <div class="col-md-6">
          <label for="umur" class="form-label">Umur</label>
          <input type="text" class="form-control" id="umur" name="umur" value="<?php echo $isi['umur']?>" required>
        </div>
        
        <div class="col-md-6">
          <label for="diagnosa_penyakit" class="form-label">Diagnosa Penyakit</label>
          <input type="text" class="form-control" id="diagnosa_penyakit" name="diagnosa_penyakit" value="<?php echo $isi['diagnosa_penyakit']?>" required>
        </div>
        
        <div class="col-md-6">
          <label for="nama_dokter" class="form-label">Nama Dokter</label>
          <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?php echo $isi['nama_dokter']?>" required>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary" name="update">Update</button>
          <!-- <button type="button" class="btn btn-danger">Batal</button> -->
          <a href = "content.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
    </div> 
  </row>
  </div>
  
  </body>
  <!-- <script src="../asset/js/bootstrap.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </html>


