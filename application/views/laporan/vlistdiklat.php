<script type="text/javascript">
	$(document).ready(function(e) {
        $('#cetakdaftardiklat').click(function(e) {
            cetakdaftardiklat('html');//fungsi ini ada di file vfrmlaporandaftardiklat
        });
		
		$('#exportdaftardiklat').click(function(e) {
            exportdaftardiklat('excel');//fungsi ini ada di file vfrmlaporandaftardiklat
        });
			
    });
	
	function showpanitiadiklat(kodediklat){
		tplpopup(800,475, 25, 0);
		//$('#popuphead').html('Pilih Soal Untuk Ujian');
		$('#popuphead').html("<font size='4'> <b>Daftar Panitia Diklat Ini</font></b>");
		pageload('claporan/listpanitiadiklat/'+kodediklat,'#popup');
		
	}
	
	function showpesertadiklat(kodediklat){
		tplpopup(800,475, 25, 0);
		//$('#popuphead').html('Pilih Soal Untuk Ujian');
		$('#popuphead').html("<font size='4'> <b>Daftar Peserta Diklat Ini</font></b>");
		//pageload('claporan/pencarianpeserta/'+kodediklat,'#popuphead');
		pageload('claporan/listpesertadiklat/'+kodediklat,'#popup');
		
	}
	



	function tplpopup(wpop, hpop, hpophead, hpopfoot){
		var hpopheadtop = ((screen.height -(hpop+hpophead+hpopfoot))/2)-75;
		var kiri = (screen.width - wpop)/2; 
	
		$('#popuphead').css({
			'width': Number( wpop), 
			'height': Number( hpophead ),
			'top': Number (hpopheadtop),
			'left': Number (kiri)
		});
	
		$('#popup').css({
			'width': Number( wpop ), 
			'height': Number( hpop ),
			'top': Number(hpopheadtop+hpophead+20),
			'left': Number (kiri)
		});
		
		$('#popupfoot').css({
			'width': Number( wpop ), 
			'height': Number( hpopfoot ),
			'top': Number(hpopheadtop+hpophead+hpop+40),
			'left': Number (kiri)
		});
		
		
		$('#closebtn').css({
			'top': Number (hpopheadtop-17),
			'left': Number (kiri+wpop+10)
		});
		
		$('#popuphead').fadeIn();
		$('#popup').fadeIn();
		if(hpopfoot>0){
			$('#popupfoot').fadeIn();
		}
		$('#closebtn').fadeIn();
		
		$('body').append('<div id="fade"></div>');
		$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();
	
		return false;
	}
	
	//Close Popups and Fade Layer
	$('a.close, #fade').live('click', function() { //When clicking on the close or fade layer...
		//$('#popup').html('');
		//$('#popuphead').html('');
		$('#closebtn').fadeOut();
		$('#popuphead').fadeOut();
		$('#popup').fadeOut();
		$('#popupfoot').fadeOut();
		$('#fade').fadeOut();
		$('#fade').remove();
		return false;
	});


</script>

<style type="text/css">

/*popup window */
#fade { /*--Transparent background layer--*/
	display: none; /*--hidden by default--*/
	background: #000;
	position: fixed; left: 0; top: 0;
	width: 100%; height: 100%;
	opacity: .80;
	z-index: 9999;
}
#popup, #popuphead, #popupfoot{
	display: none;
	background: #fff;
	padding: 5px;
	overflow: auto;
	border: 5px solid #ddd;
	position:fixed;
	z-index: 99999;
	text-decoration:none;
	text-align:center
}


#closebtn{display: none; width:auto; height:auto; z-index:999999;position:fixed;}
#popupfoot{font-size:18px};
</style>
<div id="closebtn">
	<a href="#" class="close"><img src="<?php echo base_url() ?>asset/images/close_pop_new.png" alt="Close" /></a>
</div>
<div id="popuphead" class="popup_head_block"></div>
<div id="popup" class="popup_block"></div>
<div id="popupfoot" class="popup_block"></div>


<style type="text/css">
	.cat{width:100%};
</style>

