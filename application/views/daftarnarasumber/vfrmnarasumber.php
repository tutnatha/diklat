<script type="text/javascript">
	$(document).ready(function(){
		
		
			
			$('#simpan').click(function(){
				
				if ($('#NIP').val()==""){
					alert('Anda belum mengisi NUPTK/PTK ID/KTP');
					$('#NIP').focus();
					return false;
				}
				if ($('#Nama').val()==""){
					alert('Anda belum mengisi Nama');
					$('#Nama').focus();
					return false;
				}
				

				send_form_loading(document.frmpegawai,"cdaftarnarasumber/simpan","#table");
				$('#konten').slideUp();
				$('#table').fadeIn();
				$('#search').fadeIn();
				$('#headform').html('Daftar Narasumber');

			});
			
			
	});
	
	$('#showdaftar').click(function(e) {
        $('#konten').slideUp();
		$('#table').fadeIn();
		$('#search').fadeIn();
		$('#headform').html('Daftar Narasumber');
    });
	
	$('#clearfr').click(function(e) {
        clearform();
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
    	<td align="right">Nama  :</td>
        <td><input type="text" id="Nama" name="Nama" size="50" /></td>
    </tr>
	<tr>
    	<td align="right">NUPTK/PTK ID/KTP :</td>
        <td><input type="text" id="NIP" name="NIP" size="30" /></td>
    </tr>    
	<tr>
    	<td align="right">Tempat/Tgl Lahir :</td>
        <td><input type="text" id="TempatLahir" name="TempatLahir" size="20" />, 
        	<?php $this->auth->inputtgl('TglLahir',10); ?>
        </td>
    </tr>      
	<tr>
    	<td align="right">Nomor HP :</td>
        <td><input type="text" id="NomorHP" name="NomorHP" size="30" /></td>
    </tr>
	<tr>
    	<td align="right">Email :</td>
        <td><input type="text" id="Email" name="Email" size="20" /></td>
    </tr>    
    	<tr>
    	<td align="right">Jenis Kelamin :</td>
        <td>
          <select name="JenisKelamin" id="JenisKelamin">
            <option value="Laki laki">Laki laki</option>
            <option value="Perempuan">Perempuan</option>
          </select></td>
    </tr> 
   	<tr>
    	<td align="right">Pendidikan Terakhir:</td>
        <td><input type="text" id="PendidikanTerakhir" name="PendidikanTerakhir" size="50" /></td>
    </tr>  
    	<tr>
    	<td align="right">No NPWP :</td>
        <td><input type="text" id="NPWP" name="NPWP" size="20" /></td>
    </tr>       
	<tr>
    	<td align="right">Nama Instansi :</td>
        <td><input type="text" id="NamaInstansi" name="NamaInstansi" size="50" /></td>
    </tr> 
	<tr>
    	<td align="right">Alamat Instansi :</td>
        <td><input type="text" id="AlamatInstansi" name="AlamatInstansi" size="50" /></td>
    </tr>  
	<tr>
    	<td align="right">Provinsi :</td>
        <td><input type="text" id="Provinsi" name="Provinsi" size="30" /></td>
    </tr>       
	<tr>
    	<td align="right">Kabupaten :</td>
        <td><input type="text" id="Kabupaten" name="Kabupaten" size="30" /></td>
    </tr>   
	<tr>
    	<td align="right">No Telp :</td>
        <td><input type="text" id="NoTelp" name="NoTelp" size="30" /></td>
    </tr>   
	<tr>
    	<td align="right">Jabatan :</td>
        <td><input type="text" id="Jabatan" name="Jabatan" size="50" /></td>
    </tr> 

<tr>
    	<td align="right">Keterangan :</td>
        <td><input type="text" id="Keterangan" name="Keterangan" size="70" /></td>
    </tr>                
     <tr>
    	<td align="right"></td>
        <td><input type="button" name="simpan" id="simpan" value="Simpan" />
        <input type="button" name="clearfr" id="clearfr" value="Reset" />
        <input type="button" name="showdaftar" id="showdaftar" value="Tampilkan Daftar Narasumber" />
        </td>
    </tr>
</table>
</form>
</td></tr></table>