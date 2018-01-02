<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php 

	$this->load->view('utama/vprintbutton'); 

?>

<html>
<head>
<title>Cetak Panitia Diklat</title>
</head>
<style type="text/css">


@media print
{
	#print
	{
		visibility:hidden;
		background-color:#CCC;
		margin:0 auto;
		padding:20px;
	}

@page  
{ 
    size: auto;   /* auto is the initial value */ 

    /* this affects the margin in the printer settings */ 
    margin: 10mm 10mm 10mm 10mm;  
} 
body{margin:0px}
	
}


caption h3{}
.list th, .list td{border:1px solid #999;}
th{padding:8px 0;background: #F0F0F0;}
td{padding:3px 7px;}

table{margin:0 auto}

.list
{
	margin:0 auto;width:100%;border-collapse:collapse;background:#FFFFFF;
	font-family:"Verdana", Times, serif;
	font-size:12px;
}

.ttd{page-break-after:always;}

hr
{
 border: none;
    /* top    */ border-top: 1px solid #ccc;
    /* middle */ background-color: #ddd; color: #ddd;
    height: 1px;
    *height: 2px; /* IE6+7 need the total height */

}


.judul1{font-size:16px; font-weight:bold; text-align:left}
.judul2{font-size:14px; font-family:"Verdana"; font-weight:bold; text-align:center}


</style>

<body>

<p class="judul2">DAFTAR DIKLAT<br>
</p>


<?php
if ($hasil=="")
{
?>
<table border="1" width="100%"  class="list">
<tr>
	<th  width="30px">No</th>
    <th>Kode Diklat</th>
    <th>Nama Diklat</th>
    <th>Tanggal</th>
    <th>Tempat</th>
    <th>Maks Peserta</th>
    <th>Jml Panitia</th>
    <th>Fas LPMP</th>
    <th>Kode Undangan</th>
    <th width="100px">Status</th>
    <th width="75px">Action</th>
</tr>
	<tr><td align="center" colspan="11"><font color="#FF0000"><br><br>**** Tidak ada hasil pencarian ****<br><br><br><br></font></td>
    </tr></table>
    
<?php
}
else
{
?>

<table border="1" width="100%"  class="list">
<tr>
	<th  width="30px">No</th>
    <th>Kode Diklat</th>
    <th>Nama Diklat</th>
    <th>Unit Kerja</th>
    <th>Tanggal</th>
    <th>Tempat</th>
    <th>Maks Peserta</th>
    <th>Jml Panitia</th>
    <th>Fas LPMP</th>
    <th>Kode Undangan</th>
    <th width="100px">Status</th>
</tr>

<?php 
$no=1;
foreach ($hasil as $data): ?>
	<tr>
    	<td align="center"><?php echo $no; ?></td>
    	
        <td ><?php echo $data->KodeDiklat; ?></td>
        <td ><?php echo $data->NamaDiklat; ?></td>
        <td ><?php echo $this->mdiklat->detailunitkerja($data->UnitKerja); ?></td>
        <td ><?php echo $this->auth->convertdate($data->DariTanggal,'short'); ?> - <?php echo $this->auth->convertdate($data->SampaiTanggal,'short'); ?></td>
        <td ><?php echo $data->Tempat; ?></td>
        <td align="center" ><?php echo $data->JmlPeserta; ?></td>
        <td align="center" ><?php echo $data->JmlPanitia; ?></td>
        <td align="center" ><?php echo $data->FasilitasLPMP; ?></td>
        <td ><?php echo $data->KodeUndangan; ?></td>
        <td >
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td align="center" bgcolor="<?php echo $data->Status[1]; ?>" title="Catatan Kabag Umum : <?php echo $data->Catatan1; ?>">1</td>
                <td align="center" bgcolor="<?php echo $data->Status[2]; ?>" title="Catatan PPK : <?php echo $data->Catatan2; ?>">2</td>
                <td align="center" bgcolor="<?php echo $data->Status[3]; ?>" title="Catatan Kepala : <?php echo $data->Catatan3; ?>">3</td>
                <td align="center" bgcolor="<?php echo $data->Status[4]; ?>" title="Catatan Panitia">4</td>
                <td align="center" bgcolor="<?php echo $data->Status[5]; ?>" title="Catatan PPK : <?php echo $data->Catatan4; ?>">5</td>
                <td align="center" bgcolor="<?php echo $data->Status[6]; ?>" title="Catatan Kepala : <?php echo $data->Catatan5; ?>">6</td>
              </tr>
            </tbody>
        </table></td>
		
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
