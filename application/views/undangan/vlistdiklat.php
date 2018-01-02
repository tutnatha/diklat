<script type="text/javascript">
	function daftardiklat(kode){
		$('#headform').html('Input Kode Undangan Diklat');
		pageload("cundangan/showundangan/" + kode,"#konten");		
	}
	
	


</script>
<table border="1" width="100%"  class="list">
<tr>
	<th  width="30px">No</th>
   
    <th>Daftar Diklat</th>
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
        <td align="left">
        <table width="100%" border="1" class="list">
            <tr>
           	  <td width="150px" align="right"><b>Nama Diklat :</b></td>
            	<td ><?php echo $data->NamaDiklat; ?></td>
          </tr>
            <tr>
            	<td align="right"><b>Tanggal :</b></td>
            	<td ><?php echo $this->auth->convertdate($data->DariTanggal,''); ?> - <?php echo $this->auth->convertdate($data->SampaiTanggal,''); ?></td>
          </tr>
             <tr>
             	<td align="right"><b>Tempat :</b></td>	
                <td ><?php echo $data->Tempat; ?></td>
             </tr>
             <tr>
             	<td align="right"><b>Tgl Pendaftaran :</b></td>
            	<td ><?php echo $this->auth->convertdate($data->TglDaftarDari,''); ?> - <?php echo $this->auth->convertdate($data->TglDaftarSampai,''); ?>						</td>
             </tr>
             <tr>
             	<td align="right"><b>Kapasitas Peserta :</b></td>	
               <td ><?php echo $data->JmlPeserta; ?> orang</td>
             </tr>
             <tr>
             	<td align="right"><b>Narasumber :</b></td>	
               <td ><?php echo $data->Narasumber; ?></td>
             </tr>
 			<tr>
             	<td align="right"><b>Keterangan :</b></td>	
               <td ><?php echo $data->Keterangan; ?></td>
             </tr>             
 			<tr>
                <td colspan="2" align="right"></b>
                <a href="javascript:void(0)" onClick="daftardiklat('<?php echo $data->KodeDiklat; ?>')" title="Daftar"><input type="button" id="daftardiklat" name="daftardiklat" value="Isi Formulir Pendaftaran"></a>
              </td>	
            	
          </tr>
            
            
        </table>
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
