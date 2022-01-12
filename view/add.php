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
// $query = $ctrl->getJenisData($id);
?>
     
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Pasien</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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
					type	: 'GET',
					url		: 'api.php', //memangggil controller/function
					async	: false,
					dataType	: 'json',
					success	: function(data){
						console.log(data);
						var html = '';
						var i;
						var no;
						for(i=0; i<data.length; i++){ //looping atau pengulangan
							no = i + 1;
							html +=
							'<option value="'+data[i].id+'">'+data[i].jenis_pelayanan+'</option>';

						} //akhir dari looping

						$('#jenisPelayanan').html(html); //mengirim data
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
			  <div class="col-md-6">
          <label for="jenisPelayanan" class="form-label">Jenis Pelayanan</label>
          <!-- <option selected value="" >Silahkan pilih</option> -->
          <select id="jenisPelayanan" name="jenis_pelayanan" class="form-select" required> 
          </select>

          <div class="col-md-6">
          	<a href="#" class="btn-primary" data-bs-toggle="modal" data-bs-target="#addjenis" title="Tambah"><i class="bi bi-plus"></i></a>
          	
          </div>

   <br>
   <br> 

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

	<div class="example-modal">
    <div id="addjenis" class="modal fade" role="dialog" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
        	<form class="row g-3" action="#" method="POST" id="formJenisPelayanan">
          <div class="modal-header">
            <!-- <button type="button" class ="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button> -->
            <h3 class="modal-title">Tambah Jenis Pelayanan</h3>
          </div>

          <!-- <form class="row g-3" action="<?php $ctrl->hapusPasien()?>" method="post" name="form1"> -->
          <div class="modal-body">
          	<Label for="jenisPelayanan" class="form-label">Pembuat</Label>
              <input type="text" class="form-control" id="jurusanInput" name="id" placeholder="Jenis....">
          </div>
          <div class="modal-footer">
           <button type="submit" class="btn btn-primary btn-block" id="simpan">Simpan</button> 
           <button type="button" class="btn btn-danger full left" data-bs-dismiss="modal">Cancel</button>
          </div>
          </form>
          </div>
        </div>
      </div>
     </div>


	
</body>

<script src="../assets/js/bootstrap.min.js"></script>

<script>
  $('#formJenisPelayanan').on('submit',function(e){
    e.preventDefault();
    let Pelayanan = $("#jurusanInput").val();

    $.ajax({
      url: 'api.php',
      type: 'POST',
      data: {
        pelayanan: Pelayanan,
      },
      dataType: 'json',
      success: function(data){
      	alert	("Berhasil");
        location.reload();
      },
      error: function(data){
        console.log(data);
      }
    });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</html>