<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cdiklat extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}


	public function index()
	{
		$this->load->view('utama/vutama');
		
	}

	function topmenu(){
		$level = $this->session->userdata('level');
		if($level == "PPK"){
			$this->load->view('utama/vtopmenuppk');
		}elseif($level == "Admin"){
			$this->load->view('utama/vtopmenuadmin');
		}elseif($level == "Kasubbag Umum"){
			$this->load->view('utama/vtopmenukabagumum');
		}elseif($level == "Kepala"){
			$this->load->view('utama/vtopmenukepala');
		}elseif($level == "Staf Kepegawaian"){
			$this->load->view('utama/vtopmenukepegawaian');
		}elseif($level == "Kasi"){
			$this->load->view('utama/vtopmenukasi');
		}elseif($level == "Panitia"){
			$this->load->view('utama/vtopmenupanitia');
		}else{
			$this->load->view('utama/vtopmenuundangan');
		}
	}
	
	function loadlogin(){
		$this->load->view('utama/vfrmlogin');
	}
	
	
	function login(){
		$username = $this->input->post('Username');
		$password = md5($this->input->post('Password'));

		$sql = "select * from tb_user where username = '".$username."' and password = '".$password."'";
		$qry = $this->db->query($sql);
		if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		if($qry->num_rows() >0){
			$userlogin = 1;
			$row = $qry->row();
			if($row->Level == "Kasubbag Umum"){$row->UnitKerja = "Kasubbag Umum";}
			$datases['username'] =$username;
			$datases['level'] =$row->Level;
			$datases['unitkerja'] =$row->UnitKerja;
			$datases['diklat'] =$row->Diklat;
			//print_r($datases);
			
		
		}else{
			$sql1 = "select * from tb_panitia where NIP = '".$username."' and Password = '".$password."'";
			$qry1 = $this->db->query($sql1);
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
			if($qry1->num_rows() >0){
				$datases['username'] =$username;
				$datases['level'] ="Panitia";
				$datases['unitkerja'] ="";
				$datases['diklat'] ="0";
			}else{
				$userlogin = 0;	
			}
			
		}
		
		if($userlogin = 1){
			$this->session->set_userdata($datases);
			echo "<script>
				pageload('cdiklat/topmenu','#top_menu');
				pageload('cdiklat/welcome','#konten');
				$('#headform').html('Sistem Informasi Diklat');
				$('#search').html('');
				$('#table').html('');
				$('#konten').show();
				$('#search').hide();
				$('#table').hide();
			
			</script>";
		}else{
			echo "<script> alert('Username atau Password anda salah');
				$('#username').val('');
				$('#password').val('');
			</script>";	
		}
	}
	

	
	function logout(){
		$datases = array('username'=> '');
		$this->session->unset_userdata($datases);
		$this->session->sess_destroy();
		echo "<script>
			$('#top_menu').html('');
			$('#headform').html('Login Sistem Informasi Diklat');
			$('#konten').html('');
			$('#search').html('');
			$('#table').html('');
			$('#konten').show();
			$('#search').hide();
			$('#table').hide();
			pageload('cdiklat/loadlogin','#konten');
		
		</script>";
	
	}

	function welcome(){
		$this->load->view('utama/welcome');
	
	}
	
	

}



