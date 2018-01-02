<script type="text/javascript">
	$(document).ready(function(){
			$("#KodeKabupaten option[value='']").remove();
			$('#KodeKabupaten').append(new Option('-= Rekap =-', '', true, true));
		
			
	});
	


	function clearform(){
		//$('#frmuser')[0].reset();	
		$('#KodeKabupaten').val('');
		$('#NamaKabupaten').val('');
		$('#Keterangan').val('');
		
	}
</script>
<form id="frmlaporan" name="frmlaporan" method="post" action="<?php echo base_url()?>index.php/claporan/tabel1" target="_blank">
<table width="100%">
<tr><td align="center">

<table width="700px" class="form">
	<tr>
    	<td align="right" width="30%">Kabupaten :</td>
        <td><?php $this->mperkebunan->combokabupaten('KodeKabupaten'); ?></td>
    </tr>
   	<tr>
    	<td align="right" width="30%">Tahun :</td>
        <td><input type="text" id="Tahun" name="Tahun" size="5" /></td>
    </tr>
     <tr>
    	<td align="right"></td>
        <td><input type="submit" name="cetak" id="cetak" value="Tampilkan" /></td>
    </tr>
</table>
  
</td></tr></table>
</form>