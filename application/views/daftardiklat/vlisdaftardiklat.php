<script type="text/javascript">
	function editpegawai(nip){
		pageload("cpegawai/edit/" + nip,"#script");		
	}
	
	function hapuspegawai(nip){
		if (confirm("Anda yakin ingin menghapus data ini?")){
			pageload("cpegawai/hapus/" + nip,"#table");
		}
	}
	


</script>


<?php
if ($hasil=="")
{
?>
	<font color="#FF0000">**** Tidak ada hasil pencarian ****</font>
    
<?php
}
else
{
?>


<table border="1" width="100%"  class="list">
<tr>
	<th>No</th>
    <th width="50px">NIP</th>
    <th>Nama </th>
    <th>Alamat</th>
    <th>No Telp</th>
    <th>Jabatan</th>
    <th>Unit Kerja</th>
    <th width="50px">Action</th>
</tr>

<?php 
$no=1;
foreach ($hasil as $data): ?>
	<tr>
    	<td align="center"><?php echo $no; ?></td>
    	<td ><?php echo $data->NIP; ?></td>
        <td ><?php echo $data->Nama; ?></td>
        <td ><?php echo $data->Alamat; ?></td>
        <td ><?php echo $data->NoTelp; ?></td>
        <td ><?php echo $data->NamaJabatan; ?></td>
        <td ><?php echo $data->UnitKerja; ?></td>
		<td align="center" width="100px">
       	[<a href="javascript:void(0)" onClick="editpegawai('<?php echo $data->NIP; ?>')">Edit</a>]
        [<a href="javascript:void(0)" onClick="hapuspegawai('<?php echo $data->NIP; ?>')">Hapus</a>]
        
        
        </td>
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
