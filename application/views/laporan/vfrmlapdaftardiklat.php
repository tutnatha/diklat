<script type="text/javascript">
	$(document).ready(function(){
		
		
		
			
	});

	
	$('.Angka').keypress(function(event) {
		var charCode = (event.which) ? event.which : event.keyCode;
		if ((charCode >= 48 && charCode <= 57)||charCode==08 ||charCode==46 ||charCode==09)
		return true;
		return false;
	});

	function tampilkan(){
		$('#table').show();
		send_form_loading(document.frmpegawai,'claporan/daftardiklat','#table');
	}
	
	
	function clearform(){
		$('#frmpegawai')[0].reset();	
		
		
	}
	
	function cetakdaftardiklat(){
		$('#frmpegawai').attr("action","<?php echo base_url(); ?>index.php/claporan/cetakdaftardiklat");
		$('#frmpegawai').attr("method","post");
		$('#frmpegawai').attr("target","_blank");
		$('#frmpegawai').submit();	
		
	}
	
	function exportdaftardiklat(){
		$('#frmpegawai').attr("action","<?php echo base_url(); ?>index.php/claporan/exportdaftardiklat");
		$('#frmpegawai').attr("method","post");
		$('#frmpegawai').attr("target","_blank");
		$('#frmpegawai').submit();	
		
	}
</script>

<table width="100%">
<tr><td align="center">
<form name="frmpegawai" id="frmpegawai">
<table width="700px" class="form">
	<tr>
    	<td align="right" width="30%">Unit Kerja :</td>
        <td><div id="locunitkerja"><input type="checkbox" id="chkunitkerja" name="chkunitkerja"><?php $this->mdiklat->combounitkerja('UnitKerja'); ?></div></td>
    </tr>
    <tr>
    	<td align="right">Jenis :</td>
        <td><input type="checkbox" id="chkjenis" name="chkjenis"><?php $this->mdiklat->combojenisdiklat('Jenis'); ?></td>
    </tr>
	<tr>
    	<td align="right">Tanggal :</td>
        <td><input type="checkbox" id="chktanggal" name="chktanggal"><?php $this->auth->inputtgl('DariTanggal',10); ?> s/d <?php $this->auth->inputtgl('SampaiTanggal',10); ?></td>
    </tr>    
	     
	<tr>
    	<td align="right">Menggunakan Fasilitas LPMP :</td>
        <td><input type="checkbox" id="chkfasilitas" name="chkfasilitas">
          <select name="FasilitasLPMP" id="FasilitasLPMP">
            <option value="Tidak" selected="selected">Tidak</option>
            <option value="Ya">Ya</option>
          </select></td>
    </tr> 
     <tr>
    	<td align="right"></td>
        <td><input type="button" name="simpan" id="simpan" value="Tampilkan" onClick="tampilkan();" />
        </td>
    </tr>
</table>
</form>
</td></tr></table>