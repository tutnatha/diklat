<!-- Beginning of compulsory code below -->
<script type='text/javascript'>




function usermanagement(){
	$('#headform').html('User Management');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("cusermanagement/showform","#konten");
	pageload("cusermanagement/listuser","#table");
}

function datapegawai(){
	$('#headform').html('Daftar Pegawai');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').hide();
	$('#search').show();
	$('#table').show();
	pageload("cpegawai/showform","#konten");
	pageload("cpegawai/shwosearch","#search");
	pageload("cpegawai/listpegawai","#table");
}

function unitkerja(){
	$('#headform').html('Daftar Unit Kerja');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("cunitkerja/showform","#konten");
	pageload("cunitkerja/listunitkerja","#table");
}

function jenisjabatan(){
	$('#headform').html('Daftar Jenis Jabatan');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("cjenisjabatan/showform","#konten");
	pageload("cjenisjabatan/listjenisjabatan","#table");
}

function jenisjabatanpanitia(){
	$('#headform').html('Daftar Jenis Jabatan Panitia');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("cjenisjabatanpanitia/showform","#konten");
	pageload("cjenisjabatanpanitia/listjenisjabatan","#table");
}

function jenisdiklat(){
	$('#headform').html('Daftar Jenis Diklat');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("cjenisdiklat/showform","#konten");
	pageload("cjenisdiklat/listjenisdiklat","#table");
}


function daftardiklat(){
	$('#headform').html('Daftar Diklat');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').hide();
	$('#search').show();
	$('#table').show();
	pageload("cdaftardiklat/showform","#konten");
	pageload("cdaftardiklat/shwosearch","#search");
	pageload("cdaftardiklat/listdaftardiklat","#table");
}

function panitiadiklat(){
	$('#headform').html('Daftar Panitia Diklat');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("cpanitiadiklat/showform","#konten");
	pageload("cpanitiadiklat/listpanitiadiklat","#table");
}

function pesertadiklat(){
	$('#headform').html('Daftar Peserta Diklat');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').hide();
	$('#search').show();
	$('#table').show();
	pageload("cpeserta/showform","#konten");
	pageload("cpeserta/shwosearch","#search");
	pageload("cpeserta/listpeserta","#table");
}

function daftarnarasumber(){
	$('#headform').html('Daftar Narasumber');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').hide();
	$('#search').show();
	$('#table').show();
	pageload("cdaftarnarasumber/showform","#konten");
	pageload("cdaftarnarasumber/shwosearch","#search");
	pageload("cdaftarnarasumber/listnarasumber","#table");
}

function narasumberdiklat(){
	$('#headform').html('Daftar Narasumber Diklat');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("cnarasumber/showform","#konten");
	pageload("cnarasumber/listnarasumber","#table");
}

function persetujuandiklat(){
	$('#headform').html('Daftar Diklat Yang Membutuhkan Persetujuan');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').hide();
	pageload("cpersetujuandiklat/loaddiklat","#konten");
}

function reportdaftardiklat(){
	$('#headform').html('Laporan Daftar Diklat');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').hide();
	pageload("claporan/showformdaftardiklat","#konten");
}

function logout(){
	$('#headform').html('Login Sistem Informasi Diklat');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').hide();	
	pageload("cdiklat/logout","#konten");
}
</script>

<ul id="nav">
	<li class="top"><a href="<?php echo base_url(); ?>" class="top_link"><span>Home</span></a></li>
    <!--<li class="top"><a href="javascript:void(0);" onclick='usermanagement()' class="top_link"><span>User Management</span></a></li>  -->
<!--    <li class="top"><a href="javascript:void(0)" id="Admin" class="top_link"><span class="down">Master Data</span></a>
    	<ul class="sub">
            <li><a href="javascript:void(0);" onclick='jenisjabatan()'>Jenis Jabatan Pegawai</a></li>
            <li><a href="javascript:void(0);" onclick='datapegawai()'>Data Pegawai</a></li>
            <li><a href="javascript:void(0);" onclick='jenisdiklat()'>Jenis Diklat</a></li>
            <li><a href="javascript:void(0);" onclick='jenisjabatanpanitia()'>Jenis Jabatan Panitia Diklat</a></li>
            <li><a href="javascript:void(0);" onclick='daftarnarasumber()'>Daftar Narasumber</a></li>
            <li><a href="javascript:void(0);" onclick=''>----------------------------------------</a></li>
            <li><a href="javascript:void(0);" onclick='usermanagement()'>User Management</a></li>
		</ul>
    </li>-->
	<li class="top"><a href="javascript:void(0)" id="Admin" class="top_link"><span class="down">Diklat</span></a>
    <ul class="sub">
           <li><a href="javascript:void(0);" onclick='daftardiklat()'>Daftar Diklat</a></li>
            <!-- <li><a href="javascript:void(0);" onclick='narasumberdiklat()'>Narasumber Diklat</a></li>
            <li><a href="javascript:void(0);" onclick='panitiadiklat()'>Panitia Diklat</a></li>
            <li><a href="javascript:void(0);" onclick='pesertadiklat()'>Peserta Diklat</a></li>-->
            <li><a href="javascript:void(0);" onclick=''>----------------------------------------</a></li>
            <li><a href="javascript:void(0);" onclick='persetujuandiklat()'>Persetujuan Diklat</a></li>
		</ul>
	<li class="top"><a href="javascript:void(0)" onClick="reportdaftardiklat()" class="top_link"><span>Laporan</span></a></li>
    
	


   <li class="top"><a href="javascript:void(0)" id="Admin" class="top_link"><span class="down">[ <?php echo $this->session->userdata('level'); ?> ]</span></a>
   		<ul class="sub">
            <li><a href="javascript:void(0);" onclick='logout()'>Logout</a></li>
		</ul>
</ul>



