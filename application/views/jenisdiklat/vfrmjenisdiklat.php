<script type="text/javascript">
	$(document).ready(function(){
		
		
			
			$('#simpan').click(function(){
				
				if ($('#KodeJenis').val()==""){
					alert('Anda belum mengisi Kode Jenis');
					$('#KodeJenis').focus();
					return false;
				}
				if ($('#NamaJenis').val()==""){
					alert('Anda belum mengisi Jenis Diklat');
					$('#NamaJenis').focus();
					return false;
				}
				

				send_form_loading(document.frmpegawai,"cjenisdiklat/simpan","#table");

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
    	<td align="right">Kode Jenis :</td>
        <td><input type="text" id="KodeJenis" name="KodeJenis" size="10" /></td>
    </tr>    
	<tr>
    	<td align="right">Jenis Diklat :</td>
        <td><input type="text" id="NamaJenis" name="NamaJenis" size="50" /></td>
    </tr>
	
  
     <tr>
    	<td align="right"></td>
        <td><input type="button" name="simpan" id="simpan" value="Simpan" /></td>
    </tr>
</table>
</form>
</td></tr></table>