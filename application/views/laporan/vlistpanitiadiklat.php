<script type="text/javascript">

	$(document).ready(function(e) {
		$('#cetakdaftarpanitia').click(function(e) {
            var kodecetak = "<?php echo $KodeDiklat; ?>";
			windowload("claporan/cetakpanitiadiklat/" + kodecetak +"/html","#script");	
        });
		
		$('#exportexcel').click(function(e) {
            var kodecetak = "<?php echo $KodeDiklat; ?>";
			windowload("claporan/cetakpanitiadiklat/" + kodecetak +"/excel","#script");	
        });
    });
	

</script>

<p align="center">
<input type="button" id="cetakdaftarpanitia" name="cetakdaftarpanitia" value="Cetak Daftar Panitia">
<input type="button" id="exportexcel" name="exportexcel" value="Export Ke Excel">

</p>
<table border="1" width="100%"  class="list">
<tr>
	<th width="50px">No</th>
    <th width="200px">NIP</th>
    <th>Nama</th>
    <th width="200px">Jabatan Kepanitiaan</th>
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
		
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
