<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CUserManagement extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->auth->validasi();
	}
	
	function showform(){
		$this->load->view('usermanagement/vformuser');	
		
	}
	
	function simpanuser(){
		$datafrm=$_POST;
		unset($datafrm['Repassword']);
		
		$sql = "select * from tb_user where Username = '".$datafrm['Username']."'";
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			if($datafrm['Password']=="********"){
				 unset($datafrm['Password']);
			}else{
				$datafrm['Password'] = md5($datafrm['Password']);
			}
			$datawhr['Username'] = $datafrm['Username'];
			$this->db->where($datawhr);
			$this->db->update('tb_user',$datafrm);
			
		}else{
			$datafrm['Password'] = md5($datafrm['Password']);
			$this->db->insert('tb_user',$datafrm);
			if($this->db->_error_number()!=0){echo $this->db->_error_number()."-".$this->db->_error_message();die;}
		}
		echo "<script>
			clearform();
		</script>";
		$this->listuser();
			
	}
	
	function hapususer($username,$level="",$kodekabupaten="",$kodekecamatan=""){
		$username = $this->auth->trimming($username);
		$username = $this->auth->trimming($username);
		$datawhr['Username'] = $username;
		$this->db->delete('tb_user',$datawhr);
		echo "<script>
			clearform();
		</script>";		
		$this->listuser();	
	}
	
	function edituser($username){
		$sql = "select * from tb_user where Username = '".$username."'"; 
		//echo $sql;
		$qry = $this->db->query($sql);
		if($qry->num_rows()>0){
			$row = $qry->row();
			$row->Password="********";
			echo "<script>";
			foreach($row as $key=>$value){
				echo "$('#".$key."').val('".$value."');";
			}
			echo "$('#Repassword').val('".$row->Password."');";
			echo "</script>";	
			
		}
		
	}
	
	function listuser(){

		$sql = "SELECT
			  `tb_user`.*, `tb_unit_kerja`.`NamaUnitKerja`
			FROM
			  `tb_user` LEFT JOIN
			  `tb_unit_kerja` ON `tb_user`.`UnitKerja` = `tb_unit_kerja`.`KodeUnitKerja` where `tb_user`.`Username` <> ''";	  

		$sql.= " order by `tb_user`.`Username`";
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
		$this->load->view('usermanagement/vlistuser',$data);
		
	}
	
}