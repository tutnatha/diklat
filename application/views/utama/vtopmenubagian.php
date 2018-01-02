<!-- Beginning of compulsory code below -->
<script type='text/javascript'>
function jenisnilai(){
	$('#headform').html('Input Jenis Nilai');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("cjenisnilai/showform","#konten");
	pageload("cjenisnilai/listjenisnilai","#table");
}

function inputnilai(){
	$('#headform').html('Input Nilai Mahasiswa');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("cinputnilai/showform","#konten");
}




function logout(){
	$('#headform').html('Login Sistem Penilaian Coass');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').hide();	
	pageload("cperkebunan/logout","#konten");
}
</script>

<ul id="nav">
	<li class="top"><a href="<?php echo base_url(); ?>" class="top_link"><span>Home</span></a></li>
    <li class="top"><a href="javascript:void(0);" onclick='' class="top_link"><span>Nilai</span></a> 
   	 <ul class="sub">
            <li><a href="javascript:void(0);" onclick='jenisnilai()'>Jenis Nilai</a></li>
            <li><a href="javascript:void(0);" onclick='inputnilai()'>Input Nilai</a></li>
		</ul>
     </li> 
    <!--<li class="top"><a href="javascript:void(0);" onclick='kegiatan()' class="top_link"><span>Kegiatan</span></a></li>
    <li class="top"><a href="javascript:void(0);" onclick='PenggunaanSarana()' class="top_link"><span>Penggunaan Sarana</span></a></li>  
	<li class="top"><a href="javascript:void(0)" id="Admin" class="top_link"><span class="down">Laporan</span></a>
		<ul class="sub">
            <li><a href="javascript:void(0);" onclick='saranakegiatan()'>Sarana Per Kegiatan</a></li>
            <li><a href="javascript:void(0);" onclick='jadwalpenggunaansarana()'>Jadwal Penggunaan Sarana</a></li>
		</ul>
	</li>-->


   <li class="top"><a href="javascript:void(0);" onclick='logout()' class="top_link"><span>Logout</span></a></li>  
</ul>



