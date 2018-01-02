<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cnarasumber extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->auth->validasi();
	}
	
	function showform(){
		$this->load->view('narasumber/vfrmnarasumber');	
		
	}
	
	
	function simpannarasumber($kodediklat,$nip){
		$nip = str_replace("%20"," ",$nip);
		$datafrm['KodeDiklat'] = $kodediklat;
		$datafrm['NIP'] = $nip;

		$result = $this->db->replace('tb_narasumber',$datafrm);
		//echo $result;
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		$this->listnarasumber($kodediklat);
			
	}
	
	function hapusnarasumber($kodediklat,$nip){
		$nip = str_replace("%20"," ",$nip);
		$sql = "delete from tb_narasumber where kodediklat = '".$kodediklat."' and nip = '".$nip."'";	
		$this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		$this->listnarasumber($kodediklat);
	}
	
	
	function listnarasumber($kodediklat=""){
		$sql = "SELECT
			  `tb_narasumber`.`NIP`, `tb_daftarnarasumber`.*
			FROM
			  `tb_daftarnarasumber` INNER JOIN
			  `tb_narasumber` ON `tb_narasumber`.`NIP` = `tb_daftarnarasumber`.`NIP`
			WHERE `tb_narasumber`.`KodeDiklat` = '".$kodediklat."' order by `tb_narasumber`.`NIP`";
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
		$this->load->view('narasumber/vlistnarasumber',$data);
		
	}
	
	
	function listdaftarnarasumber($kodediklat=""){
		$sql = "select * from tb_daftarnarasumber order by NIP";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$row->Status = $this->isnarasumber($row->NIP,$kodediklat);
				$hasil[] = $row;
				
			}
			
		}else{
			$hasil = "";	
		}
		$data['datalist'] = $hasil;
		$data['kodediklat'] = $kodediklat;
		$this->load->view('narasumber/vlistdaftarnarasumber',$data);
	}
	
	function isnarasumber($nip,$kodediklat){
		$sql = "select * from tb_narasumber where nip = '".$nip."' and kodediklat = '".$kodediklat."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$row = $qry->row();	
			$panitia = "Checked";
		}else{
			$panitia = "";

		}
		return $panitia;
		
	}
	
	function totalnarasumber($kodediklat){
		$sql = "select * from tb_narasumber where kodediklat = '".$kodediklat."'";
		$qry = $this->db->query($sql);
		$total = $qry->num_rows();
		$data['total'] = $total;
		$data['kodediklat'] = $kodediklat;
		
		$this->load->view('narasumber/vfooter',$data);
		
	}
}