<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cpersetujuandiklat extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->auth->validasi();
	}
	
	function simpanpersetujuan(){
		//echo $kode.'--'.$status."--".$catatan;	
		print_r($_POST);
		$level = $this->session->userdata('level');
		$datafrm = $_POST;
		$status = $this->statusdiklat($datafrm['KodeDiklat']);
		$stupdate = "";
		$catupdate = "";	
		if($level == "Kasubbag Umum"){
			if($status[1]=="grey"){
				$stupdate = "ApprKabagUmum";
				$catupdate = "Catatan1";	
			}
		}elseif($level == "PPK"){
			if($status[2]=="grey"){
				$stupdate = "ApprPPK1";	
				$catupdate = "Catatan2";
			}elseif($status[5]=="grey"){
				$stupdate = "ApprPPK2";	
				$catupdate = "Catatan3";
			}
			
		}elseif($level=="Kepala"){
			if($status[3]=="grey"){
				$stupdate = "ApprKepala1";	
				$catupdate = "Catatan4";
			}elseif($status[6]=="grey"){
				$stupdate = "ApprKepala2";	
				$catupdate = "Catatan5";
			}
		}
		
		if($stupdate != ""){
			$sql = "update tb_diklat set ".$stupdate." = '".$datafrm[$datafrm['KodeDiklat'].'Persetujuan']."', ";	
			$sql.= $catupdate." = '".$datafrm[$datafrm['KodeDiklat'].'catatan']."' where KodeDiklat = '".$datafrm['KodeDiklat']."'";
			
			echo $sql;
			$this->db->query($sql);
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
			
		}
			

		
		
	}

	function loaddiklat(){
		$sekarang = date('Y-m-d');
		$level = $this->session->userdata('level');
		$sql = "select * from tb_diklat where DariTanggal > '".$sekarang."' order by DariTanggal"; 
		//echo $sql;
		$qry = $this->db->query($sql);
		$hasil = "";	
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$row->Status = $this->statusdiklat($row->KodeDiklat);
				$row->Narasumber = $this->narasumber($row->KodeDiklat);
				/*echo '<pre>';
				print_r($row);
				echo '</pre>';*/
				if($level == "Kasubbag Umum"){ 
					if($row->FasilitasLPMP == "Ya" and $row->Status[1] == "grey"){
						$hasil[] = $row;	
					}
				}elseif($level== "PPK"){
					if($row->FasilitasLPMP == "Ya"){
						if(($row->Status[1] == "green" and $row->Status[2] == "grey") or ($row->Status[4] == "green" and $row->Status[5] == "grey")){//blm mendapat persetujuan pertama atau panitia sudah dibentuk
							$hasil[] = $row;	
						}
					}else{
						if($row->Status[2] == "grey" or ($row->Status[4] == "green" and $row->Status[5] == "grey")){//blm mendapat persetujuan pertama atau panitia sudah dibentuk
							$hasil[] = $row;	
						}
					}
					
				}elseif($level=="Kepala"){
					if(($row->Status[2] == "green" and $row->Status[3] == "grey") or ($row->Status[5] == "green" and $row->Status[6] == "grey")){//blm mendapat persetujuan pertama atau panitia sudah dibentuk
						$hasil[] = $row;	
					}
				}
			}
			
		}
		
		$data['hasil'] = $hasil;
		$this->load->view('persetujuan/vlistdiklat',$data);
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
	
	function detaildiklat($kodediklat){
		$sql = "select * from tb_diklat where kodediklat = '".$kodediklat."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$row = $qry->row();	
			
		}else{
			$row = "";	
		}
		return $row;
	}

}



