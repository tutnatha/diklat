<script type="text/javascript">
	function edituser(username){
		pageload("cusermanagement/edituser/"+username,'#script');
	}
	
	function hapususer(username){
		if (confirm("Anda yakin ingin menghapus data ini?")){
			pageload("cusermanagement/hapususer/"+username,"#table");
		}
	}
	


</script>
<table border="1" width="100%"  class="list">
<tr>
	<th width="30px">No</th>
    <th width="200px">Username</th>
    <th width="200px">Level</th>
    <th>Unit Kerja</th>
    <th  width="75px">Action</th>
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
    	<td ><?php echo $data->Username; ?></td>
        <td ><?php echo $data->Level; ?></td>
        <td ><?php echo $data->NamaUnitKerja; ?></td>
		<td align="center">
       	<a href="javascript:void(0)" onClick="edituser('<?php echo $data->Username; ?>')" title="Edit"><?php $this->auth->editbutton(); ?></a>
        <a href="javascript:void(0)" onClick="hapususer('<?php echo $data->Username; ?>')" title="Hapus"><?php $this->auth->deletebutton(); ?></a>
        
        
        </td>
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
