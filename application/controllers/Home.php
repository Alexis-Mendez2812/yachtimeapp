<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once APPPATH . "libraries/vendor/autoload.php";
		use Auth0\SDK\Auth0;

class Home extends CI_Controller {

	public $data;

	
    public function __construct(){

		parent::__construct();
		$this->load->model('user_model');
        $this->load->helper('url');
        $this->load->model('yacht_model');		
		if($this->session->userdata('id_profile')){

			$this->load->model('user_model');
			$this->data['profile'] = $this->user_model->get_profile($this->session->userdata('id_profile'));//$this->user_model->get_profile($this->session->userdata('id_profile'));
			//$data['yachts'] = $this->yacht_model->view_yacht(null, $this->input->get('id'));			
		}

      
        //var_dump($this->data['profile']);
    }


	public function index(){




		$data['yachts'] = $this->yacht_model->view_yachts();

			
		$this->load->template('view_home',$data);
	}

	public function terms(){

		$this->load->template('terms-of-service');
	}	


	public function membership(){


		$this->load->template('view_membership');
		
	}
	public function yacht(int $code = null){



		//$data['gallery'] = $this->yacht_model->Listgalery(null, $this->input->get('id'));
		$this->data['yacht'] = $this->yacht_model->view_yacht(null, $this->input->get('id'));
		$this->data['gallery'] = $this->yacht_model->GetPictureList($this->input->get('id'));



		$this->load->template('view_yacht.php', $this->data);


	}

	public function contact(){
		$this->load->template('view-contact');
	}
	
	public function login(){
		

 
$domain        = "dev-4lodhff3.us.auth0.com";
$client_id     = "vhwGlptiJmC4R3yPO1chjHoDLw3aZddJ";
$client_secret = "tBbDF5QYcmIkXS-lQm_ZGL-yrnuSASVM8-EXRQGAkAQGGyhGwdbtlHk5R9aGzUoS";
$redirect_uri  = "http://127.0.0.1/yachtimeapp";
$audience      = getenv('AUTH0_AUDIENCE');

if($audience == ''){
$audience = 'https://' ."127.0.0.1" . '/yachtimeapp';
}
 
$auth0 = new Auth0([
  'domain' => $domain,
  'client_id' => $client_id,
  'client_secret' => $client_secret,
  'redirect_uri' => $redirect_uri,
  'audience' => $audience,
  'scope' => 'openid profile',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);
 
$auth0->login();

		if(!empty($this->session->userdata('id_profile'))){
			redirect('/home/');
			die();
		}		

		$data['session'] = $this->session->userdata();

		$this->form_validation->set_rules('input_email' ,'Description', 'required');
		$this->form_validation->set_rules('input_password' ,'Description', 'required');
		//$this->form_validation->set_rules('input_type' ,'Description', 'callback_select_validate');

		if($this->form_validation->run()){

			$results = $this->user_model->login($this->input->post());
			
			//var_dump($results);

			//$this->user_model->type_user($this->session->userdata('id_profile'),$this->type_user)
			if($results){


				$this->session->set_userdata('id_profile', $results['id_user']);


				if($results['id_type'] == '3'){
					redirect('index.php/member/dashboard');
				}elseif($results['id_type'] == '2'){
					redirect('index.php/owner/dashboard');
				}else{
					//redirect('home/');
				}

				
				//redirect('subscription/dashboard');
				die();
			}else{
				$data['error'] = "Email or Password incorrect";
				$this->load->template('view-login', $data);
			}

		}else{
			$this->load->template('view-login');
		}



	}


	public function register($value=''){
		$this->load->template('view-register');
	}

	public function select_validate($opt){
		if($opt == 'N0'){
			$this->form_validation->set_message('select_validate', 'Please Select Type Login.');
			return false;
		}else{
			return true;
		}
	}

}
