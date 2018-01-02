<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cdaftardiklat extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->auth->validasi();
	}
	
	function showform(){
		$this->load->view('daftardiklat/vfrmdaftardiklat');	
		
	}
	
	function shwosearch(){
		$this->load->view('daftardiklat/vsearch');
	}
	function simpan(){
		$datafrm = $_POST;
		//echo '<pre>';
		//print_r($datafrm);
		//echo '<//pre>';
		$datafrm['DariTanggal'] = $this->auth->inversdate($datafrm['DariTanggal']);
		$datafrm['SampaiTanggal'] = $this->auth->inversdate($datafrm['SampaiTanggal']);
		$datafrm['TglDaftarDari'] = $this->auth->inversdate($datafrm['TglDaftarDari']);
		$datafrm['TglDaftarSampai'] = $this->auth->inversdate($datafrm['TglDaftarSampai']);
		//$datafrm['Keterangan'] = nl2br($datafrm['Keterangan']);
		
		//cari status diklat yang red, lalu ubah menjadi grey;
		
		
		
		$sql = "select * from tb_diklat where KodeDiklat = '".$datafrm['KodeDiklat']."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			
			$status = $this->statusdiklat($datafrm['KodeDiklat']);
			$stupdate="";
			if($status[1] == "red"){$stupdate = "ApprKabagUmum";}
			if($status[2] == "red"){$stupdate = "ApprPPK1";}
			if($status[3] == "red"){$stupdate = "ApprKepala1";}
			if($status[5] == "red"){$stupdate = "ApprPPK2";}
			if($status[6] == "red"){$stupdate = "ApprKepala2";}			
			
			if($stupdate!= ""){$datafrm[$stupdate] = "";}
			
			$datawhr['KodeDiklat'] = $datafrm['KodeDiklat'];
			$this->db->where($datawhr);
			$this->db->update('tb_diklat',$datafrm);
			
		}else{
			$result = $this->db->insert('tb_diklat',$datafrm);
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
			
		}
		
		echo "<script>
			clearform();
		</script>";
		$this->listdaftardiklat();
			
	}
	
	function hapus($kode){
		$kode = $this->auth->trimming($kode);
		$datawhr['KodeDiklat'] = $kode;
		$this->db->delete('tb_diklat',$datawhr);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		echo "<script>
			clearform();
		</script>";		
		$this->listdaftardiklat();	
	}
	
	function listdaftardiklat($offset=0,$limit=20){
		$divresult="#table";
		$katakunci = $this->input->post('txtcariutama');

		$sql = "SELECT * from tb_diklat where kodediklat <> ''";
		if(empty($katakunci)){$katakunci="";}	
		if ($katakunci!=""){
			$katakunci = $this->auth->trimming($katakunci);
			$sql.= " and (";
				$sql.= " NamaDiklat like '%".$katakunci."%'";
				$sql.= " or Tempat like '%".$katakunci."%'";
			$sql.= ")"; 
		}
		$sql.= " order by DariTanggal desc ";
		
		
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
				$data->Status = $this->statusdiklat($data->KodeDiklat);
				$hasil[] = $data;
			}
		}else{
			$hasil="";
		}
		$datalist['offset']=$offset;
		$datalist['limit']=$limit;
		$datalist['url']="cdaftardiklat/listdaftardiklat/";
		$datalist['divresult']=$divresult;
		$datalist['datalist']=$hasil;
		$datalist['total']=$total;
		$datalist['namaform']="frmcariutama";

		$this->load->view('daftardiklat/vlistdaftardiklat',$datalist);
		
	}
	
	function edit($kode){
		$kode = $this->auth->trimming($kode);
		$sql = "SELECT * from tb_diklat where Kodediklat = '".$kode."'";
		//echo $sql;
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		if($qry->num_rows()>0){
			$row = $qry->row();
			$row->DariTanggal = $this->auth->inversdate($row->DariTanggal);
			$row->SampaiTanggal = $this->auth->inversdate($row->SampaiTanggal);
			$row->TglDaftarDari = $this->auth->inversdate($row->TglDaftarDari);
			$row->TglDaftarSampai = $this->auth->inversdate($row->TglDaftarSampai);
			echo "<script>";
			foreach($row as $key=>$value){
				$value = $this->auth->cleartxt($value);
				//$value = str_replace("<br />","",$value); 
				echo "$('#".$key."').val('".$value."');";
			}
			echo "</script>";
		}
		

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
	
	function isicombounitkerja($unitkerja){
		$this->mdiklat->combounitkerja('UnitKerja',$unitkerja);	
	}
}