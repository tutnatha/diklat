<script type="text/javascript">
	function editdiklat(kode,unitkerja){
		var level = "<?php echo $this->session->userdata('level'); ?>";
		if(level == "PPK"){
			$("#UnitKerja option[value='Kasubbag Umum']").remove();
			$('#UnitKerja').append('<option value="Kasubbag Umum">Kasubbag Umum</option>');
			

		}
		pageload("cdaftardiklat/edit/" + kode,"#script");	
		$('#konten').slideDown();
		$('#table').fadeOut();	
		$('#search').fadeOut();	
		$('#headform').html('Edit Diklat');
		
	}
	
	function hapusdiklat(kode){
		if (confirm("Anda yakin ingin menghapus data ini?")){
			pageload("cdaftardiklat/hapus/" + kode,"#table");
			 
		}
	}
	
	


</script>


<?php
if ($datalist=="")
{
?>
<table border="1" width="100%"  class="list">
<tr>
	<th  width="30px">No</th>
    <th>Kode Diklat</th>
    <th>Nama Diklat</th>
    <th>Tanggal</th>
    <th>Tempat</th>
    <th>Maks Peserta</th>
    <th>Jml Panitia</th>
    <th>Fas LPMP</th>
    <th>Kode Undangan</th>
    <th width="100px">Status</th>
    <th width="75px">Action</th>
</tr>
	<tr><td align="center" colspan="11"><font color="#FF0000"><br><br>**** Tidak ada hasil pencarian ****<br><br><br><br></font></td>
    </tr></table>
    
<?php
}
else
{
?>

<table border="1" width="100%"  class="list">
<tr>
	<th  width="30px">No</th>
    <th>Kode Diklat</th>
    <th>Nama Diklat</th>
    <th>Unit Kerja</th>
    <th>Tanggal</th>
    <th>Tempat</th>
    <th>Maks Peserta</th>
    <th>Jml Panitia</th>
    <th>Fas LPMP</th>
    <th>Kode Undangan</th>
    <th width="100px">Status</th>
    <th width="75px">Action</th>
</tr>

<?php 
$no=$offset +1;
foreach ($datalist as $data): ?>
	<tr>
    	<td align="center"><?php echo $no; ?></td>
    	
        <td ><?php echo $data->KodeDiklat; ?></td>
        <td ><?php echo $data->NamaDiklat; ?></td>
        <td ><?php echo $this->mdiklat->detailunitkerja($data->UnitKerja); ?></td>
        <td ><?php echo $this->auth->convertdate($data->DariTanggal,'short'); ?> - <?php echo $this->auth->convertdate($data->SampaiTanggal,'short'); ?></td>
        <td ><?php echo $data->Tempat; ?></td>
        <td align="center" ><?php echo $data->JmlPeserta; ?></td>
        <td align="center" ><?php echo $data->JmlPanitia; ?></td>
        <td align="center" ><?php echo $data->FasilitasLPMP; ?></td>
        <td ><?php echo $data->KodeUndangan; ?></td>
        <td >
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td align="center" bgcolor="<?php echo $data->Status[1]; ?>" title="Catatan Kabag Umum : <?php echo $data->Catatan1; ?>">1</td>
                <td align="center" bgcolor="<?php echo $data->Status[2]; ?>" title="Catatan PPK : <?php echo $data->Catatan2; ?>">2</td>
                <td align="center" bgcolor="<?php echo $data->Status[3]; ?>" title="Catatan Kepala : <?php echo $data->Catatan3; ?>">3</td>
                <td align="center" bgcolor="<?php echo $data->Status[4]; ?>" title="Catatan Panitia">4</td>
                <td align="center" bgcolor="<?php echo $data->Status[5]; ?>" title="Catatan PPK : <?php echo $data->Catatan4; ?>">5</td>
                <td align="center" bgcolor="<?php echo $data->Status[6]; ?>" title="Catatan Kepala : <?php echo $data->Catatan5; ?>">6</td>
              </tr>
            </tbody>
        </table></td>
		<td align="center" >
        <?php if($this->session->userdata('level')=="PPK"){ ?>
        
       	<a href="javascript:void(0)" onClick="editdiklat('<?php echo $data->KodeDiklat; ?>','<?php echo $data->UnitKerja; ?>')" title="Edit"><?php $this->auth->editbutton(); ?></a>
        <a href="javascript:void(0)" onClick="hapusdiklat('<?php echo $data->KodeDiklat; ?>')" title="Hapus"><?php $this->auth->deletebutton(); ?></a>
        
        <?php }else{ 
					if($this->session->userdata('unitkerja')==$data->UnitKerja){
			?>
        		<a href="javascript:void(0)" onClick="editdiklat('<?php echo $data->KodeDiklat; ?>','<?php echo $data->UnitKerja; ?>')" title="Edit"><?php $this->auth->editbutton(); ?></a>
       			 <a href="javascript:void(0)" onClick="hapusdiklat('<?php echo $data->KodeDiklat; ?>')" title="Hapus"><?php $this->auth->deletebutton(); ?></a>
            
        <?php }
		} ?>
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