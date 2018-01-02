<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cjenisdiklat extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->auth->validasi();
	}
	
	function showform(){
		$this->load->view('jenisdiklat/vfrmjenisdiklat');	
		
	}
	
	
	function simpan(){
		$datafrm = $_POST;
		//echo '<pre>';
		//print_r($datafrm);
		//echo '<//pre>';
		$sql = "select * from tb_jenis_diklat where KodeJenis = '".$datafrm['KodeJenis']."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$datawhr['KodeJenis'] = $datafrm['KodeJenis'];
			$this->db->where($datawhr);
			$this->db->update('tb_jenis_diklat',$datafrm);
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		}else{
			$result = $this->db->insert('tb_jenis_diklat',$datafrm);
			//echo $result;
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		}
		echo "<script>
			clearform();
		</script>";
		$this->listjenisdiklat();
			
	}
	
	function hapus($nip){
		$nip = $this->auth->trimming($nip);
		$datawhr['KodeJenis'] = $nip;
		$this->db->delete('tb_jenis_diklat',$datawhr);
		echo "<script>
			clearform();
		</script>";		
		$this->listjenisdiklat();	
	}
	
	function listjenisdiklat(){
		$sql = "SELECT * from tb_jenis_diklat order by namajenis ";
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
		$this->load->view('jenisdiklat/vlistjenisdiklat',$data);
		
	}
	
	function edit($kodejenis){
		$kodejenis = $this->auth->trimming($kodejenis);
		$sql = "SELECT * from tb_jenis_diklat where KodeJenis = '".$kodejenis."'";
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