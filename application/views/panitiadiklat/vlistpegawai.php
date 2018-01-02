<script type="text/javascript">
	$(document).ready(function(e) {
 		totalpanitia();
		
		
		function totalpanitia(){
			var totalcheck = 0;
		   $('input[type=checkbox]').each(function () {
				if($(this).attr('checked') == true){
					totalcheck = totalcheck + 1;
				}
			});
			//alert(totalcheck);
			$('#totalpanitia').html(totalcheck+" orang pegawai dipilih sebagai panitia diklat ini");	
		
		}
		
		$('input:checkbox').click(function(){
			var kodediklat = $('#KodeDiklat').val();
			var nip = $(this).val();
			var jabatan = $('#cmb'+nip).val();
			//alert($(this).val());
			totalpanitia();
			if($(this).attr('checked') == false){
				$('#cmb'+nip).val('');
				pageload('cpanitiadiklat/hapuspanitia/'+kodediklat+'/'+nip,'#table');	
			}else{
				//alert('cpanitiadiklat/simpanpanitia/'+kodediklat+'/'+nip+'/'+jabatan);
				pageload('cpanitiadiklat/simpanpanitia/'+kodediklat+'/'+nip+'/'+jabatan,'#table');	
			}
			
		});
    });
	
	


</script>
<table border="1" width="100%"  class="list">
<tr>
	<th width="50px">No</th>
    <th width="200px">NIP</th>
    <th>Nama</th>
   
    <th width="150px">Jabatan Kepanitiaan</th>
     <th width="50px">Panitia</th>
</tr>

<?php
if ($datalist=="")
{
?>
	<tr><td align="center" colspan="11"><font color="#FF0000"><br><br>**** Tidak ada data ****<br><br><br><br></font></td>
    </tr>
    
<?php
}
else
{
?>




<?php 
$no=1;
foreach ($datalist as $data):
$data->NIP= str_replace(" ","-",$data->NIP); ?>
	<tr>
    	<td align="center"><?php echo $no; ?></td>
    	<td ><?php echo $data->NIP; ?></td>
        <td ><?php echo $data->Nama; ?></td>
        <td align="center" ><?php $this->mdiklat->combojabatanpantia('cmb'.$data->NIP,$data->Panitia[1]); ?></td>
        <td align="center" ><input name="<?php echo "chk".$data->NIP ?>" type="checkbox" id="<?php echo "chk".$data->NIP ?>" value="<?php echo $data->NIP ?>" <?php echo $data->Panitia[0]; ?>></td>
       
      
		
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
