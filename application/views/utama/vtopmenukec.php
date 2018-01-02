<!-- Beginning of compulsory code below -->
<script type='text/javascript'>


function kabupaten(){
	$('#headform').html('Daftar Kabupaten');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("ckabupaten/showform","#konten");
	pageload("ckabupaten/listkabupaten","#table");
	//pageload("ckegiatan/listkegiatan/0/20","#table");
}

function kecamatan(){
	$('#headform').html('Daftar Kecamatan');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("ckecamatan/showform","#konten");
	//pageload("ckabupaten/listkabupaten","#table");
	//pageload("ckegiatan/listkegiatan/0/20","#table");
}
function desa(){
	$('#headform').html('Daftar Desa');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("cdesa/showform","#konten");
	//pageload("ckabupaten/listkabupaten","#table");
	//pageload("ckegiatan/listkegiatan/0/20","#table");
}
function komoditi(){
	$('#headform').html('Daftar Komoditi');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("ckomoditi/showform","#konten");
	pageload("ckomoditi/listkomoditi","#table");
}

function perusahaan(){
	$('#headform').html('Daftar Perusahaan');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("cperusahaan/showform","#konten");
	pageload("cperusahaan/listperusahaan","#table");
}

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

function produksi(){
	$('#headform').html('Produksi Hasil Perkebunan');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').hide();
	pageload("cproduksi/showform","#konten");
	//pageload("cproduksi/listproduksi","#table");
}
function tabel1(){
	$('#headform').html('Laporan Tabel 1');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').hide();
	pageload("claporan/showform1","#konten");
}
function tabel2(){
	$('#headform').html('Laporan Tabel 2');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').hide();
	pageload("claporan/showform2","#konten");
}
function tabel3(){
	$('#headform').html('Laporan Tabel 3');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').hide();
	pageload("claporan/showform2","#konten");
}

function tabel4(){
	$('#headform').html('Laporan Tabel 4');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').hide();
	pageload("claporan/showform4","#konten");
}

function tabel5(){
	$('#headform').html('Laporan Tabel 5');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').hide();
	pageload("claporan/showform5","#konten");
}

function tabel6(){
	$('#headform').html('Laporan Tabel 6');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').hide();
	pageload("claporan/showform6","#konten");
}
function daftarnilai(){
	$('#headform').html('Daftar Nilai Mahasiswa');
	$('#konten').html('');
	$('#search').html('');
	$('#table').html('');
	$('#konten').show();
	$('#search').hide();
	$('#table').show();
	pageload("claporan/showform","#konten");
	//pageload("cinputnilai/showform","#konten");

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
    <!--<li class="top"><a href="javascript:void(0);" onclick='usermanagement()' class="top_link"><span>User Management</span></a></li>  -->
    <li class="top"><a href="javascript:void(0)" id="Admin" class="top_link"><span class="down">Master Data</span></a>
    	<ul class="sub">
            <!--<li><a href="javascript:void(0);" onclick='kabupaten()'>Daftar Kabupaten</a></li>-->
            <li><a href="javascript:void(0);" onclick='desa()'>Daftar Desa</a></li>
             <!--<li><a href="javascript:void(0);" onclick=''>----------------------------------------</a></li>
            <li><a href="javascript:void(0);" onclick='komoditi()'>Daftar Komoditi</a></li>
            <li><a href="javascript:void(0);" onclick='perusahaan()'>Daftar Perusahaan</a></li>
            <li><a href="javascript:void(0);" onclick=''>----------------------------------------</a></li>
            <li><a href="javascript:void(0);" onclick='usermanagement()'>User Management</a></li>-->
		</ul>
    </li>
	<li class="top"><a href="javascript:void(0);" onclick='produksi()' class="top_link"><span>Produksi</span></a></li>
	<li class="top"><a href="javascript:void(0)" id="Admin" class="top_link"><span class="down">Laporan</span></a>
		<ul class="sub">
            <li><a href="javascript:void(0);" onclick='tabel1()'>Tabel 1</a></li>
            <li><a href="javascript:void(0);" onclick='tabel2()'>Tabel 2</a></li>
            <li><a href="javascript:void(0);" onclick='tabel3()'>Tabel 3</a></li>
            <li><a href="javascript:void(0);" onclick='tabel4()'>Tabel 4</a></li>
            <li><a href="javascript:void(0);" onclick='tabel5()'>Tabel 5</a></li>
            <li><a href="javascript:void(0);" onclick='tabel6()'>Tabel 6</a></li>
		</ul>
	</li>


   <li class="top"><a href="javascript:void(0);" onclick='logout()' class="top_link"><span>Logout</span></a></li>  
</ul>



