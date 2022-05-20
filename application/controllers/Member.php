<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public $type_user = 'Member';
	public $data;
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
		 if($this->user_model->type_user($this->session->userdata('id_profile'),$this->type_user) != $this->type_user){
		 	redirect('index.php/home/');
		 	die();
		}


        $this->load->helper('url');

        $this->load->model('yacht_model');
        $this->load->model('chat_model');
        $this->load->library('UploadHandler');

		$this->data = $this->user_model->get_profile($this->session->userdata('id_profile'));

		
    }




	public function index(){

		 if(!$this->user_model->type_user($this->session->userdata('id_profile'),$this->type_user)){
		 	redirect('home/');
		 	die();
		}

		
		redirect('index.php/member/dashboard');

	}



	public function register(){


		if($this->input->post('register')){

            $this->form_validation->set_message('required', 'The %s field is required.');

           	$this->form_validation->set_rules('input_name' ,'Name', 'required');
            $this->form_validation->set_rules('input_last' ,'Last Name', 'required');
            $this->form_validation->set_rules('input_birthdate' ,'Birthdate', 'required');
            $this->form_validation->set_rules('input_phone' ,'Phone', 'required');

            $this->form_validation->set_rules('input_email' ,'Email', 'required|callback_check_email');
            $this->form_validation->set_rules('input_password' ,'Password', 'required');
            $this->form_validation->set_rules('input_repeat' ,'Repeat Password', 'required|callback_validate_repeat');
            //$this->form_validation->set_rules('checkbox_terms' ,'Term', 'required');

			if($this->form_validation->run()){

				$type_user = '3';
				if($results->id = $this->user_model->create_user($this->input->post() , $type_user)){

					$this->session->set_userdata('id_profile', $results->id);
					//var_dump($this->session->set_userdata('id_profile', $results->id));
					//var_dump($this->session->userdata());
					redirect('index.php/member/dashboard');
					die();

				}

			}

		}


		$this->load->template('member/member-register');

	}

    public function dashboard(){
        $data = array (
                'profile'    => $this->user_model->get_profile($this->session->userdata('id_profile')),
                'chat'    => $this->chat_model->view_all(array("reciever_userid"=> $this->session->userdata('id_profile'))),//$this->session->userdata('id_profile')
                'type'    => $this->type_user,
                'title'    => 'Home'
            );
         $this->load->view('index-member', $data);
    }





	public function profile($param='null'){


        if( $this->input->post('process') == 'true' ) {

            if(!empty($_FILES['input_profile']['name'])){
                $config['upload_path'] = 'uploads/gallery/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['input_profile']['name'];

                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('input_profile')){
                    $uploadData = $this->upload->data();
                   $this->data['photo'] = $uploadData['file_name'];
                }else{
                    $profile_img = '';
                }                
                

            }

            $this->data['name'] =  $this->input->post('input_name');
            $this->data['last_name'] =  $this->input->post('input_last');
            $this->data['birthdate'] =  $this->input->post('input_birthdate');
            $this->data['email'] =  $this->input->post('input_email');
            $this->data['phone'] =  $this->input->post('input_phone');


            $this->user_model->save_profile($this->data,$this->session->userdata('id_profile'));
            redirect(base_url() . "index.php/member/profile/edit/");
            exit();
        }

        if( $this->input->post('password') == 'true' ) {
                $this->form_validation->set_message('required', 'The %s field is required.');
                $this->form_validation->set_rules('input_old' ,'Old Password', 'required|callback_check_password');
                $this->form_validation->set_rules('input_password' ,'New Password', 'required|callback_validate_repeat');
                $this->form_validation->set_rules('input_repeat' ,'Repeat Password', 'required');

                if($this->form_validation->run()){

                    //$post = $this->input->post();
                    
                    /*$post['input_name'] = $data['profile']['name'];
                    $post['input_last'] = $data['profile']['last_name'];
                    $post['input_email'] = $data['profile']['email'];
                    $post['input_birthdate'] = $data['profile']['birthdate'];
                    $post['input_phone'] = $data['profile']['phone'];*/

                    $this->data['password'] = $this->input->post('input_password');

                    $this->user_model->save_profile( $this->data, $this->session->userdata('id_profile') );

                    redirect(base_url() . "index.php/member/");
                    die();
                }            
        }

        if( isset($param) && is_numeric($param)) {
            $data = array (
                    'profile'    => $this->user_model->get_profile($this->session->userdata('id_profile')),
                    'type'    => $this->type_user,
                    'title'    => 'Profile/Edit'
                );
			$this->load->view('index-member', $data);

        }elseif(isset($param) && $param=="edit") {

         	$data = array (
                'profile'    => $this->user_model->get_profile($this->session->userdata('id_profile')),
				'type'    => $this->type_user,
                'title'    => 'Profile/Edit'
            );
            $this->load->view('index-member', $data);

        }elseif(isset($param) && $param=="password") {
            
            $data = array (
                'profile'    => $this->user_model->get_profile($this->session->userdata('id_profile')),
                'type'    => $this->type_user,
                'title'    => 'Profile/password'
            ); 

            $this->load->view('index-member', $data);

        }else{
            redirect(base_url() . "index.php/member/", 'refresh');
        } 

	}


	public function check_password($password = null){
        
        $data = $this->user_model->get_profile($this->session->userdata('id_profile'));
        if($data['password'] != $password){
            $this->form_validation->set_message('check_password', 'Please enter your password');          
            return false;
        }else{
            return true;
        }   
    }

    public function check_email($email=null){
		//$this->user_model->check_email($email);

    	if($this->user_model->check_email($email)){
    		$this->form_validation->set_message('check_email', 'Email exist, enter other email.');
    		return false;
    	}else{
    		return true;
    	}

    }

    public function validate_repeat($str){
        if($str != $this->input->post('input_password')){
            $this->form_validation->set_message('validate_repeat', 'password are not the same');
            return false;
        }else{
            return true;
        }
    }


    public function exitsession(){

        $this->session->sess_destroy();
        redirect('index.php/home/login');
        die();
    }    

}
?>