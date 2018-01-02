<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php 
if($format=="html"){
	$this->load->view('utama/vprintbutton'); 
}else{
	header("Content-type: application/ms-excel");
	header("Content-Disposition: attachment; filename = DaftarPanitia.xls");
	header("Pragma: no-cache");
	header("Expires: 0");	
}
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

<p class="judul2">DAFTAR PANITIA DIKLAT<br>
<?php echo strtoupper($diklat->NamaDiklat); ?>
</p>
<table border="1" width="100%"  class="list">
<tr>
	<th width="50px">No</th>
    <th width="200px">NIP</th>
    <th>Nama</th>
    <th width="200px">Jabatan Kepanitiaan</th>
</tr>
<?php
if ($hasil=="")
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
foreach ($hasil as $data): ?>
	<tr>
    	<td align="center"><?php echo $no; ?></td>
    	<td ><?php echo $data->NIP; ?></td>
        <td ><?php echo $data->Nama; ?></td>
        <td ><?php echo $data->NamaJabatan; ?></td>
		
    </tr>
    <?php $no++; ?>
<?php endforeach; ?>
</table>
<?php 
}
?>
