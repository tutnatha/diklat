<script type="text/javascript">
	$('#login').click(function(){
		var level = $('#Level').val();
		if(level=="Kabupaten"){
			if($('#KodeKabupaten').val()==""){
				alert('Anda belum memilih kabupaten');
				$('#KodeKabupaten').focus();
				return false;	
			}
		}else if(level=="Kecamatan"){
			if($('#KodeKabupaten').val()==""){
				alert('Anda belum memilih kabupaten');
				$('#KodeKabupaten').focus();
				return false;	
			}
			
			if($('#KodeKecamatan').val()==""){
				alert('Anda belum memilih kecamatan');
				$('#KodeKecamatan').focus();
				return false;	
			}
			
		}
		
		send_form_loading(document.frmlogin,'cdiklat/login','#script');
	});
	
	$(document).ready(function(e) {
        $('#lblevel').hide();
		$('#Level').change(function(e) {
			var level = $('#Level').val();
			if(level == "Kabupaten"){
				$('#lbkab').show();
				//$('#lbkec').html('');	
				$('#lbkec').hide();	
				pageload('cusermanagement/isicombokab','#lbkab');	
			}else if(level=="Kecamatan"){
				$('#lbkab').show();
				//$('#lbkab').html('');	
				$('#lbkec').show();	
				pageload('cusermanagement/isicombokab','#lbkab');	
			}else{
				//$('#lbkab').html('');
				$('#lbkab').hide();
				//$('#lbkec').html('');
				$('#lbkec').hide();
			}
		});
    });
	
	function kabchange(){
		var kodekab = $('#KodeKabupaten').val();
		var level = $('#Level').val();
		if(level=="Kecamatan"){
			pageload('cusermanagement/isicombokec/'+kodekab,'#lbkec');
		}
	}
	
</script>
<style type="text/css">
.login{
	border-radius:5px;
	margin-top:10px;
	margin-bottom:10px;
	margin-left:auto;
	margin-right:auto;
	width:350px;
	background:#F8F8F8;
	border: 1px solid #CCCCCC;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	padding-top:10px;
	padding-bottom:10px;
}

</style>
<br />
<br />
<br />

<form name="frmlogin" id="frmlogin">
  <table width="100%" border="0" class="login" cellpadding="5">
    <tr>
      <td align="right" width="40%">Username :</td>
      <td><input type="text" name="Username" id="Username"></td>
    </tr>
    <tr>
      <td align="right">Password :</td>
      <td><input type="Password" name="Password" id="Password"></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td><input type="button" name="login" id="login" value="Login"></td>
    </tr>
  </table>
</form>
<br />
<br />
<br />

