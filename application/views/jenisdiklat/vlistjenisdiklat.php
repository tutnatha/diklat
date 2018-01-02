<script type="text/javascript">
	function editjenisjabatan(kode){
		pageload("cjenisdiklat/edit/" + kode,"#script");		
	}
	
	function hapusjenisjabatan(kode){
		if (confirm("Anda yakin ingin menghapus data ini?")){
			pageload("cjenisdiklat/hapus/" + kode,"#table");
		}
	}
	


</script>
<table border="1" width="100%"  class="list">
<tr>
	<th width="50px">No</th>
    <th width="100px">Kode Jenis</th>
    <th>Jenis Diklat</th>
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
    	<td ><?php echo $data->KodeJenis; ?></td>
        <td ><?php echo $data->NamaJenis; ?></td>
		<td align="center">
       	<a href="javascript:void(0)" onClick="editjenisjabatan('<?php echo $data->KodeJenis; ?>')" title="Edit"><?php $this->auth->editbutton(); ?></a>
        <a href="javascript:void(0)" onClick="hapusjenisjabatan('<?php echo $data->KodeJenis; ?>')" title="Hapus"><?php $this->auth->deletebutton(); ?></a>
        
        
        </td>
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
