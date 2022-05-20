<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {



	public function login($data){

		//$query = $this->db->query("SELECT * FROM tbl_restaurante WHERE pk_restaurante = ?;", array($idr));

		//echo $this->session->username;

		$sql = "SELECT * FROM tbl_user, tbl_type_user 
				where tbl_type_user.id_type = tbl_user.id_type_user
				AND tbl_user.email = ?
				AND tbl_user.password = ?";


		$query = $this->db->query($sql, array($data['input_email'], $data['input_password']));

		//echo $this->input->post('usuario') . $this->input->post('clave');


		if ($query->num_rows() == 1) {
			return $query->row_array();
		} else {
			return false;
		}		
		//echo $this->session->has_userdata('username');

    }


	public function create_user($data=array(), $_type_user){

		$sql = "INSERT INTO `tbl_user` (`name`, `last_name`, `email`, `password`, `date`, `birthdate`, `phone`, `photo`,`active`, `id_type_user`) 
		VALUES (?,?,?,?,?,?,?,?,'1',?);";
		//0000-00-00 00:00:00
		$this->db->query($sql,array($data['input_name'],
									$data['input_last'],
									$data['input_email'],
									$data['input_password'],
									date('Y-m-d H:i:s'),
									$data['input_birthdate'],
									$data['input_phone'],
									'John-Doe.png',									
									$_type_user));

		if($this->db->affected_rows()){
			return $this->db->insert_id();
		}
	}

    /*public function tipo(){
    	$query = $this->db->get('tbl_tipo_usuario');
    	return $query->result();
    }*/


    public function save_profile($_data = array(), $_id){

    	$sql = "UPDATE `tbl_user` SET `name` = ?, `last_name` = ?, `birthdate` = ?, `phone` = ?,
    			`email` = ? , `photo` = ?, `password` = ?
    			WHERE (`id_user` = ?)";
    	$this->db->query($sql, array($_data['name'], 
							    		$_data['last_name'], 
							    		$_data['birthdate'], 
							    		$_data['phone'],
							    		$_data['email'], 
										$_data['photo'], 
										$_data['password'],
							    		$_id) );

    	return $this->db->affected_rows();

    }

	//``
	/*public function save_profile($data = array()){
		if($data != null){
			$sql = "INSERT INTO `tbl_owner_profile` (`name`, `last_name`,`email`, `password`) VALUES (?, ?, ?,?);";
			$query = $this->db->query($sql, array($data['input_name'],$data['input_last'],$data['input_email'],$data['input_password']));
			if($query==true){
				return $this->db->insert_id();
			}else{
				return false;
			}
		}
	}*/

	public function check_email($_email){
		$sql = "SELECT * FROM tbl_user WHERE email = ?;";
		$query = $this->db->query($sql, array($_email));

		if($query->num_rows() > 0){
			return true;
		}

	}

	public function get_profile($_fid=null){
			$sql = "SELECT * FROM tbl_user, tbl_type_user WHERE id_user=? AND id_type_user = id_type;;";
			$query = $this->db->query($sql, array($_fid));
			return $query->row_array();    	
    }


    public function type_user($_id='', $_type){

    	$sql = "SELECT id_type, description FROM tbl_type_user, tbl_user  
		WHERE id_type = id_type_user AND id_user = ?;";

		$query = $this->db->query( $sql, array($_id) );

		$result = $query->row();
		if($result->description == $_type){
			return $result->description;
		}

    }

    public function mostrar($id = null ){
    	if($id == null){
			//$query = $this->db->get('tbl_usuarios');
			$query = $this->db->query("SELECT * FROM tbl_usuarios, tbl_tipo_usuario WHERE tipo_usuario = pk_tipo_usuario;");
			return $query->result_array();

    	}else{

    		$query = $this->db->query("SELECT * FROM tbl_usuarios, tbl_tipo_usuario WHERE tipo_usuario = pk_tipo_usuario AND pk_usuario = '" . $id  ."';");
    		return $query->row();

    	}    	
    }

    /*public function get_profile($_fid=null){
			$query = $this->db->query("SELECT * FROM tbl_usuarios, tbl_tipo_usuario WHERE tipo_usuario = pk_tipo_usuario;");
			return $query->result_array();    	
    }*/

    public function actualizar($id){
		/*$data = array('descripcion_activo' => $this->input->post("nactivo") ,
		        'fecha_activo' => date('Y-m-d h:i:s'),
		        'estatus_activo' => '1');
		        
		$this->db->where('pk_activo', $id);
		$this->db->update('tbl_activos', $data);*/
		$query = "UPDATE tbl_usuarios SET `nombre_usuario` = '". $this->input->post("nombre") ."', 
										`cedula_usuario`='". $this->input->post("cedula") ."',
										`username_usuario`='". $this->input->post("usuario") ."',
										`clave_usuario`='". $this->input->post("password") ."',
										`tipo_usuario`='". $this->input->post("tipo") ."',
										`correo_usuario`='". $this->input->post("correo") ."'
										 WHERE `pk_usuario`='". $id ."';";

		if($this->db->query($query)){
			//guardarReporte("ACTUALIZADO USUARIO" , date());
			return true;
		}else{
			return false;
		}



    } 


    public function eliminar($id = null){

		$query = "DELETE FROM tbl_usuarios WHERE pk_usuario = '" . $id . "';";

		if($this->db->query($query)){
			return true;
		}else{
			return false;
		}				
    }

    public function autocompletar($keyword){
        

        $this->db->like("nombre_usuario", $keyword);
        //$this->db->where("tipo_usuario = 3");
        $this->db->order_by('pk_usuario', 'DESC');
        $query = $this->db->get('tbl_usuarios');


        if($query->num_rows() > 0){


			$jsondata['success'] = true;
			$jsondata["data"]["message"] = sprintf("Se han encontrado %d usuarios", $query->num_rows);
			$jsondata["data"]["users"] = array();

			foreach ($query->result_array() as $row){
				$jsondata["data"]["users"][] = $row; //build an array
			}

	     // echo json_encode($row_set);
        }else{
			$jsondata["success"] = false;
			$jsondata["data"] = array('message' => 'No se encontró ningún resultado.');        	
        }

		header('Content-type: application/json; charset=utf-8');
		echo json_encode($jsondata, JSON_FORCE_OBJECT);

    }

    public function existe($keyword){
		
        //$this->db->like("nombre_usuario", $keyword);
        $this->db->where("tipo_usuario = 3");
        $this->db->where("nombre_usuario" , $keyword);
        $this->db->order_by('pk_usuario', 'DESC');
        $query = $this->db->get('tbl_usuarios');		

        if($query->num_rows() > 0){
        	return true;
        }

    }


    public function fixExiste($keyword , $aux = null){

        //$this->db->where("tipo_usuario = 3");
        if($aux == 'username'){
			$this->db->where("username_usuario" , $keyword);
        }elseif($aux == 'cedula'){
        	$this->db->where("cedula_usuario" , $keyword);
        }elseif($aux == 'correo'){
			$this->db->where("correo_usuario" , $keyword);
        }elseif($aux == 'empleado'){
			$this->db->where("nombre_usuario" , $keyword);
        }
        
        //$this->db->order_by('pk_usuario', 'DESC');
        $query = $this->db->get('tbl_usuarios');		

        if($query->num_rows() > 0){
        	return true;
        }else{
        	return false;
        }

    }

    public function get_total() {

		$query = $this->db->get('tbl_usuarios');
		return $query->num_rows();    	

        //return $this->db->count_all("tbl_asignaciones");
    } 


}