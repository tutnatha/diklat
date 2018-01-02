<script type="text/javascript">
	$('#SimpanPassword').click(function(){
		if($('#Password').val() != $('#Password1').val()){
			alert("Password yang anda masukkan tidak konsisten");
			return false;	
		}
		
		send_form_loading(document.frmlogin,'cpanitiadiklat/simpanpassword','#script');
	});
	
	
</script>
<style type="text/css">
.login{
	border-radius:5px;
	margin-top:10px;
	margin-bottom:10px;
	margin-left:auto;
	margin-right:auto;
	width:450px;
	background:#F8F8F8;
	border: 1px solid #CCCCCC;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	padding-top:10px;
	padding-bottom:10px;
}

</style>
<br>
<form name="frmlogin" id="frmlogin">
  <table width="100%" border="0" class="login" cellpadding="5">
    <tr>
      <td align="right" width="40%">Nama Panitia :</td>
      <td><?php echo $namapegawai; ?>
      <input type="hidden" id="KodeDiklat" name="KodeDiklat" value="<?php echo $KodeDiklat ?>">
      <input type="hidden" id="NIP" name="NIP" value="<?php echo $NIP ?>">
      </td>
    </tr>
    <tr>
      <td align="right">Password :</td>
      <td><input type="Password" name="Password" id="Password"></td>
    </tr>
    <tr>
      <td align="right">Ketik Ulang Password :</td>
      <td><input type="Password" name="Password1" id="Password1"></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td><input type="button" name="SimpanPassword" id="SimpanPassword" value="Simpan"></td>
    </tr>
  </table>
</form>

