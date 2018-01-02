<script type="text/javascript">
	$(document).ready(function(e) {
        $('#btsearchutama').click();
    });

	function cariDataUtama(){
            send_form_loading(document.frmcariutama,'cpeserta/listpeserta/0/20','#table');
	}
	
	$('#btadddata').click(function(e) {
		//clearform();
        $('#konten').slideDown();
		$('#table').fadeOut();
		$('#search').fadeOut();
		$('#headform').html('Input Peserta Diklat');
		
    });
	
	$('#KodeDiklatCari').change(function(e) {
		$('#KodeDiklat').val($('#KodeDiklatCari').val());
		cariDataUtama();
    });

</script>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td width="20%" align="left">
        
          <input type="button" id="btadddata" name="btadddata" value="Tambah Peserta Diklat">
         
         </td>
         <td align="right" width="50%">
        <form id="frmcariutama" name="frmcariutama">
            <input type="hidden" id="nim" name="nim">
            <?php $this->mdiklat->combodiklatpeserta('KodeDiklatCari'); ?>
            <input type="text" size="30" id="txtcariutama" name="txtcariutama" /><input type="button" id="btsearchutama" value="Cari" onclick="cariDataUtama()" />
        </form>
        </td>
    </tr>
</table>