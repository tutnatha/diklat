<?php

class Mdiklat extends CI_Model {

	function __construct() 
	{
		parent::__construct();
		
	}
	
	function combojabatan($idcombo){
		$sql = "select * from tb_jenis_jabatan order by KodeJabatan";
		//echo $sql;
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		$data['']= "-= pilih jabatan =-";
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$data[$row->KodeJabatan] = $row->NamaJabatan;	
			}
			
		}
		echo form_dropdown($idcombo, $data, '', "id='$idcombo'");	
	}
	
	function combojenisdiklat($idcombo){
		$sql = "select * from tb_jenis_diklat order by NamaJenis";
		//echo $sql;
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		$data['']= "-= pilih jenis =-";
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$data[$row->KodeJenis] = $row->NamaJenis;	
			}
			
		}
		echo form_dropdown($idcombo, $data, '', "id='$idcombo'");	
	}
	
	function combodiklat($idcombo){
		$sql = "select * from tb_diklat order by DariTanggal desc";
		//echo $sql;
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		$data['']= "-= pilih diklat =-";
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$data[$row->KodeDiklat] = $row->NamaDiklat;	
			}
			
		}
		echo form_dropdown($idcombo, $data, '', "id='$idcombo'");	
	}
	
	function combodiklatpanitia($idcombo){
		$sql = "select * from tb_diklat where ApprKepala1 = 'Ya' order by DariTanggal";
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		$data['']= "-= pilih diklat =-";
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$data[$row->KodeDiklat] = $row->NamaDiklat;	
			}
			
		}
		echo form_dropdown($idcombo, $data, '', "id='$idcombo'");	
	}
	
	function combodiklatpeserta($idcombo){
		$username = $this->session->userdata('username');
		$level = $this->session->userdata('level');
		$kd = "";
		if($level=='Panitia'){
			$sql = "select KodeDiklat from tb_panitia where NIP = '".$username."'";	
			$qry = $this->db->query($sql);
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
			if($qry->num_rows()>0){
				foreach($qry->result() as $row){
					if($kd==""){
						$kd="'".$row->KodeDiklat."'";	
					}else{
						$kd.=",'".$row->KodeDiklat."'";
					}
				}
			}
		}
		
		
		
		
		$sql = "select * from tb_diklat where ApprKepala2 = 'Ya' ";
		if($kd != ""){
			$sql.= " and KodeDiklat in (".$kd.")";		
		}
		$sql.= " order by DariTanggal desc";
		//echo $sql;
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		$data['']= "-= pilih diklat =-";
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$data[$row->KodeDiklat] = $row->NamaDiklat;	
			}
			
		}
		echo form_dropdown($idcombo, $data, '', "id='$idcombo'");	
	}
	
	
	function combojabatanpantia($idcombo,$selected=""){
		$sql = "select * from tb_jenis_jabatan_panitia order by KodeJabatan";
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		$data['']= "-= pilih jabatan =-";
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$data[$row->KodeJabatan] = $row->NamaJabatan;	
			}
			
		}
		echo form_dropdown($idcombo, $data, $selected, "id='$idcombo'");	
	}
	
	function combounitkerja($idcombo,$selected=""){
		$sql = "select * from tb_unit_kerja order by KodeUnitKerja";
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		$data['']= "-= pilih unit kerja =-";
		
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$data[$row->KodeUnitKerja] = $row->NamaUnitKerja;	
			}
			
		}
		echo form_dropdown($idcombo, $data, $selected, "id='$idcombo'");	
	}
	
	function detailunitkerja($kodeunitkerja){
		$sql = "select * from tb_unit_kerja where kodeunitkerja = '".$kodeunitkerja."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$row = $qry->row();	
			$unitkerja = $row->NamaUnitKerja;
		}else{
			$unitkerja = "";	
		}
		if($kodeunitkerja=="Kasubbag Umum"){
			$unitkerja='Kasubbag Umum';	
		}
		return $unitkerja;
	}
	
	function detaildiklat($kodediklat=""){
		$sql = "select * from tb_diklat where kodediklat = '".$kodediklat."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$row = $qry->row();	
		}else{
			$row = "";	
		}
		return $row;
	}
	
	function detailpegawai($nip){
		$sql = "select * from tb_pegawai where NIP = '".$nip."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$row = $qry->row();	
		}else{
			$row = "";	
		}
		return $row;
		
	}
	
}
/* End of file login.php */
/* Location: ./simak/application/controllers/badanhukum.php */