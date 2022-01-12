<?php
error_reporting(0);
//Buat Koneksinya
// $con = new mysqli("localhost","root", "","pasien_hilda");
// $tgl = date ('d F Y');

// $query = mysqli_query($con, "SELECT * FROM tabel_jenis_pelayanan");
/*$result = $con->query($sql);*/
include'../controller/Pasien.php';
$ctrl = new Pasien();
// $id=$_GET['id'];
$query = $ctrl->getJenisData($id);
?>
  
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Pasien</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	<row>
		<div class="card">
		<H2 align="center">Tambah Pasien</H2>
		<div class="card-body">
			<form class="row g-3" action="<?php echo $ctrl->simpanPasien() ?>" method="post" name="form1">   
			  <div class="col-md-12">
			    <label for="noPasien" class="form-label">Nomor Pasien</label>
			    <input type="text" class="form-control"  name="nomor_pasien" placeholder="" required>
			  </div>
			  <div class="col-md-12">
			    <label for="noPasien" class="form-label">Nama Pasien</label>
			    <input type="text" class="form-control"  name="nama_pasien" placeholder="" required>
			  </div>
			<div class="col-12">
			    <label for="tglLahir" class="form-label">Tanggal Lahir</label>
			    <input type="date" class="form-control"  name="tgl_lahir" placeholder="mm/dd/yyyy" required>
			  </div>
			  <div class="col-12">
			    <label for="jk" class="form-label">Jenis Kelamin</label><br>
			    <label><input type="radio" name="jenis_kelamin" value="Laki-Laki" required>Laki-Laki</label>
			    <label><input type="radio" name="jenis_kelamin" value="Perempuan" required>Perempuan</label>
			    <!-- <input type="text" class="form-control" id="jk" name="jk" placeholder="" required> -->
			  </div>
			  <div class="col-md-12">
			    <label for="umr" class="form-label">Umur</label>
			    <input type="text" class="form-control" id="umr" name="umur" required>
			  </div>
			  <div class="col-md-12">
			    <label for="diagnosa" class="form-label">Diagnosa Penyakit</label>
			    <input type="text" class="form-control" id="diganosa" name="diagnosa_penyakit" required>
			  </div>
			      <div class="col-md-12">
			    <label for="namaDokter" class="form-label">Nama Dokter</label>
			    <input type="text" class="form-control" id="namaDokter" name="nama_dokter" required>
			  </div>
			  <div class="col-md-12">
          <label for="jenisPelayanan" class="form-label">Jenis Pelayanan</label>
          <select id="jenisPelayanan" name="jenis_pelayanan" class="form-select" required> 
            
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
			    <button type="submit" class="btn btn-primary" name="simpan">Add</button>
			    <a href = "content.php" class="btn btn-danger">Cancel</a>
			  </div>
			  </div>
			</form>
		</div>
	</div>
</row>


			      
			    </select>
			 
			  
			</form>
		</div>
		</div>
	</row>
	</div>
	
</body>

<script src="../assets/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>