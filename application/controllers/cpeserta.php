<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cpeserta extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->auth->validasi();
	}
	
	function showform(){
		$this->load->view('peserta/vfrmpeserta');	
		
	}
	
	function shwosearch(){
		$this->load->view('peserta/vsearch');
	}
	function simpan(){
		$datafrm = $_POST;
		/*unset($datafrm['Password1']);
		if($datafrm['Password'] == "********"){
			unset($datafrm['Password']);	
		}else{
			$datafrm['Password'] = md5($datafrm['Password']);	
		}*/
		$sql = "select * from tb_peserta where kodediklat = '".$datafrm['KodeDiklat']."' and NIP = '".$datafrm['NIP']."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$datawhr['KodeDiklat'] = $datafrm['KodeDiklat'];
			$datawhr['NIP'] = $datafrm['NIP'];
			
			$this->db->where($datawhr);
			$this->db->update('tb_peserta',$datafrm);
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		}else{
			
			$datafrm['StatusPendaftaran'] = "On Process";
			
			//print_r($datafrm);
			$this->db->insert('tb_peserta',$datafrm);
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}	
		}

		
		echo "<script>
			clearform();
		</script>";
		$this->listpeserta($datafrm['KodeDiklat']);
			
	}
	
	function hapus($nip,$kodediklat){
		$nip = $this->auth->trimming($nip);
		$kodediklat = $this->auth->trimming($kodediklat);
		$datawhr['NIP'] = $nip;
		$datawhr['KodeDiklat'] = $kodediklat;
		$this->db->delete('tb_peserta',$datawhr);
		echo "<script>
			clearform();
		</script>";		
		$this->listpegawai($kodediklat);	
	}
	
	function listpeserta($offset=0,$limit=1000){
		$divresult="#table";
		$katakunci = $this->input->post('txtcariutama');
		$kodediklat=$this->input->post('KodeDiklatCari');
		
		$sql = "SELECT * from tb_peserta where KodeDiklat = '".$kodediklat."'";
		if(empty($katakunci)){$katakunci="";}	
		if ($katakunci!=""){
			$katakunci = $this->auth->trimming($katakunci);
			$sql.= " and (";
				$sql.= " NIP like '%".$katakunci."%'";
				$sql.= " or Nama like '%".$katakunci."%'";
				$sql.= " or NamaInstansi like '%".$katakunci."%'";
				$sql.= " or Provinsi like '%".$katakunci."%'";
			$sql.= ")"; 
		}
		$sql.= " order by StatusPendaftaran, NIP";
		
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
				$data->KodeDiklat = $kodediklat;
				$hasil[] = $data;
			}
		}else{
			$hasil="";
		}
		$datalist['offset']=$offset;
		$datalist['limit']=$limit;
		$datalist['url']="cpeserta/listpeserta/";
		$datalist['divresult']=$divresult;
		$datalist['datalist']=$hasil;
		$datalist['total']=$total;
		$datalist['namaform']="frmcariutama";

		$this->load->view('peserta/vlistpeserta',$datalist);
		
	}
	
	function edit($nip,$kodediklat){
		$nip = $this->auth->trimming($nip);
		$kodediklat = $this->auth->trimming($kodediklat);
		$sql = "SELECT * from tb_peserta where NIP = '".$nip."' and KodeDiklat = '".$kodediklat."'";
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		if($qry->num_rows()>0){
			$row = $qry->row();
			$row->TglLahir = $this->auth->inversdate($row->TglLahir);
			$row->Password = "********";
			$row->Password1 = "********";
			echo "<script>";
			foreach($row as $key=>$value){
				$value = $this->auth->cleartxt($value);
				echo "$('#".$key."').val('".$value."');";
			}
			echo "</script>";
		}
		

	}
}