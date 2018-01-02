<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cpanitiadiklat extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->auth->validasi();
	}
	
	function showform(){
		$this->load->view('panitiadiklat/vfrmpanitiadiklat');	
		
	}
	
	
	function simpanpanitia($kodediklat,$nip,$jabatan=""){
		$nip=str_replace("%20", " ", $nip);
		$nip=str_replace("-", " ", $nip);
		$datafrm['KodeDiklat'] = $kodediklat;
		$datafrm['NIP'] = $nip;
		if($jabatan != ""){
			$datafrm['Jabatan'] = $jabatan;	
		}
		$result = $this->db->replace('tb_panitia',$datafrm);
		//echo $result;
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		$this->listpanitiadiklat($kodediklat);
			
	}
	
	function hapuspanitia($kodediklat,$nip){
$nip=str_replace("%20", " ", $nip);

		$sql = "delete from tb_panitia where kodediklat = '".$kodediklat."' and nip = '".$nip."'";	
		$this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		$this->listpanitiadiklat($kodediklat);
	}
	
	
	function listpanitiadiklat($kodediklat=""){
		$sql = "SELECT
		  `tb_panitia`.`NIP`, `tb_pegawai`.`Nama`,
		  `tb_jenis_jabatan_panitia`.`NamaJabatan`
				FROM
		  `tb_jenis_jabatan_panitia` RIGHT JOIN
		  `tb_panitia` ON `tb_panitia`.`Jabatan` =
			`tb_jenis_jabatan_panitia`.`KodeJabatan` INNER JOIN
		  `tb_pegawai` ON `tb_panitia`.`NIP` = `tb_pegawai`.`NIP`
		WHERE `tb_panitia`.`KodeDiklat` = '".$kodediklat."' order by `tb_jenis_jabatan_panitia`.`KodeJabatan` desc";
		 //echo $sql;
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$hasil[] = $row;	
			}
			
		}else{
			$hasil= "";	
		}
		$data['hasil'] = $hasil;
		$this->load->view('panitiadiklat/vlistpanitiadiklat',$data);
		
	}
	
	
	function listpegawai($kodediklat=""){
		$sql = "select * from tb_pegawai order by NIP";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$row->Panitia = $this->jabatanpanitia($row->NIP,$kodediklat);
				$hasil[] = $row;
				
			}
			
		}else{
			$hasil = "";	
		}
		$data['datalist'] = $hasil;
		$data['kodediklat'] = $kodediklat;
		$this->load->view('panitiadiklat/vlistpegawai',$data);
	}
	
	function jabatanpanitia($nip,$kodediklat){
$nip=str_replace("%20", " ", $nip);
		$sql = "select * from tb_panitia where nip = '".$nip."' and kodediklat = '".$kodediklat."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$row = $qry->row();	
			$panitia[0] = "Checked";
			$panitia[1] = $row->Jabatan;
		}else{
			$panitia[0] = "";
			$panitia[1] = "";
		}
		return $panitia;
		
	}
	
	function totalpegawai($kodediklat){
		$sql = "select * from tb_panitia where kodediklat = '".$kodediklat."'";
		$qry = $this->db->query($sql);
		$total = $qry->num_rows();
		$data['total'] = $total;
		$data['kodediklat'] = $kodediklat;
		
		$this->load->view('panitiadiklat/vfooter',$data);
		
	}
	
	function showformpassword($kodediklat,$nip){
$nip=str_replace("%20", " ", $nip);

		$pegawai = $this->mdiklat->detailpegawai($nip);
		$datalist['namapegawai'] = $pegawai=="" ? '' : $pegawai->Nama;
		$datalist['KodeDiklat'] = $kodediklat;
		$datalist['NIP'] = $nip;
		$this->load->view('panitiadiklat/vfrmpassword', $datalist);	
	}
	
	function simpanpassword(){
		
		$dathwr['KodeDiklat'] = $_POST['KodeDiklat'];
		$dathwr['NIP'] = $_POST['NIP'];
		$datafrm['Password'] = md5($_POST['Password']);
		
		$this->db->update('tb_panitia',	$datafrm, $dathwr);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		echo "<script>
			alert('Password telah berhasil disimpan');
			$('#fade').click();
		
		</script>";
		
	}
}