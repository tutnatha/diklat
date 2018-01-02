<script type="text/javascript">
	$(document).ready(function(e) {
        $('#btsearchutama').click();
    });

	function cariDataUtama(){
            send_form_loading(document.frmcariutama,'cpegawai/listpegawai/0/20','#table');
	}
	
	$('#addnewdata').click(function(e) {
		clearform();
        $('#konten').slideDown();
		$('#table').fadeOut();
		$('#search').fadeOut();
		$('#headform').html('Input Data Pegawai');
		
    });

</script>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td width="50%" align="left">
        <?php if($this->session->userdata('diklat')==1){ ?>
            <input type="button" id="addnewdata" name="addnewdata" value="Tambah Data Pegawai">
         <?php } ?> 
         </td>
         <td align="right" width="50%">
        <form id="frmcariutama" name="frmcariutama">
            <input type="hidden" id="nim" name="nim">
            <input type="text" size="30" id="txtcariutama" name="txtcariutama" /><input type="button" id="btsearchutama" value="Cari" onclick="cariDataUtama()" />
        </form>
        </td>
    </tr>
</table>