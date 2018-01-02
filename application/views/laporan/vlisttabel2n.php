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
Tabel 2<?php if($kodekomoditi!=''){ echo ".".intval($kodekomoditi);} ?> : ESTIMASI LUAS AREAL DAN PRODUKSI KOMODITAS PERKEBUNAN RAKYAN DAN PBSN DI BALI <br />DIRINCI MENURUT KABUPATEN DAN KEBUN (PBSN) TAHUN <?php echo $tahun ?>
<BR />JENIS KOMODITI <?php echo strtoupper($namakomoditi['indonesia']); ?>


<br />
<i>Table 2<?php if($kodekomoditi!=''){ echo ".".intval($kodekomoditi);} ?> : Productioin and Area Estimates Of Estate Crops By Regency and Private Estates In Bali , <?php echo $tahun ?>
<BR />Commodity <?php echo $namakomoditi['english']; ?>
</i>
</h3>

<table border="1" width="100%"  class="list">
<tr>
	<th width="30" rowspan="2">No</th>
    <th rowspan="2">Komoditas/<br /> Commodities</th>
    <th height="25" colspan="4">Luas Area (Ha) / Area (Hectare)</th>
    <th width="100" rowspan="2">Produksi/ Production<br />
    (Ton)</th>
    <th width="100" rowspan="2">Produktivitas (Kg/Ha/Th)<br />
    Yield (kg/ha/years)</th>
    <th width="100" rowspan="2">Petani<br />
      (KK)/ Farmer<br />
      (household)</th>
    <th width="100" rowspan="2">Jml Tenaga Kerja (HOK)/Number Of Employeers (person</th>
</tr>
<tr>
  <th width="100">TBM/ Young Plant <br />
    (Ha)</th>
	<th width="100">TM/ Productive Plant<br />
    (Ha)	  <br /></th>
    <th width="100">TTM/TR/Old/Damage Plant<br />
      (Ha)</th>
    <th width="100">Jumlah/Total</th>
  </tr>
<?php 
$no=1;
foreach ($hasil as $data): ?>
	<tr>
    	<td align="center"><?php echo $no; ?></td>
    	<td ><?php echo $data->NamaKabupaten ; ?></td>
        <td align="right"><?php echo number_format($data->TotTBM,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotTM,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotTTM,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotTBM+$data->TotTM+$data->TotTTM,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotProduksi,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotProduksi/($data->TotTBM+$data->TotTM+$data->TotTTM),2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotJmlKK,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotJmlPetani,2,',','.'); ?></td>
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
<?php 
if($hasil1!= ""){
$no=1;
foreach ($hasil1 as $data): ?>
	<tr>
    	<td align="center"><?php echo $no; ?></td>
    	<td ><?php echo $data->NamaKabupaten ; ?></td>
        <td align="right"><?php echo number_format($data->TotTBM,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotTM,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotTTM,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotTBM+$data->TotTM+$data->TotTTM,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotProduksi,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotProduksi/($data->TotTBM+$data->TotTM+$data->TotTTM),2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotJmlKK,2,',','.'); ?></td>
        <td align="right"><?php echo number_format($data->TotJmlPetani,2,',','.'); ?></td>
    </tr>
    <?php $no++; ?>
<?php endforeach; }?>
</table>
<?php 
}
?>
