<script type="text/javascript">

	$(document).ready(function(e) {
		$('#cetakdaftarpeserta').click(function(e) {
            var kodecetak = "<?php echo $KodeDiklat; ?>";
			windowload("claporan/cetakpesertadiklat/" + kodecetak +"/html","#script");	
        });
		
		$('#exportexcelpeserta').click(function(e) {
            var kodecetak = "<?php echo $KodeDiklat; ?>";
			windowload("claporan/cetakpesertadiklat/" + kodecetak +"/excel","#script");	
        });
		
		$('#cetakbiodatapeserta').click(function(e) {
            var kodecetak = "<?php echo $KodeDiklat; ?>";
			windowload("claporan/cetakpesertadiklat/" + kodecetak +"/biodata","#script");	
        });
		
    });
	

</script>

<p align="center">
<input type="button" id="cetakbiodatapeserta" name="cetakbiodatapeserta" value="Cetak Bioadata Peserta">
<input type="button" id="cetakdaftarpeserta" name="cetakdaftarpeserta" value="Cetak Daftar Peserta">
<input type="button" id="exportexcelpeserta" name="exportexcelpeserta" value="Export Ke Excel">

</p>
<table border="1" width="100%"  class="list">
<tr>
	<th>No</th>
    <th width="150px">NUPTK/PTK ID/KTP</th>
    <th>Nama </th>
    <th>No HP</th>
    <th>Jabatan</th>
    <th>Instansi</th>
    <th>Provinsi</th>
    <th>Kabupaten</th>
    <th width="100px">Status Pendaftaran</th>
</tr>
<?php
if ($datalist=="")
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
foreach ($datalist as $data): ?>
	<tr>
    	<td align="center"><?php echo $no; ?></td>
    	<td ><?php echo $data->NIP; ?></td>
        <td ><?php echo $data->Nama; ?></td>
        <td ><?php echo $data->NomorHP; ?></td>
        <td ><?php echo $data->Jabatan; ?></td>
        <td ><?php echo $data->NamaInstansi; ?></td>
        <td ><?php echo $data->Provinsi; ?></td>
        <td ><?php echo $data->Kabupaten; ?></td>
        <td ><?php echo $data->StatusPendaftaran; ?></td>
		
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
