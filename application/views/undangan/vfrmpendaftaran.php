<script type="text/javascript">
	$(document).ready(function(){
		
		
			
			$('#simpan').click(function(){
				
				if ($('#NIP').val()==""){
					alert('Anda belum mengisi NUPTK atau PTK ID atau KTP');
					$('#NIP').focus();
					return false;
				}
				if ($('#Nama').val()==""){
					alert('Anda belum mengisi Nama');
					$('#Nama').focus();
					return false;
				}
				

				//send_form_loading(document.frmpegawai,"cundangan/simpan","#table");

			});
			
			
	});

	
	function clearform(){
		$('#frmpegawai')[0].reset();	
		
		
	}
</script>

<table width="100%">
<tr><td align="center">
<form action="<?php echo base_url() ?>index.php/cundangan/simpan" method="post" enctype="multipart/form-data" name="frmpegawai" target="_blank" id="frmpegawai">
<input type="hidden" id="KodeDiklat" name="KodeDiklat" value="<?php echo $KodeDiklat; ?>">
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
    	<td align="right">Alamat :</td>
        <td><input type="text" id="Alamat" name="Alamat" size="50" /></td>
    </tr>    
	<tr>
    	<td align="right">Nomor HP :</td>
        <td><input type="text" id="NomorHP" name="NomorHP" size="20" />, Telp. <input type="text" id="TelpRumah" name="TelpRumah" size="20" /></td>
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
    	<td align="right">Pangkat:</td>
        <td><input type="text" id="Pangkat" name="Pangkat" size="50" /></td>
    </tr>  
   	<tr>
    	<td align="right">Golongan:</td>
        <td><input type="text" id="Golongan" name="Golongan" size="50" /></td>
    </tr> 
   	<tr>
    	<td align="right">Kelas/Mapel yang diampu:</td>
        <td><input type="text" id="Mapel" name="Mapel" size="50" /></td>
    </tr>   
   	<tr>
    	<td align="right">NUPTK/PTK ID:</td>
        <td><input type="text" id="NUPTK" name="NUPTK" size="50" /></td>
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
        <td><input type="text" id="NoTelp" name="NoTelp" size="20" />, FAX. <input type="text" id="Fax" name="Fax" size="20" /></td>
    </tr>   
	<tr>
    	<td align="right">Jabatan :</td>
        <td><input type="text" id="Jabatan" name="Jabatan" size="50" /></td>
    </tr>
<!--<tr>
      <td bgcolor="#D8D8D8" align="right">Password :</td>
      <td bgcolor="#D8D8D8"><input type="Password" name="Password" id="Password"></td>
    </tr>
    <tr>
      <td bgcolor="#D8D8D8" align="right">Ketik Ulang Password :</td>
      <td bgcolor="#D8D8D8"><input type="Password" name="Password1" id="Password1"></td>
    </tr>    -->               
     <tr>
    	<td align="right" valign="top">Foto :</td>
        <td><input type="file" name="foto" id="foto"><br>
          <em><font color="red" size="1">Phas foto berukuran 3x4 (210px X 280px)</font></em></td>
    </tr>
     <tr>
       <td align="right"></td>
       <td><input type="submit" name="simpan" id="simpan" value="Simpan" /></td>
     </tr>
</table>
</form>
</td></tr></table>