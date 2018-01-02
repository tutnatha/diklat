<script type="text/javascript">
	$(document).ready(function(){
	
		$('#UnitKerja').hide();
		
			
			$('#simpan').click(function(){
				if ($('#username').val()==""){
					alert('Anda belum mengisi Username');
					$('#username').focus();
					return false;
				}
				if ($('#password').val()==""){
					alert('Anda belum mengisi Password');
					$('#password').focus();
					return false;
				}
				
				if ($('#password').val()!=$('#repassword').val()){
					alert('Password anda tidak konsisten');
					$('#repassword').focus();
					return false;
				}
				
				if($('#Level').val()=="Kasi"){
					if($('#UnitKerja').val() == ""){
						alert('Anda belum mengisi Unit Kerja');
						return false;	
					}
				}

				send_form_loading(document.frmuser,"cusermanagement/simpanuser","#table");

			});
			
			
			$('#Level').change(function(e) {
			  var lvl = $('#Level').val();
			  if (lvl == 'Kasi'){
				//pageload('cusermanagement/showunitkerja', '#levellogin');
				$('#UnitKerja').show();
			  }else{ 
			  	$('#UnitKerja').val('');
				$('#UnitKerja').hide();
			  }
			});
		
			
			

	});
	
	
	function clearform(){
		$('#frmuser')[0].reset();	
		
	}
</script>

<table width="100%">
<tr><td align="center">
<form name="frmuser" id="frmuser">
<table width="700px" class="form">
	<tr>
    	<td align="right" width="40%">Username :</td>
        <td><input type="text" id="Username" name="Username" size="20" /></td>
    </tr>
	<tr>
    	<td align="right">Password :</td>
        <td><input type="password" id="Password" name="Password" size="20" /></td>
    </tr>
	<tr>
    	<td align="right">Retype Password :</td>
        <td><input type="password" id="Repassword" name="Repassword" size="20" /></td>
    </tr>
	<tr>
    	<td align="right">Level :</td>
        <td>
          <select name="Level" id="Level">
            <option value="PPK">PPK</option>
            <option value="Admin">Admin</option>
            <option value="Staf Kepegawaian">Staf Kepegawaian</option>
            <option value="Kasubbag Umum">Kasubbag Umum</option>
            <option value="Kepala">Kepala</option>
            <option value="Kasi">Kasi</option>
          </select>
          
          <?php $this->mdiklat->combounitkerja('UnitKerja'); ?>
          </td>
    </tr> 
    <tr>
    	<td align="right">Boleh Membuat Diklat :</td>
        <td><select name="Diklat" id="Diklat">
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
          </select></td>
    </tr> 
    <tr>
    	<td align="right"></td>
        <td><input type="button" name="simpan" id="simpan" value="Simpan" /></td>
    </tr>
</table>
</form>
</td></tr></table>