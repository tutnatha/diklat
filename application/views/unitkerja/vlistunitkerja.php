<script type="text/javascript">
	function editjenisjabatan(kode){
		pageload("cunitkerja/edit/" + kode,"#script");		
	}
	
	function hapusjenisjabatan(kode){
		if (confirm("Anda yakin ingin menghapus data ini?")){
			pageload("cunitkerja/hapus/" + kode,"#table");
		}
	}
	


</script>
<table border="1" width="100%"  class="list">
<tr>
	<th width="50px">No</th>
    <th width="100px">Kode Unit Kerja</th>
    <th>Nama Unit Kerja</th>
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
    	<td ><?php echo $data->KodeUnitKerja; ?></td>
        <td ><?php echo $data->NamaUnitKerja; ?></td>
		<td align="center" width="100px">
       	<a href="javascript:void(0)" onClick="editjenisjabatan('<?php echo $data->KodeUnitKerja; ?>')" title="Edit"><?php $this->auth->editbutton(); ?></a>
        <a href="javascript:void(0)" onClick="hapusjenisjabatan('<?php echo $data->KodeUnitKerja; ?>')" title="Hapus"><?php $this->auth->deletebutton(); ?></a>
        
        
        </td>
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
