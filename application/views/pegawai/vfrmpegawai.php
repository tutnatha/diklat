<script type="text/javascript">
	$(document).ready(function(){
		
		
			
			$('#simpan').click(function(){
				
				if ($('#NIP').val()==""){
					alert('Anda belum mengisi NIP');
					$('#NIP').focus();
					return false;
				}
				if ($('#Nama').val()==""){
					alert('Anda belum mengisi Nama');
					$('#Nama').focus();
					return false;
				}
				

				send_form_loading(document.frmpegawai,"cpegawai/simpan","#table");
				$('#konten').slideUp();
				$('#table').fadeIn();
				$('#search').fadeIn();
				$('#headform').html('Daftar Pegawai');

			});
			
			
			$('#showdaftar').click(function(e) {
               $('#konten').slideUp();
				$('#table').fadeIn();
				$('#search').fadeIn();
				$('#headform').html('Daftar Pegawai');
            });
			
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
    	<td align="right">NIP :</td>
        <td><input type="text" id="NIP" name="NIP" size="30" /></td>
    </tr>    

	<tr>
    	<td align="right">Alamat :</td>
        <td><input type="text" id="Alamat" name="Alamat" size="50" /></td>
    </tr>
	<tr>
    	<td align="right">Nomor HP :</td>
        <td><input type="text" id="NoTelp" name="NoTelp" size="20" /></td>
    </tr>    
	<tr>
    	<td align="right">Pangkat :</td>
        <td><input type="text" id="Pangkat" name="Pangkat" size="20" /></td>
    </tr> 
<tr>
    	<td align="right">Golongan :</td>
        <td><input type="text" id="Golongan" name="Golongan" size="20" /></td>
    </tr>     
	<tr>
    	<td align="right">Jabatan :</td>
        <td><?php $this->mdiklat->combojabatan('Jabatan'); ?></td>
    </tr>     
	<tr>
    	<td align="right">Unit Kerja :</td>
        <td><?php $this->mdiklat->combounitkerja('UnitKerja'); ?></td>
    </tr>   
	<tr>
    	<td align="right">Tempat/Tgl Lahir :</td>
        <td><input type="text" id="TempatLahir" name="TempatLahir" size="20" />, 
        	<?php $this->auth->inputtgl('TglLahir',10); ?>
        </td>
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
    	<td align="right">Agama :</td>
        <td>
          <select name="Agama" id="Agama">
            <option value="Budha">Budha</option>
            <option value="Hindu">Hindu</option>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
          </select></td>
    </tr>  
    	<tr>
    	<td align="right">Pendidikan Terakhir:</td>
        <td><input type="text" id="Pendidikan" name="Pendidikan" size="50" /></td>
    </tr> 
    	<tr>
    	<td align="right">No NPWP :</td>
        <td><input type="text" id="NPWP" name="NPWP" size="50" /></td>
    </tr>  
   	<tr>
    	<td align="right">No KTP :</td>
        <td><input type="text" id="KTP" name="KTP" size="50" /></td>
    </tr> 
     <tr>
    	<td align="right"></td>
        <td><input type="button" name="simpan" id="simpan" value="Simpan" />
        <input type="button" name="clearfr" id="clearfr" value="Reset" />
        <input type="button" name="showdaftar" id="showdaftar" value="Tampilkan Daftar Pegawai" />
        </td>
    </tr>
</table>
</form>
</td></tr></table>