<script>
$(document).ready(function() {

	var table = $('#SearchResultTable').DataTable({
		"bProcessing": true,
		"bServerSide": true,
		"bRetrieve": true,
		"bDestroy": true,
		"iDisplayLength": 50,
		"sAjaxSource": "<?=base_url()?>mahasiswa/loadData",
		"sServerMethod": "POST",
		"fnServerParams": function (aoData) {
		  aoData.push({ "name": "prodi", "value": $("#prodi").val() });
		  aoData.push({ "name": "angkatan", "value": $("#angkatan").val() });
		},
		"bFilter": true,
		"bSort": false  ,
		  "searching": false,
		"sPaginationType": "full_numbers",
		"aoColumns": [
				{ "mData": "no", "sWidth": "30px", "sClass": "text-left" },
				{ "mData": "mhs_nim", "sWidth": "110px", "sClass": "text-center" },
				{ "mData": "mhs_nm", "sClass": "text-left" },
				{ "mData": "NamaProgdi", "sWidth": "150px", "sClass": "text-center" },
				{ "mData": "StatusAkademik", "sWidth": "90px", "sClass": "text-center" }
		]
	});

	$("#prodi, #angkatan").on("change", function () {
		$('#SearchResultTable').DataTable().draw();
			  $("#divInfo").show();
			  setInterval(function(){
				  $("#divInfo").hide();
			  }, 1000);
	});
});
</script>

<!-- /main-header -->

<div class="panel panel-default table-responsive">

    <div class="padding-md" style="padding-top: 1px !important;">
	<br/>
    <form class="form-horizontal" id="call-form">

      <div class="form-group">

        <label for="judul" class="col-lg-2 control-label">Program Studi</label>

        <div class="col-lg-8">
          <select class="form-control" name='prodi' id="prodi" >
            <?php
            echo"<option value='' >---Pilih Program Studi---</option>";
            foreach($getProdi as $r){
              echo"<option value='$r->IDProgdi'>$r->NamaProgdi</option>";
            }
            ?>
          </select>
        </div>
      </div>

      <div class="form-group" >
        <label for="judul" class="col-lg-2 control-label">Angkatan</label>
        <div class="col-lg-8">
          <select class="form-control" name='angkatan' id="angkatan" >
            <?php
            for($th=date('Y');$th>=date('Y')-5;$th--){
              echo"<option value='$th' >$th</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <hr/>
    </form>

			<div class="alert alert-info" style='font-size:18;display:none;' id='divInfo'>
				<strong><i class="fa fa-check fa-lg text-default"></i> Sukses </strong> Data berhasil di-load
			</div>

    <div class="form-group">
			<div class="col-lg-12" style="margin-bottom:15px;">
				<table class="table table-bordered table-condensed table-hover table-striped table-vertical-center" id="SearchResultTable">
				<thead>
					<tr class='bg-primary'>
						<th>No</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Program Studi</th>
						<th>Status Mahasiswa</th>
					</tr>
				</thead>
					<tbody>
					</tbody>
				</table>
			</div><!-- /.col -->
		</div><!-- /form-group -->
        </div>

</div><!-- /panel -->

