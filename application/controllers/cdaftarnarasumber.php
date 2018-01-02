<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cdaftarnarasumber extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->auth->validasi();
	}
	
	function showform(){
		$this->load->view('daftarnarasumber/vfrmnarasumber');	
		
	}
	
	function shwosearch(){
		$this->load->view('daftarnarasumber/vsearch');
	}
	
	
	function simpan(){
		$datafrm = $_POST;
		
		$sql = "select * from tb_daftarnarasumber where NIP = '".$datafrm['NIP']."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$datawhr['NIP'] = $datafrm['NIP'];
			
			$this->db->where($datawhr);
			$this->db->update('tb_daftarnarasumber',$datafrm);
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		}else{
			
			$this->db->insert('tb_daftarnarasumber',$datafrm);
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}	
		}

		
		echo "<script>
			clearform();
		</script>";
		$this->listnarasumber();
			
	}
	
	function hapus($nip){
		$nip = $this->auth->trimming($nip);
		$datawhr['NIP'] = $nip;
		$this->db->delete('tb_daftarnarasumber',$datawhr);
		echo "<script>
			clearform();
		</script>";		
		$this->listnarasumber();	
	}
	
	function listnarasumber($offset=0,$limit=20){
		$divresult="#table";
		$katakunci = $this->input->post('txtcariutama');

		$sql = "SELECT * from tb_daftarnarasumber where NIP <> ''";
		if(empty($katakunci)){$katakunci="";}	
		if ($katakunci!=""){
			$katakunci = $this->auth->trimming($katakunci);
			$sql.= " and (";
				$sql.= " NIP like '%".$katakunci."%'";
				$sql.= " or Nama like '%".$katakunci."%'";
				$sql.= " or NamaInstansi like '%".$katakunci."%'";
			$sql.= ")"; 
		} 
		
		
		$sql.= " order by NIP";
		$qrytotal =$this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		$total = $qrytotal->num_rows();
		if ($limit!="All"){
			$sql.= " limit ".$offset.", ".$limit;	
		}
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		if ($qry->num_rows()>0){
			foreach ($qry->result() as $data){
				$hasil[] = $data;
			}
		}else{
			$hasil="";
		}
		$datalist['offset']=$offset;
		$datalist['limit']=$limit;
		$datalist['url']="cdaftarnarasumber/listnarasumber/";
		$datalist['divresult']=$divresult;
		$datalist['datalist']=$hasil;
		$datalist['total']=$total;
		$datalist['namaform']="frmcariutama";
		$this->load->view('daftarnarasumber/vlistnarasumber',$datalist);
		
	}
	
	function edit($nip){
		$nip = $this->auth->trimming($nip);
		$sql = "SELECT * from tb_daftarnarasumber where NIP = '".$nip."'";
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		if($qry->num_rows()>0){
			$row = $qry->row();
			$row->TglLahir = $this->auth->inversdate($row->TglLahir);
			echo "<script>";
			foreach($row as $key=>$value){
				$value = $this->auth->cleartxt($value);
				echo "$('#".$key."').val('".$value."');";
			}
			echo "</script>";
		}
		

	}
}