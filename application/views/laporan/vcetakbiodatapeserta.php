<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<html>
<head>
<title>Cetak Biodata Peserta Diklat</title>
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
.ttd{page-break-after:always;}

</style>

<body>


<?php
if ($datalist=="")
{
?>
  <font color="#FF0000"><br>
  <br>**** Tidak ada data ****<br><br><br><br>
  </font>
  
  <?php
}
else
{
	$this->load->view('utama/vprintbutton');
?>
  
  
  
  
  <?php 
$no=1;
foreach ($datalist as $data): ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="center" valign="middle"><table width="800" border="0" cellspacing="0" cellpadding="4">
        <tbody>
          <tr>
            <td colspan="2" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td width="14%"><img src="<?php echo base_url() ?>asset/images/tutwurihandayani.gif" width="123" height="116" alt=""/></td>
                  <td width="86%" align="center" valign="middle" >KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN<br>
                    <strong><font size="+2" >LEMBAGA PENJAMINAN MUTU PENDIDIKAN<br>
                    PROVINSI BALI</font></strong></td>
                </tr>
                <tr>
                  <td colspan="2" align="center"><hr></td>
                  </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><p>BIODATA PESERTA</p>
              <p>PELATIHAN <?php echo strtoupper($diklat->NamaDiklat); ?></p>
              <br></td>
            </tr>
          <tr>
            <td width="233">Nama <em>(lengkap)</em></td>
            <td width="567">: <?php echo $data->Nama; ?></td>
          </tr>
          <tr>
            <td>NUPTK/PTK ID/KTP</td>
            <td>: <?php echo $data->NIP; ?></td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>: <?php echo $data->Jabatan; ?></td>
          </tr>
          <tr>
            <td>Kelas/Mapel yang diampu</td>
            <td>: <?php echo $data->Mapel; ?></td>
          </tr>
          <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>: <?php echo $data->TempatLahir; ?>, <?php echo $this->auth->convertdate($data->TglLahir); ?></td>
          </tr>
          <tr>
            <td>Pangkat, Golongan</td>
            <td>: <?php echo $data->Pangkat; ?>, <?php echo $data->Golongan; ?></td>
          </tr>
          <tr>
            <td>Tempat Tugas</td>
            <td>: <?php echo $data->NamaInstansi; ?></td>
          </tr>
          <tr>
            <td>Alamat Tempat Tugas</td>
            <td>: <?php echo $data->AlamatInstansi; ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Telp. <?php echo $data->NoTelp; ?>, Fax. <?php echo $data->Fax; ?></td>
          </tr>
          <tr>
            <td>Alamat Rumah</td>
            <td>: <?php echo $data->Alamat; ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>No. Telp. <?php echo $data->TelpRumah; ?>, No. HP : <?php echo $data->NomorHP; ?></td>
          </tr>
          <tr>
            <td>Alamat Email</td>
            <td>: <?php echo $data->Email; ?></td>
          </tr>
          <tr>
            <td>Nomor NPWP</td>
            <td>: <?php echo $data->NPWP; ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="center">Denpasar, <?php echo $this->auth->convertdate(date('Y-m-d')); ?>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br><?php echo $data->Nama; ?><br><?php echo $data->NIP; ?></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
<p class="ttd"></p>
    <?php $no++; ?>
<?php endforeach; ?>
<?php 
}
?>
