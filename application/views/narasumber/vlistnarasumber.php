<table border="1" width="100%"  class="list">
<tr>
	<th width="50px">No</th>
    <th width="200px">NUPTK/PTK ID/KTP</th>
    <th>Nama</th>
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
		
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
