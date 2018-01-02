<style type="text/css">

.list
{
	margin:0 auto;width:100%;border-collapse:collapse;background:#FFFFFF;
	font-family:"arial", Times, serif;
	font-size:12px;
}

</style>


<body bgcolor="#D9D8D8">
<table width="100%">
<tr><td align="center">

<table width="700px" bgcolor="#FFFFFF">
<tr>
    	<td colspan="2" align="center"><br><font size="+1"><b> Bukti Pendaftaran Diklat <br> <?php echo $NamaDiklat; ?></b></font><br>
    	  <br>
          <?php if (file_exists(UPLOAD_FILE_PATH.$NIP.".jpg")){ ?>
    	  <img src="<?php echo base_url(); ?>foto/<?php echo $NIP; ?>.jpg" width="210" height="280" alt=""/> 
          <?php } ?>
          <br><br></td>
        </tr>    
<tr>
    	<td width="30%" align="right">NIP :</td>
        <td><?php echo $NIP; ?></td>
    </tr>    
	<tr>
    	<td align="right">Nama  :</td>
        <td><?php echo $Nama; ?></td>
    </tr>
	<tr>
    	<td align="right">Tempat/Tgl Lahir :</td>
        <td><?php echo $TempatLahir; ?>, 
        	<?php echo $this->auth->inversdate($TglLahir); ?>
        </td>
    </tr>      
	<tr>
    	<td align="right">Nomor HP :</td>
        <td><?php echo $NomorHP; ?></td>
    </tr>
	<tr>
    	<td align="right">Email :</td>
        <td><?php echo $Email; ?></td>
    </tr>    
    	<tr>
    	<td align="right">Jenis Kelamin :</td>
        <td><?php echo $JenisKelamin; ?></td>
    </tr> 
   	<tr>
    	<td align="right">Pendidikan Terakhir:</td>
        <td><?php echo $PendidikanTerakhir; ?></td>
    </tr>  
    	<tr>
    	<td align="right">No NPWP :</td>
        <td><?php echo $NPWP; ?></td>
    </tr>       
	<tr>
    	<td align="right">Nama Instansi :</td>
        <td><?php echo $NamaInstansi; ?></td>
    </tr> 
	<tr>
    	<td align="right">Alamat Instansi :</td>
        <td><?php echo $AlamatInstansi; ?></td>
    </tr>  
	<tr>
    	<td align="right">Provinsi :</td>
        <td><?php echo $Provinsi; ?></td>
    </tr>       
	<tr>
    	<td align="right">Kabupaten :</td>
        <td><?php echo $Kabupaten; ?></td>
    </tr>   
	<tr>
    	<td align="right">No Telp :</td>
        <td><?php echo $NoTelp; ?></td>
    </tr>   
	<tr>
    	<td align="right">Jabatan :</td>
        <td><?php echo $Jabatan; ?></td>
    </tr>          
</table>
</td></tr></table>
</body>