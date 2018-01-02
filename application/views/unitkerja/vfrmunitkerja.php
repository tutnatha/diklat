<script type="text/javascript">
	$(document).ready(function(){
		
		
			
			$('#simpan').click(function(){
				
				if ($('#KodeUnitKerja').val()==""){
					alert('Anda belum mengisi Kode Unit Kerja');
					$('#KodeUnitKerja').focus();
					return false;
				}
				if ($('#NamaUnitKerja').val()==""){
					alert('Anda belum mengisi Nama Unit Kerja');
					$('#NamaUnitKerja').focus();
					return false;
				}
				

				send_form_loading(document.frmpegawai,"cunitkerja/simpan","#table");

			});
			
			
	});

	
	function clearform(){
		$('#frmpegawai')[0].reset();	
		
		
	}
</script>

<table width="100%">
<tr><td align="center">
<form name="frmpegawai" id="frmpegawai">
<table width="700px" class="form">

<tr>
    	<td align="right">Kode Unit Kerja :</td>
        <td><input type="text" id="KodeUnitKerja" name="KodeUnitKerja" size="10" /></td>
    </tr>    
	<tr>
    	<td align="right">Nama Unit Kerja :</td>
        <td><input type="text" id="NamaUnitKerja" name="NamaUnitKerja" size="50" /></td>
    </tr>
	
  
     <tr>
    	<td align="right"></td>
        <td><input type="button" name="simpan" id="simpan" value="Simpan" /></td>
    </tr>
</table>
</form>
</td></tr></table>