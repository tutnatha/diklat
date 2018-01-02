<script type="text/javascript">
	$(document).ready(function(){
		
		
			
			$('#simpan').click(function(){
				
				
				if ($('#KodeDiklat').val()==""){
					alert('Anda belum mengisi Kode Diklat');
					$('#KodeDiklat').focus();
					return false;
				}
				if ($('#NamaDiklat').val()==""){
					alert('Anda belum mengisi Nama');
					$('#NamaDiklat').focus();
					return false;
				}
				
				if ($('#UnitKerja').val()==""){
					alert('Anda belum mengisi Unit Kerja');
					$('#UnitKerja').focus();
					return false;
				}
				//$('#Keterangan').val("asdf<br />1,...<br />1... adfadf");
				
				

				send_form_loading(document.frmpegawai,"cdaftardiklat/simpan","#table");
				$('#konten').slideUp();
				$('#table').fadeIn();
				$('#search').fadeIn();
				$('#headform').html('Daftar Diklat');

			});
			
			$('#daftardiklat').click(function(e) {
               $('#konten').slideUp();
				$('#table').fadeIn();
				$('#search').fadeIn();
				$('#headform').html('Daftar Diklat');
            });
			
			$('#KodeDiklat').blur(function(e) {
				var kode = $('#KodeDiklat').val();
                pageload("cdaftardiklat/edit/" + kode,"#script");
            });
			
			
	});

	
	$('.Angka').keypress(function(event) {
		var charCode = (event.which) ? event.which : event.keyCode;
		if ((charCode >= 48 && charCode <= 57)||charCode==08 ||charCode==46 ||charCode==09)
		return true;
		return false;
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
<table width="100%" class="form">
	
    

<tr>
    	<td align="right" width="35%">Kode Diklat :</td>
        <td><input type="text" id="KodeDiklat" name="KodeDiklat" size="20" /></td>
    </tr>    
	<tr>
    	<td align="right">Nama Diklat :</td>
        <td><input type="text" id="NamaDiklat" name="NamaDiklat" size="50" /></td>
    </tr>
    
<?php if($this->session->userdata('unitkerja') == ""){ ?>
<tr>
    	<td align="right">Unit Kerja :</td>
        <td><div id="locunitkerja"><?php $this->mdiklat->combounitkerja('UnitKerja'); ?></div></td>
    </tr>
    <?php }else{ ?>
    	<tr>
    	<td align="right">Unit Kerja :</td>
        <td><div id="locunitkerja"><input type="hidden" id="UnitKerja" name="UnitKerja" value="<?php echo $this->session->userdata('unitkerja');  ?>"/>
        <input type="text" value="<?php echo $this->mdiklat->detailunitkerja($this->session->userdata('unitkerja')); ?>" size="50" readonly />
		
        </div></td>
    </tr>
    <?php } ?>    
    
	<tr>
    	<td align="right">Jenis :</td>
        <td><?php $this->mdiklat->combojenisdiklat('Jenis'); ?></td>
    </tr>
	<tr>
    	<td align="right">Tanggal :</td>
        <td><?php $this->auth->inputtgl('DariTanggal',10); ?> s/d <?php $this->auth->inputtgl('SampaiTanggal',10); ?></td>
    </tr>    
	<tr>
    	<td align="right">Tempat :</td>
        <td><input type="text" id="Tempat" name="Tempat" size="50" /></td>
    </tr> 
	<tr>
    	<td align="right">Jumlah Peserta :</td>
        <td><input type="text" id="JmlPeserta" name="JmlPeserta" size="5" class="Angka" /> orang</td>
    </tr>  
<tr>
    	<td align="right">Jumlah Panitia :</td>
        <td><input type="text" id="JmlPanitia" name="JmlPanitia" size="5" class="Angka"  /> orang</td>
    </tr>        
	<tr>
    	<td align="right">Menggunakan Fasilitas LPMP :</td>
        <td>
          <select name="FasilitasLPMP" id="FasilitasLPMP">
            <option value="Tidak" selected="selected">Tidak</option>
            <option value="Ya">Ya</option>
          </select></td>
    </tr> 
    <tr>
    	<td align="right">Kode Undangan :</td>
        <td><input type="text" id="KodeUndangan" name="KodeUndangan" size="30" /></td>
    </tr> 
<tr>
    	<td align="right">Tanggal Pendaftaran:</td>
        <td><?php $this->auth->inputtgl('TglDaftarDari',10); ?> s/d <?php $this->auth->inputtgl('TglDaftarSampai',10); ?></td>
    </tr>       
	<tr>
    	<td align="right" valign="top">Keterangan :</td>
        <td><textarea name="Keterangan" cols="50" rows="4" wrap="soft" id="Keterangan"></textarea></td>
    </tr>  
  
     <tr>
    	<td align="right"></td>
        <td>
        <input type="button" name="simpan" id="simpan" value="Simpan" />
        <input type="button" name="clearfr" id="clearfr" value="Reset" />
        <input type="button" name="daftardiklat" id="daftardiklat" value="Tampilkan Daftar Diklat" />
        </td>
    </tr>
</table>
</form>
</td></tr></table>