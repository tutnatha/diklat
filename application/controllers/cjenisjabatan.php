<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cjenisjabatan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->auth->validasi();
	}
	
	function showform(){
		$this->load->view('jenisjabatan/vfrmjenisjabatan');	
		
	}
	
	
	function simpan(){
		$datafrm = $_POST;
		//echo '<pre>';
		//print_r($datafrm);
		//echo '<//pre>';
		$sql = "select * from tb_jenis_jabatan where kodejabatan = '".$datafrm['KodeJabatan']."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$datawhr['KodeJabatan'] = $datafrm['KodeJabatan'];
			$this->db->where($datawhr);
			$this->db->update('tb_jenis_jabatan',$datafrm);
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		}else{
			$result = $this->db->insert('tb_jenis_jabatan',$datafrm);
			//echo $result;
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		}
		echo "<script>
			clearform();
		</script>";
		$this->listjenisjabatan();
			
	}
	
	function hapus($nip){
		$nip = $this->auth->trimming($nip);
		$datawhr['KodeJabatan'] = $nip;
		$this->db->delete('tb_jenis_jabatan',$datawhr);
		echo "<script>
			clearform();
		</script>";		
		$this->listjenisjabatan();	
	}
	
	function listjenisjabatan(){
		$sql = "SELECT * from tb_jenis_jabatan order by kodejabatan ";
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
		$this->load->view('jenisjabatan/vlistjenisjabatan',$data);
		
	}
	
	function edit($kodejabatan){
		$kodejabatan = $this->auth->trimming($kodejabatan);
		$sql = "SELECT * from tb_jenis_jabatan where KodeJabatan = '".$kodejabatan."'";
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		if($qry->num_rows()>0){
			$row = $qry->row();
			echo "<script>";
			foreach($row as $key=>$value){
				$value = $this->auth->cleartxt($value);
				echo "$('#".$key."').val('".$value."');";
			}
			echo "</script>";
		}
		

	}
}