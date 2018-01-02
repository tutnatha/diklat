<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cunitkerja extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->auth->validasi();
	}
	
	function showform(){
		$this->load->view('unitkerja/vfrmunitkerja');	
		
	}
	
	
	function simpan(){
		$datafrm = $_POST;
		//echo '<pre>';
		//print_r($datafrm);
		//echo '<//pre>';
		$sql = "select * from tb_unit_kerja where kodeunitkerja = '".$datafrm['KodeUnitKerja']."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$datawhr['KodeUnitKerja'] = $datafrm['KodeUnitKerja'];
			$this->db->where($datawhr);
			$this->db->update('tb_unit_kerja',$datafrm);
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		}else{
			$result = $this->db->insert('tb_unit_kerja',$datafrm);
			//echo $result;
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		}
		echo "<script>
			clearform();
		</script>";
		$this->listunitkerja();
			
	}
	
	function hapus($nip){
		$nip = $this->auth->trimming($nip);
		$datawhr['KodeUnitKerja'] = $nip;
		$this->db->delete('tb_unit_kerja',$datawhr);
		echo "<script>
			clearform();
		</script>";		
		$this->listunitkerja();	
	}
	
	function listunitkerja(){
		$sql = "SELECT * from tb_unit_kerja order by KodeUnitKerja ";
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
		$this->load->view('unitkerja/vlistunitkerja',$data);
		
	}
	
	function edit($kodejabatan){
		$kodejabatan = $this->auth->trimming($kodejabatan);
		$sql = "SELECT * from tb_unit_kerja where KodeUnitKerja = '".$kodejabatan."'";
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