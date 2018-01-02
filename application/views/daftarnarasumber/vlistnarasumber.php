<script type="text/javascript">
	function editpegawai(nip){
		pageload("cdaftarnarasumber/edit/" + nip,"#script");
		 $('#konten').slideDown();
		$('#table').fadeOut();
		$('#search').fadeOut();
		$('#headform').html('Edit Data Narasumber');		
	}
	
	function hapuspegawai(nip){
		if (confirm("Anda yakin ingin menghapus data ini?")){
			pageload("cdaftarnarasumber/hapus/" + nip,"#table");
		}
	}
	


</script>
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
    <th width="75px">Action</th>
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
$no=$offset+1;
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
		<td align="center" width="100px">
       	<a href="javascript:void(0)" onClick="editpegawai('<?php echo $data->NIP; ?>')"><?php $this->auth->editbutton(); ?></a>
        <a href="javascript:void(0)" onClick="hapuspegawai('<?php echo $data->NIP; ?>')"><?php $this->auth->deletebutton(); ?></a>
        
        
        </td>
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
<div id="paginasi">
	<?php $this->auth->pagination($url, $limit, $total, $divresult, $offset,  $namaform); ?>
</div>