<?php
if ($hasil=="")
{
?>
	<p align="center"><font color="#FF0000">**** Tidak ada data ****</font></p>
    
<?php
}
else
{
?>

<p align="center">
<input type="button" id="cetakdaftardiklat" name="cetakdaftardiklat" value="Cetak Daftar Diklat">
<input type="button" id="exportdaftardiklat" name="exportdaftardiklat" value="Export Ke Excel">

</p>


<?php 
$no=1;
foreach ($hasil as $data): ?>
	

<table width="100%" border="1" class="list">
            <tr>
           	  <td width="25%" align="right"><b>Nama Diklat :</b></td>
           	  <td  width="75%" ><?php echo $data->NamaDiklat; ?></td>
          </tr>
            <tr>
            	<td align="right"><b>Tanggal :</b></td>
            	<td ><?php echo $this->auth->convertdate($data->DariTanggal,''); ?> - <?php echo $this->auth->convertdate($data->SampaiTanggal,''); ?></td>
          </tr>
             <tr>
             	<td align="right"><b>Tempat :</b></td>	
                <td ><?php echo $data->Tempat; ?></td>
             </tr>
             <tr>
             	<td align="right"><b>Tgl Pendaftaran :</b></td>
            	<td ><?php echo $this->auth->convertdate($data->TglDaftarDari,''); ?> - <?php echo $this->auth->convertdate($data->TglDaftarSampai,''); ?></td>
             </tr>
              <tr>
             	<td align="right"><b>Jenis Diklat :</b></td>	
               <td ><?php echo $data->NamaJenis; ?></td>
             </tr>
             <tr>
             	<td align="right"><b>Jumlah Maksimal Peserta :</b></td>	
               <td ><?php echo $data->JmlPeserta; ?> orang</td>
             </tr>
             <tr>
             	<td align="right"><b>Jumlah Panitia :</b></td>	
               <td ><?php echo $data->JmlPanitia; ?> orang</td>
             </tr>
             <tr>
             	<td align="right"><b>Menggunakan Fasilitas LPMP :</b></td>	
               <td ><?php echo $data->FasilitasLPMP; ?></td>
             </tr>
             <tr>
             	<td align="right"><b>Narasumber :</b></td>	
               <td ><?php echo $data->Narasumber; ?></td>
             </tr>
<tr>
             	<td align="right"><b>Keterangan :</b></td>	
               <td ><?php echo $data->Keterangan; ?></td>
             </tr>             
             <tr>
             	<td align="right"><b>Panitia :</b></td>	
               <td ><?php echo $data->JmlPanitia; ?> orang [<a href="javascript:void(0);" onclick='showpanitiadiklat("<?php echo $data->KodeDiklat; ?>")'>tampilkan</a>]</td>
             </tr>
 <tr>
             	<td align="right"><b>Peserta :</b></td>	
               <td ><?php echo $data->JmlPeserta; ?> orang [<a href="javascript:void(0);" onclick='showpesertadiklat("<?php echo $data->KodeDiklat; ?>")'>tampilkan</a>]</td>
             </tr>             
 			<tr>
             	<td align="right"><b>Status :</b></td>	
              <td >
                <table width="100px" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td align="center" bgcolor="<?php echo $data->Status[1]; ?>" title="Persetujuan Kabag Umum">1</td>
                        <td align="center" bgcolor="<?php echo $data->Status[2]; ?>" title="Persetujuan PPK">2</td>
                        <td align="center" bgcolor="<?php echo $data->Status[3]; ?>" title="Persetujuan Kepala">3</td>
                        <td align="center" bgcolor="<?php echo $data->Status[4]; ?>" title="Penunjukan Panitia">4</td>
                        <td align="center" bgcolor="<?php echo $data->Status[5]; ?>" title="Persetujuan PPK">5</td>
                        <td align="center" bgcolor="<?php echo $data->Status[6]; ?>" title="Persetujuan Kepala">6</td>
                      </tr>
                    </tbody>
                </table>
                
              </td>
          </tr>  
        </table>
    <hr width="100%" size="1" noshade="noshade">

    <?php $no++; ?>
<?php endforeach; ?>

<?php 
}
?>
