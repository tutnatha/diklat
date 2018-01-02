<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{

    function Auth()
    {
        $this->CI =& get_instance();
		$this->CI->load->database();
    }
	
		
	function validasi(){
		if ($this->CI->session->userdata('username')==''){
			//echo "<div align='center'><font color='red'>Silahkan login untuk membuka halaman ini</font></div>";
			echo "<script> alert('Anda tidak berhak membuka halaman ini'); </script>";
			header("Location: ".base_url());	
			die();
		}
	
	}
	
	function getnamamhs($nim){
		$sql = "select Nama from simsiswa_tbmahasiswa where nim = '".$nim."'";
		$qry = $this->CI->db->query($sql);
		if($qry->num_rows()>0){
			$row = $qry->row();
			$namamhs = $row->Nama;
		}else{
			$namamhs = "";	
		}
		return $namamhs;
		
	}
	
	function getkodefak($kodeprodi){
		$sql = "select Kode_Fak from simak_tb_prodi where kode_prodi = '".$kodeprodi."'";
		$qry = $this->CI->db->query($sql);
		if($qry->num_rows()>0){
			$row = $qry->row();
			$kodefak = $row->Kode_Fak;
		}else{
			$kodefak = "";	
		}
		return $kodefak;
	}
	
	function getnamafak($kodefak){
		$sql = "select nama from simak_tb_fakultas where kode_fak = '".$kodefak."'"	;
		$qry = $this->CI->db->query($sql);
		if($qry->num_rows>0){
			$row = $qry->row();
			$namafak = $row->nama;	
		}else{
			$namafak = "";
		}
		return "FAKULTAS ". $namafak;
	}
	
	function getnamaprodi($kodeprodi){
		$sql = "select nama from simak_tb_prodi where kode_prodi = '".$kodeprodi."'"	;
		$qry = $this->CI->db->query($sql);
		if($qry->num_rows>0){
			$row = $qry->row();
			$namaprodi = $row->nama;	
		}else{
			$namaprodi = "";
		}
		return "PROGRAM STUDI ". $namaprodi;
	}
	
    function cekUsername($username, $password, $level)
    {
		$this->warning("$username, $password, $level");

		$Nama_Group=null;
	
	//cek apakah username dan password valid
		$sql = "SELECT Nama_Group from simak_tb_user where Nama_user='".$username."' and Password='".$password."' and Kode_Level='".$level."'";
		//echo $sql;
		$query = $this->CI->db->query($sql);

		foreach ($query->result() as $row)
		{
			$Nama_Group = $row->Nama_Group;
			//echo "nama group : ".$Nama_Group;
		}
		//echo $Nama_group;
		if (! empty($Nama_Group) && $Nama_Group !='' && $Nama_Group != null){
			return $Nama_Group;
		}else{
			echo $this->warning("Username atau Password anda salah");
			return $Nama_Group;
		}
		
    }
	
	
	function cekHalaman($level, $grouphalaman)
	{
	$valid=false;
		for ($a =0; $a < count($grouphalaman); $a++ )
			{
				if ($grouphalaman[$a]==$level)
				{
					$valid = true;
					break;
					
				}
			
			}
		if ($valid == false)
			{
				echo $this->warning("Anda tidak berhak mengakses halaman ini");
				die();
			}
		//return $valid;
	}
	
	

	function pagination($url, $limit, $total, $divresult,$currentoffset,$namaform){
		if ($limit=="All"){$limit=$total;}
		$banyak = ceil($total/$limit);
		$hal = (ceil($currentoffset/$limit))+1;
		if ($banyak > 0){

			echo " Total: $total data <b> : : </b>";
			echo " Limit: <select id='pglimit'>";
				for ($x=10; $x<=100;){
					echo "<option value='$x'";
					if ($limit==$x){
						echo "selected='selected'";
					}
					echo ">$x</option>";
					$x=$x+10;
				}
			echo "<option value='All'";
			if ($limit==$total){
				echo "selected='selected'";
			}
			echo">All</option> ";	
			echo "</select> <b> : : </b>";
			
			echo " Halaman:". $hal ."/". $banyak . "<b> : : </b>";
			
			
			echo " Pindah ke hal: <select id='pageno'>";
				for ($x=1; $x<=$banyak; $x++){
					echo "<option value='$x'";
					if ($hal==$x){
						echo "selected='selected'";
					}
					echo ">$x</option>";
				}
			
			echo "</select>";
			
			
			
			$last = ($banyak-1) * $limit;
			echo "<script>
					$('#pageno').change(function(){
						var opp = ($('#pageno').val()-1) * $limit;
						var lim = $('#pglimit').val();
						openLink(\"".$url."\",opp,lim,\"".$divresult."\");
					});
					
					$('#pglimit').change(function(){
						var opp = ($('#pageno').val()-1) * $limit;
						var lim = $('#pglimit').val();
						openLink(\"".$url."\",0,lim,\"".$divresult."\");
					});
				
					function openLink(url,offset, limit ,divresult){
						send_form_loading(document.".$namaform.",url+'/'+offset+'/'+limit,divresult);
					}
				
				</script>";	
		}
	}	
	
	function inputtgl($id,$size){
		$tgl = array(
				'name'=>$id,
				'id'=>$id,
				'size'=>$size,
			);
		
		echo "<a href=\"javascript:NewCssCal('".$id."','ddmmyyyy')\"> ";
		echo form_input($tgl); 
		echo " <img src='". base_url()."asset/images/cal.gif' width='16' height='16' alt='Pick a date'>";
		echo "</a>";
	}
	
	function warning($input,$goTo='')
    {
        if($goTo=='')
        {
           $goTo = base_url();
        }
        $output="<script> 
                alert(\"$input\");
                location = '$goTo';
            </script>";
        return $output;
    }

	function inversdate($tgl){
		$date = explode("-",$tgl);
		$tanggal="";
		if(count($date)>1){
			$tanggal=$date[2].'-'.$date[1].'-'.$date[0];
		}
		return $tanggal;	
	}
	
	function convertdate($tanggal,$tipe=""){
		$tgl = explode("-",$tanggal);
		$bulan="";
		
		if($tipe == "short"){
			switch ($tgl[1]){
				case 1: $bulan = 'Jan'; break;	
				case 2: $bulan = 'Feb'; break;	
				case 3: $bulan = 'Mar'; break;	
				case 4: $bulan = 'Apr'; break;	
				case 5: $bulan = 'Mei'; break;	
				case 6: $bulan = 'Jun'; break;	
				case 7: $bulan = 'Jul'; break;	
				case 8: $bulan = 'Ags'; break;	
				case 9: $bulan = 'Sep'; break;	
				case 10: $bulan = 'Okt'; break;	
				case 11: $bulan = 'Nov'; break;	
				case 12: $bulan = 'Des'; break;	
			}

		}else{
			switch ($tgl[1]){
				case 1: $bulan = 'Januari'; break;	
				case 2: $bulan = 'Februari'; break;	
				case 3: $bulan = 'Maret'; break;	
				case 4: $bulan = 'April'; break;	
				case 5: $bulan = 'Mei'; break;	
				case 6: $bulan = 'Juni'; break;	
				case 7: $bulan = 'Juli'; break;	
				case 8: $bulan = 'Agustus'; break;	
				case 9: $bulan = 'September'; break;	
				case 10: $bulan = 'Oktober'; break;	
				case 11: $bulan = 'November'; break;	
				case 12: $bulan = 'Desember'; break;	
			}
		}
		if($bulan==""){
			$tglakhir="";
		}else{
			$tglakhir = $tgl[2]." ".$bulan." ".$tgl[0];
		}
		return $tglakhir;
		
	}
	
	function trimming($input){
		$exp = explode("%20",$input);
		$outp = "";
		for ($a = 0; $a < count($exp); $a++){
			$outp = $outp. " ". $exp[$a];
		}
		$outp = trim($outp);
		return $outp;
	
	}
	
	function cleartxt($value){//untuk dirampilkan di form dengan javascript.
		$value = json_encode($value);
		$value = substr($value,1,-1);
		$value = str_replace("'","\'",$value);
		$value = str_replace('"','\"',$value);
		if($value=="ul"){$value="";}
		return $value;
	}
	
	function hapusdata($sql){
		$qry = $this->CI->db->query($sql);
		$errno= $this->CI->db->_error_number();
		$errmsg = $this->CI->db->_error_message();
		if($errno == 1451){
			echo "<script> alert('Data tidak bisa dihapus karena berrelasi dengan data lain'); </script>";	
		}elseif ($errno != 0){
			echo $errno."--".$errmsg;
		}
		
	}
	
	function editbutton(){
		echo "<img src='". base_url()."asset/images/edit.gif' alt='Edit'>";

	}
	
	function deletebutton(){
		echo "<img src='". base_url()."asset/images/delete.gif' alt='Edit'>";

	}
	

}