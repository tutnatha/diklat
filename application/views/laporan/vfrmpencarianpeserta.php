<script type="text/javascript">
	$(document).ready(function(e) {
		
        $('#caripeserta').click(function(e) {
			var kodedkl = "<?php echo $KodeDiklat; ?>";
			var status = $('#Stsdaftar').val();
			alert('claporan/listpesertadiklat/'+kodedkl+'/'+status);
            //pageload('claporan/listpesertadiklat/'+kodedkl+'/'+status,'#popup');
        });
		
		$('#Stsdaftar').change(function(e) {
            alert('berubah');
        });
		
    });

</script>


<font size='4'><b>Daftar Peserta Diklat Ini</b></font><br>
Status Pendaftaran :<select name="Stsdaftar" id="Stsdaftar">
            <option value="">-=Semua=-</option>
            <option value="On Process">On Process</option>
            <option value="Diterima" selected>Diterima</option>
            <option value="Ditolak">Ditolak</option>
          </select>
			
          <input type="button" id="caripeserta" name="caripeserta" value="Tampilkan Peserta">