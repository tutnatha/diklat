<html>
<head>
<title><?php echo $this->config->item('site_name');?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>asset/back/images/favicon.ico" />


<link rel="stylesheet" href="<?php echo base_url();?>asset/css/style.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>asset/css/mymenu.css"/>


<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/maskedinput.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/app.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>asset/js/mymenu.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>asset/js/accounting.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>asset/js/datepicker/datetimepicker_css.js"></script>


<script language="javascript">
	var site = "<?php echo base_url()?>index.php/";
	var baseurl = "<?php echo base_url()?>";
	var loading_image_large = "<?php echo base_url()?>asset/images/loading_large.gif";
	
</script>
</head>

<?php
	
  if ($this->session->userdata('username')==''){
   
		echo "<script> 
			$(document).ready(function(){
				pageload('cdiklat/loadlogin','#konten');
				pageload('cundangan/loadundangan','#konten');
				pageload('cdiklat/topmenu','#top_menu');
				$('#search').hide();
				$('#table').hide();
				$('#headform').html('Daftar Diklat Yang Bisa Diikuti');
				$('#top_menu').html('');
			});
			</script>";
	}else{
		echo "<script> 
			$(document).ready(function(){
				pageload('cdiklat/topmenu','#top_menu');
				pageload('cdiklat/welcome','#konten');
				$('#headform').html('Selamat Datang di Sistem Informasi Diklat');
				$('#konten').show();
				$('#search').hide();
				$('#table').hide();

			});
		</script>";
	}

 ?>

<body>
	<div id="wrapper">
    	<div id="head"></div>
        <div id="top_menu"></div>
        <div id="headform">Administrator Login</div>
        <div id="konten"></div>
        <div id="search"></div>
        <div id="table"></div>
        <div id="footer" align="center"><br><font color="#FFFFFF">Sistem Informasi Diklat</font></div>
    </div>
    
    <div id="script"></div>
</body>
</html>


