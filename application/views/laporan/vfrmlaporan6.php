<script type="text/javascript">
	$(document).ready(function(){
			$("#KodePerusahaan option[value='']").remove();
			$('#KodePerusahaan').append(new Option('-= Rekap =-', '', true, true));
	
			
	});
	


</script>
<form id="frmlaporan" name="frmlaporan" method="post" action="<?php echo base_url()?>index.php/claporan/tabel6" target="_blank">
<table width="100%">
<tr><td align="center">

<table width="700px" class="form">
	<tr>
    	<td align="right" width="30%">Nama Perusahaan :</td>
        <td><?php $this->mperkebunan->comboperusahaan('KodePerusahaan'); ?></td>
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