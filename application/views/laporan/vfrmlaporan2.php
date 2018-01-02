<script type="text/javascript">
	$(document).ready(function(){
			$("#KodeKomoditi option[value='']").remove();
			$('#KodeKomoditi').append(new Option('-= Rekap =-', '', true, true));
		
			
	});
	


	function clearform(){
		//$('#frmuser')[0].reset();	
		$('#KodeKabupaten').val('');
		$('#NamaKabupaten').val('');
		$('#Keterangan').val('');
		
	}
</script>
<form id="frmlaporan" name="frmlaporan" method="post" action="<?php echo base_url()?>index.php/claporan/tabel2" target="_blank">
<table width="100%">
<tr><td align="center">

<table width="700px" class="form">
	<tr>
    	<td align="right" width="30%">Komoditi :</td>
        <td><?php $this->mperkebunan->combokomoditi('KodeKomoditi'); ?></td>
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