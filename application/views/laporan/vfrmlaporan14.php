<script type="text/javascript">
	$(document).ready(function(){
			$("#KodeKabupaten option[value='']").remove();
			$('#KodeKabupaten').append(new Option('-= Semua =-', '', true, true));
			$('#lockecamatan').hide();
			
	});
	
	$('#KodeKabupaten').change(function(e) {
		var kodekab = $('#KodeKabupaten').val();
		if(kodekab != ""){
			$('#lockecamatan').show();
        	pageload('claporan/combokecamatan/'+kodekab,'#lockecamatan');
			$("#KodeKecamatan option[value='-']").remove();
			$('#KodeKecamatan').append(new Option('-= Semua =-', '-', true, true));
		}else{
			$('#KodeKecamatan').val('');
			$('#lockecamatan').hide();
		}
    });
	
	$('#JenisForm').change(function(e) {
		var jenis = $('#JenisForm').val();
		if(jenis == "14" || jenis == "16"){
			//$("#Periode option[value='']").remove();
			$('#Periode').empty();
			$('#Periode').append(new Option('Semester I', 'Semester I', true, true));
			$('#Periode').append(new Option('Semester II', 'Semester II', true, true));
			$("#Periode option[value='Semester1']").attr('selected','selected');
		}else{
			$('#Periode').empty();
			$('#Periode').append(new Option('Triwulan I', 'Triwulan I', true, true));
			$('#Periode').append(new Option('Triwulan II', 'Triwulan II', true, true));
			$('#Periode').append(new Option('Triwulan III', 'Triwulan III', true, true));
			$('#Periode').append(new Option('Triwulan IV', 'Triwulan IV', true, true));
			$("#Periode option[value='Triwulan1']").attr('selected','selected');
		}
    });

	function clearform(){
		//$('#frmuser')[0].reset();	
		$('#KodeKabupaten').val('');
		$('#NamaKabupaten').val('');
		$('#Keterangan').val('');
		
	}
</script>
<form id="frmlaporan" name="frmlaporan" method="post" action="<?php echo base_url()?>index.php/claporan/form14" target="_blank">
<table width="100%">
<tr><td align="center">

<table width="700px" class="form">
	<tr>
    	<td align="right" width="30%">Jenis Form :</td>
        <td>
          <select name="JenisForm" id="JenisForm">
            <option value="14">Form 14</option>
            <option value="15">Form 15</option>
            <option value="16">Form 16</option>
           <!-- <option value="17">Form 17</option>-->
          </select>
          
          
          </td>
    </tr>
	<tr>
    	<td align="right" width="30%">Periode :</td>
        <td>
          <select name="Periode" id="Periode">
            <option value="Semester I">Semester I</option>
            <option value="Semester II">Semester II</option>

          </select>
          
          
          </td>
    </tr>    
	<tr>
    	<td align="right" width="30%">Kabupaten :</td>
        <td><?php $this->mperkebunan->combokabupaten('KodeKabupaten'); ?>
        <label id="lockecamatan">
        <select id="KodeKecamatan" name="KodeKecamatan">
        <option value="">-= Pilih Kecamatan =-</option>
        </select>
        </label>
        </td>
    </tr>
   	<tr>
    	<td align="right" width="30%">Tahun :</td>
        <td><input type="text" id="Tahun" name="Tahun" size="5" /></td>
    </tr>
     <tr>
    	<td align="right"></td>
        <td><input type="submit" name="cetak" id="cetak" value="Tampilkan" /></td>
    </tr>
</table>
  
</td></tr></table>
</form>