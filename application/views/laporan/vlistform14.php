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
REKAPITULASI LUAS AREAL DAN PRODUKSI PERKEBUNAN RAKYAT TANAMAN TAHUNAN
PROVINSI BALI
<BR />
<?php if($kodekab != "") echo "<br>Kabupaten ".$this->mperkebunan->carinamakabupaten($kodekab); ?>
<?php if($kodekec != "") echo ", Kecamatan ".$this->mperkebunan->carinamakecamatan($kodekab,$kodekec); ?>
<br /><?php echo $periode; ?>, Tahun <?php echo $tahun; ?>

</h3>

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="list">
  <tr>
    <td rowspan="3" align="center">No</td>
    <td rowspan="3" align="center">Jenis Komoditas</td>
    <td rowspan="3" align="center">Tanaman Pada Akhir Tahun Lalu</td>
    <td colspan="8" align="center">Luas Area (Ha)</td>
    <td colspan="2" align="center">Produksi (Kg)</td>
    <td colspan="2" align="center">Produksi (Kg)</td>
    <td rowspan="3" align="center">Wujud Produksi</td>
    <td colspan="2" rowspan="2" align="center">Jml Petani Pekebun KK</td>
    <td rowspan="3" align="center">Ket.</td>
  </tr>
  <tr>
    <td colspan="4" align="center">Mutasi Dalam Tahun Laporan</td>
    <td colspan="4" align="center">Kondisi</td>
    <td colspan="2" align="center">Akhir Tahun Lalu</td>
    <td colspan="2" align="center">Pada Tahun Laporan</td>
  </tr>
  <tr>
    <td align="center">Tanam Ulang</td>
    <td align="center">Tanam Baru</td>
    <td align="center">Pengu rangan</td>
    <td align="center">Jml</td>
    <td align="center">TBM</td>
    <td align="center">TM</td>
    <td align="center">TTM</td>
    <td align="center">Jml</td>
    <td align="center">Jml (kg)</td>
    <td align="center">Rata rata (Kg/Ha)</td>
    <td align="center">Jml (Kg)</td>
    <td align="center">Rata rata (Kg/Ha)</td>
    <td align="center">Pemilik</td>
    <td align="center">BMU</td>
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
    <td align="center">13</td>
    <td align="center">14</td>
    <td align="center">15</td>
    <td align="center">16</td>
    <td align="center">17</td>
    <td align="center">18</td>
    <td align="center">19</td>
  </tr>
<?php 
$no=1;
$kab = "";
foreach ($hasil as $data): ?>  
  <tr>
    <td align="center"><?php echo $no; ?></td>
    <td align="left"><?php echo $data->NamaKomoditi ; ?></td>
    <td align="center" width="30"><?php echo number_format($data->LuasTahunLalu,0,',','.'); ?></td>
    <td align="center" width="30"><?php echo number_format($data->TanamUlang,0,',','.'); ?></td>
    <td align="center" width="30"><?php echo number_format($data->TanamBaru,0,',','.'); ?></td>
    <td align="center" width="30"><?php echo number_format($data->Pengurangan,0,',','.'); ?></td>
    <td align="center" width="30"><?php echo number_format($data->LuasTahunLalu+$data->TanamBaru-$data->Pengurangan,0,',','.'); ?></td>
    <td align="center" width="30"><?php echo number_format($data->TBM,0,',','.'); ?></td>
    <td align="center" width="30"><?php echo number_format($data->TM,0,',','.'); ?></td>
    <td align="center" width="30"><?php echo number_format($data->TTM,0,',','.'); ?></td>
    <td align="center" width="30"><?php echo number_format($data->TBM+$data->TM+$data->TTM,0,',','.'); ?></td>
    <td align="center" width="30"><?php echo number_format($data->ProduksiTahunLalu,0,',','.'); ?></td>
    <td align="center" width="30"><?php if($data->LuasTahunLalu == 0){echo "0";}else{echo number_format($data->ProduksiTahunLalu/$data->LuasTahunLalu,0,',','.');} ?></td>
    <td align="center" width="30"><?php echo number_format($data->Produksi,0,',','.'); ?></td>
    <td align="center" width="30"><?php if($data->LuasArea == 0){echo "0";}else{echo number_format($data->Produksi/$data->LuasArea,0,',','.');} ?></td>
	<td align="left"  width="150"><?php echo $data->BentukAkhir ; ?></td>
    <td align="center" width="30"><?php echo number_format($data->JmlKK,0,',','.'); ?></td>
    <td align="center" width="30"><?php echo number_format($data->JmlPetani,0,',','.'); ?></td>
    <td align="center">&nbsp;</td>
  </tr>
   <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>

    


