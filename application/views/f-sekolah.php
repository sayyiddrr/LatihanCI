<script>
  $(document).ready(function() {
	$('#idNamaMK').on('click', function(){
		alert("Halloo .... ");

	});

	$('.cUniv').on('click', function(){
		alert("Holaaa .... ");

	});

	$(document).on("click",".procAdd",function() {
		$("#divForm").show();
	});
	$(document).on("click",".procDelete",function() {
		if (confirm("Anda yakin ingin menghapus data ini?") == true) {
			var idSekolah = $(this).attr('idSekolah');
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>index.php/sekolah/DeleteData",
				data: {'idSekolah':idSekolah},
				dataType: "json",
				beforeSend: function() {
				
				},
				error: function(jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
				},
				success: function(dt) {
					if(dt.status=='ERROR'){
						alert(dt.pesan);
					}else{
						alert("Data berhasil dihapus");
						$('#divListSekolah').html(dt.hasil);
					}
				}
			});
		}
	});


	$(document).on("click",".procEdit",function() {
		var idSekolah = $(this).attr('idSekolah');
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>index.php/sekolah/GetData",
			data: {'idSekolah':idSekolah},
			dataType: "json",
			beforeSend: function() {
			
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			},
			success: function(dt) {
				$("input[name=id").val(dt.hasil[0].IDSekolah);
				$("input[name=namasekolah").val(dt.hasil[0].NamaSekolah);
				$("textarea[name=alamat").val(dt.hasil[0].Alamat);
				$("input[name=notelp").val(dt.hasil[0].NoTelp);

				// $('.id_100 option[value=val2]').attr('selected','selected');
			}
		});
	});

    $('#form-data').on("submit", function(e) {
      $.ajax({
        type: "POST",
        url: "<?=base_url()?>index.php/sekolah/SaveData",
        data: $(e.target).serialize(),
        dataType: "json",
        beforeSend: function() {
          
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
        },
        success: function(dt) {
			if(dt.status=='ERROR'){
				alert(dt.pesan);
			}else{
				alert("Data berhasil disimpan");
				$('#form-data').trigger("reset");
				$('#divListSekolah').html(dt.hasil);
			}
        }
      });
      return false;
    });
  });
</script>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Data Sekolah</h1>
	<span class="btn btn-primary btn-icon-split btn-sm procAdd">
		<span class="icon text-white-50">
			<i class="fas fa-flag"></i>
		</span>
		<span class="text">Tambah Data</span>
	</span>
</div>

<div class="row">
	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4" id='divForm' style='display:none;'>
			<!-- Card Header - Dropdown -->
			<div
				class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Data Sekolah</h6>
				<div class="dropdown no-arrow">
					
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body">			

				<form class='user' name='frm-kirim' id='form-data' method='POST'>
					<div class="form-group">
						Nama Sekolah<input type='text' class="form-control form-control-user" name='namasekolah' />
						<input type='hidden' name='id' value='' />
					</div>

					<div class="form-group">
						Alamat Sekolah<textarea class="form-control form-control-user" name='alamat'></textarea>
					</div> 
					<div class="form-group">
						No Telepon <input type='text' name='notelp' class="form-control form-control-user"/>
					</div>

				<input type='submit'class="btn btn-primary btn-user btn-block" name='kirim' value='Simpan Data' />

				</form>
			</div>
		</div>


		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div
				class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">List Data Sekolah</h6>
				<div class="dropdown no-arrow">
					
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body" id="divListSekolah">			

  				<?=$this->load->view('f-list-sekolah', array(), true)?>
				
			</div>
		</div>
	</div>

	
</div>