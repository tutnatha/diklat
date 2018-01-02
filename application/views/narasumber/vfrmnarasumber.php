<script type="text/javascript">
	$(document).ready(function(){
		

			$('#KodeDiklat').change(function(e) {
                var kodediklat = $('#KodeDiklat').val();
				pageload('cnarasumber/listnarasumber/'+kodediklat,'#table');
            });
			
			
	});

	
	function clearform(){
		$('#frmpegawai')[0].reset();	
		
		
	}

	$('#edit').click(function(){
		var kodediklat = $('#KodeDiklat').val();
		if(kodediklat==""){
			alert('Anda belum memilih diklat');
			return false;	
		}
		
		tplpopup(800,475, 25, 25);
		//$('#popuphead').html('Pilih Soal Untuk Ujian');
		var kodediklat = $('#KodeDiklat').val();
		$('#popuphead').html("<font size='4'> <b>Daftar Narasumber</font></b>");
		pageload('cnarasumber/totalnarasumber/'+kodediklat,'#popupfoot');
		pageload('cnarasumber/listdaftarnarasumber/'+kodediklat,'#popup');
		
	});


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


<table width="100%">
<tr><td align="center">
<form name="frmpegawai" id="frmpegawai">
<table width="100%" class="form">

<tr>
    	<td align="right" width="30%">Pilih Diklat :</td>
        <td><?php $this->mdiklat->combodiklat('KodeDiklat'); ?></td>
    </tr>    
     <tr>
    	<td align="right"></td>
        <td><input type="button" name="edit" id="edit" value="Tambah/Hapus Narasumber" /></td>
    </tr>
</table>
</form>
</td></tr></table>