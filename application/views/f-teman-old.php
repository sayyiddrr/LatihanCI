<form name="frm-kirim" method="POST" action="index.php">
	Nama <input type="text" name="nama" /> </br>
	Alamat <textarea type="text" name="alamat"> </textarea></br>
	Agama <select name="agama">
		<option value="1">Islam</option>
		<option value="2">kristen</option>
		<option value="3">hindu</option>
		<option value="4">buda</option>
	</select>
	Tanggal Lahir <input type="date" name="tgl_lahir" /> </br>
	No Handphone <input type="number" name="no_hp" /> </br>

	<input type="submit" name="kirim" value="simpan_data" /> </br>

</form>