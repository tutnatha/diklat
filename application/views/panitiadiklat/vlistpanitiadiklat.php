<script type="text/javascript">
	function editjenisjabatan(kode){
		pageload("cjenisjabatan/edit/" + kode,"#script");		
	}
	
	function hapusjenisjabatan(kode){
		if (confirm("Anda yakin ingin menghapus data ini?")){
			pageload("cjenisjabatan/hapus/" + kode,"#table");
		}
	}
	
	function setpwd(nip){
		var kodediklat = $('#KodeDiklat').val();
		tplpopup(500,200, 25, 0);
		//$('#popuphead').html('Pilih Soal Untuk Ujian');
		var kodediklat = $('#KodeDiklat').val();
		$('#popuphead').html("<font size='4'> <b>Set Password Panitia Diklat</font></b>");
		pageload('cpanitiadiklat/showformpassword/'+kodediklat+'/'+nip,'#popup');
	
	}


</script>
<table border="1" width="100%"  class="list">
<tr>
	<th width="50px">No</th>
    <th width="200px">NIP</th>
    <th>Nama</th>
    <th width="200px">Jabatan Kepanitiaan</th>
    <th width="100px">Set Password</th>
</tr>

<?php
if ($hasil=="")
{
?>
	<tr><td align="center" colspan="11"><font color="#FF0000"><br><br>**** Tidak ada data ****<br><br><br><br></font></td>
    </tr>
    
<?php
}
else
{
?>




<?php 
$no=1;
foreach ($hasil as $data): ?>
	<tr>
    	<td align="center"><?php echo $no; ?></td>
    	<td ><?php echo $data->NIP; ?></td>
        <td ><?php echo $data->Nama; ?></td>
        <td ><?php echo $data->NamaJabatan; ?></td>
        <td ><input type="button" id="setpwd" value="Set Password" onClick="setpwd('<?php echo $data->NIP; ?>');"></td>
		
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
