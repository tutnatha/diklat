<script type="text/javascript">
	function editjenisjabatan(kode){
		pageload("cjenisjabatanpanitia/edit/" + kode,"#script");		
	}
	
	function hapusjenisjabatan(kode){
		if (confirm("Anda yakin ingin menghapus data ini?")){
			pageload("cjenisjabatanpanitia/hapus/" + kode,"#table");
		}
	}
	


</script>
<table border="1" width="100%"  class="list">
<tr>
	<th width="50px">No</th>
    <th width="100px">Kode Jabatan</th>
    <th>Nama Jabatan</th>
    <th width="75px">Action</th>
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
    	<td ><?php echo $data->KodeJabatan; ?></td>
        <td ><?php echo $data->NamaJabatan; ?></td>
		<td align="center" width="100px">
       	<a href="javascript:void(0)" onClick="editjenisjabatan('<?php echo $data->KodeJabatan; ?>')"  title="Edit"><?php $this->auth->editbutton(); ?></a>
        <a href="javascript:void(0)" onClick="hapusjenisjabatan('<?php echo $data->KodeJabatan; ?>')" title="Hapus"><?php $this->auth->deletebutton(); ?></a>
        
        
        </td>
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
