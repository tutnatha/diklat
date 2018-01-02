<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cundangan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->auth->validasi();
	}

	function showundangan($kodediklat){
		$sql = "select kodeundangan from tb_diklat where kodediklat = '".$kodediklat."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$row = $qry->row();	
			$kodeundangan = $row->kodeundangan;
		}else{
			$kodeundangan = "";
		}
		$data['KodeUndangan'] = $kodeundangan;
		$data['KodeDiklat'] = $kodediklat;
		$this->load->view('undangan/vshowundangan',$data);
		
	}
	
	function showform($kodediklat){
		
		$data['KodeDiklat'] = $kodediklat;
		//echo "form isian pendaftaran diklat muncul disini";	
		$this->load->view('undangan/vfrmpendaftaran', $data);
	}

	function loadundangan(){
		$sekarang = date('Y-m-d');
		$sql = "select * from tb_diklat where ApprKepala2 = 'Ya' and '".$sekarang."' between TglDaftarDari and TglDaftarSampai order by DariTanggal Desc";	
		//echo $sql;
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			foreach($qry->result() as $row){
				$row->Narasumber = $this->narasumber($row->KodeDiklat);
				$hasil[] = $row;	
				
			}
			
		}else{
			$hasil = "";	
		}
		
		$data['hasil'] = $hasil;
		$this->load->view('undangan/vlistdiklat',$data);
	}
	
	function simpan(){
		$datafrm = $_POST;
		$file = $_FILES;
		//print_r($file);
		$foto = $this->uploadfoto($file,$datafrm['NIP']);
		//if($foto == "0"){
		//	return false;	
		//}
		
		$datafrm['TglLahir'] = $this->auth->inversdate($datafrm['TglLahir']);
		//cari jumlah pendaftar yang sudah diterima
		$sql = "SELECT Count(`tb_peserta`.`NIP`) as Total
			FROM `tb_peserta` where `tb_peserta`.`KodeDiklat` = '".$datafrm['KodeDiklat']."' and `tb_peserta`.`StatusPendaftaran` = 'Diterima' ";
		$qry = $this->db->query($sql);
		$row = $qry->row();
		$total = $row->Total;


		$det = $this->detaildiklat($datafrm['KodeDiklat']);
		if($det != ""){
			$namadiklat = $det->NamaDiklat;
			$jmlpeserta = $det->JmlPeserta;
			
		}else{
			$namadiklat = "";	
			$jmlpeserta = 0;
		}
		if($total>=$jmlpeserta){
			echo "<script> alert('Maaf jumlah peserta diklat sudah memenuhi kuota, kami tidak bisa menerima pendaftaran lagi.')
				pageload('cundangan/loadundangan','#konten');
				$('#headform').html('Daftar Diklat Yang Bisa Diikuti');
			</script>";
		}else{
			/*unset($datafrm['simpan']);
			unset($datafrm['Password1']);
			$datafrm['Password'] = md5($datafrm['Password']);*/
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
			
			echo "<script> alert('Anda sudah berhasil melakukan pendafaran, silahkan melakukan pencetakan bukti pendaftaran.')
				//pageload('cundangan/loadundangan','#konten');
				//$('#headform').html('Daftar Diklat Yang Bisa Diikuti');
				//windowload('cundangan/cetakbuktipendaftaran/','#script');
			</script>";
			$datafrm['NamaDiklat'] = $det->NamaDiklat;
			$this->load->view('undangan/vcetakbuktipendaftaran', $datafrm);
			
			
		}
		
		
	}
	
	
	function uploadfoto($file,$nip){
		if($file['foto']['size'] > 0){
			$uploadDir=UPLOAD_FILE_PATH;
		
			$filex   = explode('.',$file['foto']['name']);
			$length = count($filex);
			if(strtolower($filex[$length -1]) == 'jpg' or strtolower($filex[$length -1]) == 'jpeg'){
				
				if (file_exists($uploadDir.$nip.".jpg")){
					unlink($uploadDir.$nip.".jpg");
				}
				
				if(move_uploaded_file($file['foto']['tmp_name'],$uploadDir.$nip.".jpg")){
						//echo 'File berhasil diupload dengan nama';
						$status = 1;
				}else{
					echo  "<script>
							alert('Upload gagal, silahkan ulangi lagi');
						</script>";
						$status = 0;
				}
			}else{
				echo "<script>
					alert('Upload gagal, File tidak bertipe jpg');
				</script>";	
				$status = 0;
			}
		}	
		///return $status;
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

}



