<script type="text/javascript">
	$(document).ready(function(){
		
		
			
			$('#simpan').click(function(){
				
				if ($('#KodeJabatan').val()==""){
					alert('Anda belum mengisi Kode Jabatan');
					$('#NIP').focus();
					return false;
				}
				if ($('#NamaJabatan').val()==""){
					alert('Anda belum mengisi Nama Jabatan');
					$('#Nama').focus();
					return false;
				}
				

				send_form_loading(document.frmpegawai,"cjenisjabatan/simpan","#table");

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
    	<td align="right">Kode Jabatan :</td>
        <td><input type="text" id="KodeJabatan" name="KodeJabatan" size="10" /></td>
    </tr>    
	<tr>
    	<td align="right">Nama Jabatan :</td>
        <td><input type="text" id="NamaJabatan" name="NamaJabatan" size="50" /></td>
    </tr>
	
  
     <tr>
    	<td align="right"></td>
        <td><input type="button" name="simpan" id="simpan" value="Simpan" /></td>
    </tr>
</table>
</form>
</td></tr></table>