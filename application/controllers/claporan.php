<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Claporan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->auth->validasi();
	}
	
	function showformdaftardiklat(){
		$this->load->view('laporan/vfrmlapdaftardiklat');	
		
	}
	
	function daftardiklat(){
		$data = $this->caridaftardiklat($_POST);
		
		$this->load->view('laporan/vlistdiklat',$data);
	}
	
	
	function statusdiklat($kodediklat){
		$sql = "select * from tb_diklat where kodediklat = '".$kodediklat."'";
		$qry = $this->db->query($sql);
		$status = "";
		if($qry->num_rows()>0){
			$row = $qry->row();
			if($row->FasilitasLPMP == "Ya"){
				if($row->ApprKabagUmum == "Ya"){
					$status[1] = "green";	
				}elseif($row->ApprKabagUmum == "Tidak"){
					$status[1] = "red";	
				}else{
					$status[1] = "grey";	
				}
				
			}else{
				$status[1] = "grey";

			}
			
			if($row->ApprPPK1 == "Ya"){
					$status[2] = "green";	
				}elseif($row->ApprPPK1 == "Tidak"){
					$status[2] = "red";	
				}else{
					$status[2] = "grey";	
				}
			
			if($row->ApprKepala1 == "Ya"){
				$status[3] = "green";	
			}elseif($row->ApprKepala1 == "Tidak"){
				$status[3] = "red";
			}else{
				$status[3] = "grey";	
			}
			
			$panitia = $this->panitiadiklat($kodediklat);
			if($panitia=="0"){
				$status[4] = "grey";	
			}else{
				$status[4] = "green";	
			}
			
			if($row->ApprPPK2 == "Ya"){
				$status[5] = "green";	
			}elseif($row->ApprPPK2 == "Tidak"){
				$status[5] = "red";	
			}else{
				$status[5] = "grey";	
			}
			
			
			if($row->ApprKepala2 == "Ya"){
				$status[6] = "green";	
			}elseif($row->ApprKepala2 == "Tidak"){
				$status[6] = "red";
			}else{
				$status[6] = "grey";	
			}
		}
		
		return $status;
	}
	
	function panitiadiklat($kodediklat){
		$sql = "select * from tb_panitia where kodediklat = '".$kodediklat."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$panitia = 1;
		}else{
			$panitia = 0;	
		}
		
		return $panitia;
	}
	
	function narasumber($kodediklat){
		$sql= "SELECT
			  `tb_narasumber`.`NIP`, `tb_daftarnarasumber`.Nama, `tb_daftarnarasumber`.Keterangan
			FROM
			  `tb_daftarnarasumber` INNER JOIN
			  `tb_narasumber` ON `tb_narasumber`.`NIP` = `tb_daftarnarasumber`.`NIP`";
  
		$sql.= " where `tb_narasumber`.`KodeDiklat` = '".$kodediklat."'";
		$qry = $this->db->query($sql);
		$ns = "";
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$ns = $ns. $row->Nama.", (".$row->Keterangan.")<br>";
					
			}
			
		}
		return $ns;
	}
	
	function jmlpeserta($kodediklat){
		$sql = "select count(nip) as jml from tb_peserta where kodediklat = '".$kodediklat."' and StatusPendaftaran='Diterima'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$row = $qry->row();	
			$jml = $row->jml;
			
		}else{
			$jml = "0";	
		}
		return $jml;
	}
	
	function jmlpanitia($kodediklat){
		$sql = "select count(nip) as jml from tb_panitia where kodediklat = '".$kodediklat."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$row = $qry->row();	
			$jml = $row->jml;
			
		}else{
			$jml = "0";	
		}
		return $jml;
	}
	
	
	function listpesertadiklat($kodediklat="",$status="Diterima"){
		$sql = "SELECT * from tb_peserta where KodeDiklat = '".$kodediklat."' and StatusPendaftaran='".$status."'";
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
		$data['datalist'] = $hasil;
		$data['KodeDiklat'] = $kodediklat;
		$this->load->view('laporan/vlistpesertadiklat',$data);
		
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
		$data['KodeDiklat'] = $kodediklat;
		$this->load->view('laporan/vlistpanitiadiklat',$data);
		
	}
	
	function cetakpanitiadiklat($kodediklat="",$format='html'){
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
		$data['diklat'] = $this->mdiklat->detaildiklat($kodediklat);
		$data['format'] = $format;
		$this->load->view('laporan/vcetakpanitiadiklat',$data);
		
	}
	
	function pencarianpeserta($kodediklat=""){
		$data['KodeDiklat'] = $kodediklat;
		$this->load->view('laporan/vfrmpencarianpeserta');
		
	}
	
	function cetakpesertadiklat($kodediklat="",$format='html'){
		$sql = "SELECT * from tb_peserta where kodediklat = '".$kodediklat."' and StatusPendaftaran = 'Diterima'";
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
		$data['datalist'] = $hasil;
		$data['diklat'] = $this->mdiklat->detaildiklat($kodediklat);
		$data['format'] = $format;
		
		if($format=="biodata"){
			$this->load->view('laporan/vcetakbiodatapeserta',$data);
		}else{
			$this->load->view('laporan/vcetakpesertadiklat',$data);
		}
		
	}
	
	function cetakdaftardiklat(){
		$data = $this->caridaftardiklat($_POST);
		
		$this->load->view('laporan/vcetakdaftardiklat',$data);
		
	}
	
	function exportdaftardiklat(){
		$data = $this->caridaftardiklat($_POST);
		
		$this->load->view('laporan/vexportdaftardiklat',$data);
		
	}
	
	function caridaftardiklat($datafrm){
		$datafrm['DariTanggal'] = $this->auth->inversdate($datafrm['DariTanggal']);
		$datafrm['SampaiTanggal'] = $this->auth->inversdate($datafrm['SampaiTanggal']);

		//$sql= "select * from tb_diklat where kodediklat <> ''";
		$sql= "SELECT
		  `tb_diklat`.*, `tb_jenis_diklat`.`NamaJenis`, `tb_unit_kerja`.`NamaUnitKerja`
		FROM
		  `tb_diklat` LEFT JOIN
		  `tb_unit_kerja` ON `tb_diklat`.`UnitKerja` = `tb_unit_kerja`.`KodeUnitKerja`
		  LEFT JOIN
		  `tb_jenis_diklat` ON `tb_diklat`.`Jenis` = `tb_jenis_diklat`.`KodeJenis`";
		 $sql.= " where tb_diklat.KodeDiklat <> ''";
		
		
		if(isset($datafrm['chkunitkerja'])){
			$sql.= " and tb_diklat.UnitKerja = '".$datafrm['UnitKerja']."'";	
		}
		
		if(isset($datafrm['jenis'])){
			$sql.= " and tb_diklat.Jenis = '".$datafrm['Jenis']."'";	
		}
		if(isset($datafrm['chktanggal'])){
			$sql.= " and tb_diklat.DariTanggal >='".$datafrm['DariTanggal']."' and tb_diklat.SampaiTanggal <= '".$datafrm['SampaiTanggal']."'";	
		}
		if(isset($datafrm['chkfasilitas'])){
			$sql.= " and tb_diklat.FasilitasLPMP = '".$datafrm['FasilitasLPMP']."'";	
		}
		
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$row->Status = $this->statusdiklat($row->KodeDiklat);
				$row->Narasumber = $this->narasumber($row->KodeDiklat);
				$row->JmlPeserta = $this->jmlpeserta($row->KodeDiklat);
				$row->JmlPanitia = $this->jmlpanitia($row->KodeDiklat);
				$hasil[] = $row;	
			}
			
		}else{
			$hasil = "";	
		}
		$data['hasil'] = $hasil;
		$data['form'] = $datafrm;
		
		return $data;
	}
}