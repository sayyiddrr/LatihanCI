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
			var idTeman = $(this).attr('idTeman');
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>index.php/teman/DeleteData",
				data: {'idTeman':idTeman},
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
						$('#divListTeman').html(dt.hasil);
					}
				}
			});
		}
	});


	$(document).on("click",".procEdit",function() {
		var idTeman = $(this).attr('idTeman');
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>index.php/teman/GetData",
			data: {'idTeman':idTeman},
			dataType: "json",
			beforeSend: function() {
			
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			},
			success: function(dt) {
				$("input[name=id").val(dt.hasil[0].IDTeman);
				$("input[name=nama").val(dt.hasil[0].Nama);
				$("select[name=agama").val(dt.hasil[0].Agama);
				$("textarea[name=alamat").val(dt.hasil[0].Alamat);
				$("input[name=tgl_lahir").val(dt.hasil[0].TglLahir);
				$("input[name=hp").val(dt.hasil[0].HP);

				// $('.id_100 option[value=val2]').attr('selected','selected');
			}
		});
	});

    $('#form-data').on("submit", function(e) {
      $.ajax({
        type: "POST",
        url: "<?=base_url()?>index.php/teman/SaveData",
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
				$('#divListTeman').html(dt.hasil);
			}
        }
      });
      return false;
    });
  });
</script>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Data Teman</h1>
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
				<h6 class="m-0 font-weight-bold text-primary">Data Teman</h6>
				<div class="dropdown no-arrow">
					
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body">			

				<form class='user' name='frm-kirim' id='form-data' method='POST'>
					<div class="form-group">
						Nama <input type='text' class="form-control form-control-user" name='nama' />
						<input type='hidden' name='id' value='' />
					</div>

					<div class="form-group">
						Alamat <textarea class="form-control form-control-user" name='alamat'></textarea>
					</div> 
					<div class="form-group">
						Agama <select name='agama' class="form-control form-control-user">
							<option value='1'>Islam</option>
							<option value='2'>Kristen Katolik</option>
							<option value='3'>Kristen Protestan</option>
							<option value='4'>Hindu</option>
							<option value='5'>Budha</option>
					</select> 
					</div>
					<div class="form-group">
						Tanggal Lahir <input type='date' name='tgl_lahir' class="form-control form-control-user" />
					</div>
					<div class="form-group">
						No Handphone <input type='text' name='hp' class="form-control form-control-user"/>
					</div>

				<input type='submit'class="btn btn-primary btn-user btn-block" name='kirim' value='Simpan Data' />

				</form>
			</div>
		</div>


		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div
				class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">List Data Teman</h6>
				<div class="dropdown no-arrow">
					
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body" id="divListTeman">			

  				<?=$this->load->view('f-list-teman', array(), true)?>
				
			</div>
		</div>
	</div>

	
</div>