<!-- Beginning of compulsory code below -->
<script type='text/javascript'>
function login(){
	$('#headform').html('Login Sistem Informasi Diklat');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').hide();	
	pageload('cdiklat/loadlogin','#konten');
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
   
     <li class="top"><a href="javascript:void(0);" onclick='login()' class="top_link"><span>Login</span></a></li>  
    <!--<li class="top"><a href="javascript:void(0);" onclick='kegiatan()' class="top_link"><span>Kegiatan</span></a></li>
    <li class="top"><a href="javascript:void(0);" onclick='PenggunaanSarana()' class="top_link"><span>Penggunaan Sarana</span></a></li>  
	<li class="top"><a href="javascript:void(0)" id="Admin" class="top_link"><span class="down">Laporan</span></a>
		<ul class="sub">
            <li><a href="javascript:void(0);" onclick='saranakegiatan()'>Sarana Per Kegiatan</a></li>
            <li><a href="javascript:void(0);" onclick='jadwalpenggunaansarana()'>Jadwal Penggunaan Sarana</a></li>
		</ul>
	</li>-->


   
</ul>



