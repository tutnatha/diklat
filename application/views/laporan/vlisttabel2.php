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
Tabel 2 : ESTIMASI LUAS AREAL DAN PRODUKSI KOMODITAS PERKEBUNAN RAKYAN DAN PBSN DI BALI TAHUN <?php echo $tahun ?>

<br />
<i>Table 2 : Area and Produktion Of Smallholders And Private Estates Estimates in Bali, <?php echo $tahun ?>

</i>
</h3>

<table border="1" width="100%"  class="list">
<tr>
	<th width="30" rowspan="2">No</th>
    <th rowspan="2">Komoditas/<br /> Commodities</th>
    <th width="100" rowspan="2">Jumlah Petani (KK)/ Number Of Farmer</th>
    <th colspan="3">Luas Area (Ha) / Area (Hectare)</th>
    <th colspan="3">Produksi (Ton)/Production (Ton)</th>
    <th width="100" rowspan="2">Bentuk Hasil</th>
</tr>
<tr>
	<th width="100">Perkebunan Rakyat/ Smallholders<br /></th>
    <th width="100">PBSN/ Privare Estates</th>
    <th width="100">Jumlah/Total</th>
    <th width="100">Perkebunan Rakyat/ Smallholders</th>
    <th width="100">PBSN/ Privare Estates</th>
    <th width="100">Jumlah/Total</th>
  </tr>
<?php 
$no=1;
foreach ($hasil as $data): ?>
	<tr>
    	<td align="center"><?php echo $no; ?></td>
    	<td ><?php echo $data->NamaKomoditi.'/'. $data->CommodityName ; ?></td>
        <td align="right"><?php echo number_format($data->TJmlKK,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TLuasArea,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TLuasArea1,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TLuasArea+$data->TLuasArea1,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TProduksi,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TProduksi1,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TProduksi+$data->TProduksi1,2,',','.'); ?></td>
        <td ><?php echo $data->BentukAkhir; ?></td>
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
