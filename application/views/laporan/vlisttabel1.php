<script type="text/javascript">
	function editbagian(kode){
		pageload("ckabupaten/edit/" + kode,"#script");		
	}
	
	function hapusbagian(kode){
		if (confirm("Anda yakin ingin menghapus data ini?")){
			pageload("ckabupaten/hapus/" + kode,"#table");
		}
	}
	


</script>
<style type="text/css">
.list th, .list td, list1 td{border:1px solid #999;}
.list th{ font-weight:bold}
th{padding:4px 0;background: #F0F0F0;}
td{padding:1px 1px;}

table{margin:0 auto}

.list
{
	margin:0 auto;width:100%;border-collapse:collapse;background:#FFFFFF;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
</style>
<?php $this->load->view('utama/vprintbutton'); ?>
<?php
if ($hasil=="")
{
?>
	<font color="#FF0000">**** Tidak ada hasil pencarian ****</font>
    
<?php
}
else
{
?>
<h3>
Tabel 1<?php if($kodekabupaten!=''){ echo ".".intval($kodekabupaten);} ?> : POTENSI AREAL KOMODITAS PERKEBUNAN RAKYAT DI BALI TAHUN <?php echo $tahun ?>
<?php if($kabupaten != ""){ echo ' KABUPATEN : '.strtoupper($kabupaten);} ?>
<br />
<i>Table 1<?php if($kodekabupaten!=''){ echo ".".intval($kodekabupaten);} ?> : Existing Area of Smallholders in Bali, <?php echo $tahun ?>
<?php if($kabupaten != ""){ echo ' Regency : '.$kabupaten;} ?>
</i>
</h3>

<table border="1" width="100%"  class="list">
<tr>
	<th width="30px">No</th>
    <th>Komoditas/<br /> Commodities</th>
    <th width="100px">Potensi Area/<br /> Area Potencies <br />(Ha)</th>
    <th width="100px">Luas Area/<br /> Area Potencies <br />(Ha)</th>
    <th width="100px">Sisa Potensi/<br /> Existing Area <br />(Ha)</th>
    <th width="150px">Keterangan/<br /> Explaination</th>
</tr>

<?php 
$no=1;
foreach ($hasil as $data): ?>
	<tr>
    	<td align="center"><?php echo $no; ?></td>
    	<td ><?php echo $data->NamaKomoditi; ?></td>
        <td align="right"><?php echo number_format($data->TPotensiArea,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TLuasArea,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TPotensiArea - $data->TLuasArea,2,',','.'); ?></td>
        <td ><?php echo $data->Keterangan; ?></td>
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
