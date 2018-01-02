<script type="text/javascript">
	
	$('#lanjut').click(function(e) {
		var kodeundangan = "<?php echo $KodeUndangan; ?>";
		var kodediklat = "<?php echo $KodeDiklat; ?>";
		var kodeinput = $('#KodeUndangan').val();
		
		if(kodeundangan != kodeinput){
			alert('Kode Undangan yang anda masukkan tidak sesuai, silahkan masukkan kode undangan yang benar');	
			
		}else{
			$('#headform').html('Form Pendaftaran Diklat');
			pageload('cundangan/showform/'+	kodediklat,'#konten');
		}
        
    });
</script>


<p align="center">Masukkan kode undangan untuk diklat ini : 
<br><br><input type="text" id="KodeUndangan" name="KodeUndangan" size="30">
<br><br><input type="button" id="lanjut" name="lanjut" value="Berikutnya>>">