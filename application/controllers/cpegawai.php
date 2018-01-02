<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cpegawai extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->auth->validasi();
	}
	
	function showform(){
		$this->load->view('pegawai/vfrmpegawai');	
		
	}
	function shwosearch(){
		$this->load->view('pegawai/vsearch');
	}
	
	function simpan(){
		$datafrm = $_POST;
		//echo '<pre>';
		//print_r($datafrm);
		//echo '<//pre>';
		$sql = "select * from tb_pegawai where NIP = '".$datafrm['NIP']."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$datawhr['NIP'] = $datafrm['NIP'];
			$this->db->where($datawhr);
			$this->db->update('tb_pegawai',$datafrm);
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		}else{
			$result = $this->db->insert('tb_pegawai',$datafrm);
		//echo $result;
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		}
		echo "<script>
			clearform();
		</script>";
		$this->listpegawai();
			
	}
	
	function hapus($nip){
		$nip = $this->auth->trimming($nip);
		$datawhr['NIP'] = $nip;
		$this->db->delete('tb_pegawai',$datawhr);
		echo "<script>
			clearform();
		</script>";		
		$this->listpegawai();	
	}
	
	function listpegawai($offset=0,$limit=20){
		$divresult="#table";
		$katakunci = $this->input->post('txtcariutama');

		$sql = "SELECT
			  `tb_pegawai`.*, `tb_jenis_jabatan`.`NamaJabatan`,
			  `tb_unit_kerja`.`NamaUnitKerja`
			FROM
			  `tb_pegawai` LEFT JOIN
			  `tb_unit_kerja` ON `tb_pegawai`.`UnitKerja` = `tb_unit_kerja`.`KodeUnitKerja`
			  LEFT JOIN
			  `tb_jenis_jabatan` ON `tb_pegawai`.`Jabatan` =
				`tb_jenis_jabatan`.`KodeJabatan` where tb_pegawai.NIP <> ''";
		if(empty($katakunci)){$katakunci="";}	
		if ($katakunci!=""){
			$katakunci = $this->auth->trimming($katakunci);
			$sql.= " and (";
				$sql.= " tb_pegawai.NIP like '%".$katakunci."%'";
				$sql.= " or tb_pegawai.Nama like '%".$katakunci."%'";
				$sql.= " or tb_pegawai.Alamat like '%".$katakunci."%'";
			$sql.= ")"; 
		} 
		$sql.= " order by `tb_pegawai`.`NIP`";
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
		$datalist['url']="cpegawai/listpegawai/";
		$datalist['divresult']=$divresult;
		$datalist['datalist']=$hasil;
		$datalist['total']=$total;
		$datalist['namaform']="frmcariutama";
		
		
		
		$this->load->view('pegawai/vlistpegawai',$datalist);
		
	}
	
	function edit($nip){
		$nip = $this->auth->trimming($nip);
		$sql = "SELECT * from tb_pegawai where NIP = '".$nip."'";
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