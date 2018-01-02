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
REKAPITULASI LUAS AREA DAN PRODUKSI PERKEBUNAN BESAR NEGARA (PBN/PTPN) TANAMAN TAHUNAN
PROVINSI BALI
<BR />
<?php if($kodekab != "") echo "<br>Kabupaten ".$this->mperkebunan->carinamakabupaten($kodekab); ?>
<?php if($kodekec != "") echo ", Kecamatan ".$this->mperkebunan->carinamakecamatan($kodekab,$kodekec); ?>
<br /><?php echo $periode; ?>, Tahun <?php echo $tahun; ?>

</h3>

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="list">
  <tr>
    <td rowspan="2" align="center">No</td>
    <td rowspan="2" align="center">Jenis Komoditas</td>
    <td colspan="6" align="center">Luas Area (Ha)</td>
    <td rowspan="2" align="center">Produksi Semester Laporan (Kg)</td>
    <td rowspan="2" align="center">Produktivitas Rata rata (Kg/Ha)</td>
    <td rowspan="2" align="center">Wujud Produksi</td>
    <td rowspan="2" align="center">Jumlah Tenaga Kerja Lepas/Non Staf (orang)</td>
  </tr>
  <tr>
    <td align="center">Area Sesuai Hak (HGU/yang lain)</td>
    <td align="center">Tanam Akhir Semester Lalu</td>
    <td align="center">TBM</td>
    <td align="center">TM</td>
    <td align="center">TTM</td>
    <td align="center">Tanam Akhir Semester Laporan</td>
  </tr>
  <tr>
    <td align="center">1</td>
    <td align="center">2</td>
    <td align="center">3</td>
    <td align="center">4</td>
    <td align="center">5</td>
    <td align="center">6</td>
    <td align="center">7</td>
    <td align="center">8</td>
    <td align="center">9</td>
    <td align="center">10</td>
    <td align="center">11</td>
    <td align="center">12</td>
  </tr>
  
<?php 
$no=1;
$kab = "";
foreach ($hasil as $data): ?>  
  <tr>
    <td align="center"><?php echo $no; ?></td>
    <td align="left"><?php echo $data->NamaKomoditi ; ?></td>
    <td align="center" width="50"><?php echo number_format($data->LuasArea,0,',','.'); ?></td>
    <td align="center" width="50"><?php echo number_format($data->TanamAkhirSemesterLalu,0,',','.'); ?></td>
    <td align="center" width="50"><?php echo number_format($data->TBM,0,',','.'); ?></td>
    <td align="center" width="50"><?php echo number_format($data->TM,0,',','.'); ?></td>
    <td align="center" width="50"><?php echo number_format($data->TTM,0,',','.'); ?></td>
    <td align="center" width="50"><?php echo number_format($data->TBM+$data->TM+$data->TTM,0,',','.'); ?></td>
    <td align="center" width="50"><?php echo number_format($data->Produksi,0,',','.'); ?></td>
    <td align="center" width="50"><?php if($data->TBM+$data->TM+$data->TTM == 0){echo "0";}else{ echo number_format($data->Produksi/($data->TBM+$data->TM+$data->TTM),0,',','.');} ?></td>
    <td align="left"  width="150"><?php echo $data->BentukAkhir ; ?></td>
    <td align="center" width="50"><?php echo number_format($data->JmlPetani,0,',','.'); ?></td>
  </tr>
   <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>

    


