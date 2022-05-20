<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {//Albums
    public $type_user = 'Owner';
    public $data;
    public function __construct(){
        parent::__construct();

        if(!$this->session->userdata('id_profile')){
            
            // redirect('/home/');
            die();
        }


        $this->load->model('user_model');
        $this->load->helper('url');
        if($this->user_model->type_user($this->session->userdata('id_profile'),$this->type_user) != $this->type_user){
            redirect('index.php/home/');
            die();
        }     
        $this->load->helper('url');
        $this->load->model('yacht_model');
        $this->load->model('chat_model');        
        $this->PageLimit = 20;
        $this->load->library('UploadHandler');
        $this->data = $this->user_model->get_profile($this->session->userdata('id_profile'));
    }

    public function index(){

        /*$data = array (
                'albums'    => $this->yacht_model->GetAlbumList(),
                'title'    => 'Owner'
            );
        $this->load->view('index', $data);*/
        redirect( base_url() . "index.php/owner/dashboard/" , 'refresh');        
    }


    public function dashboard(){
        $data = array (
                'profile'    => $this->user_model->get_profile($this->session->userdata('id_profile')),
                'message'    => $this->chat_model->view_all(array("reciever_userid" => $this->session->userdata('id_profile'))),
                'yachts'    => $this->yacht_model->GetAlbumList(),
                'type'    => $this->type_user,
                'title'    => 'Home'
            );

        
         $this->load->view('index-owner', $data);
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
            redirect(base_url() . "index.php/owner/profile/edit/");
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

                    redirect(base_url() . "index.php/owner/profile/password/");
                    die();
                }            
        }
        //$this->data['password'] = '1111';
        //
        if( isset($param) && is_numeric($param)) {
            $data = array (
                    'profile'    => $this->user_model->get_profile($this->session->userdata('id_profile')),
                'type'    => $this->type_user,                    
                    'title'    => 'Profile/Edit'
                );
             $this->load->view('index-owner', $data);
        }elseif(isset($param) && $param=="edit") {
          $data = array (
                'profile'    => $this->user_model->get_profile($this->session->userdata('id_profile')),
                'type'    => $this->type_user,                
                'title'    => 'Profile/Edit'
            );
            $this->load->view('index-owner', $data);

        }elseif(isset($param) && $param=="password") {
            
            $data = array (
                'profile'    => $this->user_model->get_profile($this->session->userdata('id_profile')),
                'type'    => $this->type_user,                
                'title'    => 'Profile/password'
            ); 

            $this->load->view('index-owner', $data);

        }else{
            redirect(base_url() . "index.php/owner/", 'refresh');
        }         
    }

    public function yacht($param='null',$id='null') {
        if( $this->input->post('process') == 'true' ) {

            if($this->yacht_model->Save()) {
                //echo "Success";
                // $this->session->set_flashdata('_flash_msg', array(
                //     '_css_cls'  => 'success',
                //     '_message'  => intval($param)?'Successfully updated.':'Successfully added.'
                //     )); 
            }
            else {
                //echo "error";
                // $this->session->set_flashdata('_flash_msg', array(
                //     '_css_cls'  => 'error',
                //     '_message'  => 'Could not be updated. There seems to be some problem on server. Try again shortly.'
                //     ));
            }
            redirect( base_url() . "index.php/owner/" , 'refresh');
            exit();
        }

        if(isset($param) && is_numeric($param)) { 
            $data_content   =  array(
                'title'   => 'Home',
                'record' => $this->yacht_model->GetAlbumDetails($param),
                'type'    => $this->type_user,
                'picturelist'   => $this->yacht_model->GetPictureList($param)
                );
            $this->load->view('index-owner', $data_content);
        }elseif(isset($param) && $param=="create") {

          $data = array (
                'profile'    => $this->user_model->get_profile($this->session->userdata('id_profile')),
                'type'    => $this->type_user,
                'title'    => 'Yacht/Add'
            );
          $this->load->view('index-owner', $data);

        }elseif(isset($param) && $param=="edit" && is_numeric($id)) {  
          $data_content = array (
                'title'    => 'Yacht/Edit',
                'profile'    => $this->user_model->get_profile($this->session->userdata('id_profile')),                
                'picturelist' => $this->yacht_model->GetPictureList($id),
                'type'    => $this->type_user,
                'record' => $this->yacht_model->GetAlbumDetails($id)
            );
          //var_dump($data_content);
          $this->load->view('index-owner', $data_content);
        }
        elseif(isset($param) && $param=="deactivate" && is_numeric($id)) {
            $this->deactivate($id);
            redirect(base_url() . "index.php/owner/", 'refresh');
        }
        else{
            redirect(base_url() . "index.php/owner/", 'refresh');
        }
    }

    function deactivate($id) {
       $this->yacht_model->Deactivate($id);
       return true;
    }    

    public function do_upload() {
        $upload_path_url = base_url() . 'uploads/gallery/';

        $config['upload_path'] = './uploads/gallery';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '30000';

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload()) {
            //$error = array('error' => $this->upload->display_errors());
            //$this->load->view('upload', $error);

            //Load the list of existing files in the upload directory
            $existingFiles = get_dir_file_info($config['upload_path']);
            $foundFiles = array();
            $f=0;
            foreach ($existingFiles as $fileName => $info) {
              if($fileName!='thumbs'){//Skip over thumbs directory
                //set the data for the json array   
                $foundFiles[$f]['name'] = $fileName;
                $foundFiles[$f]['size'] = $info['size'];
                $foundFiles[$f]['url'] = $upload_path_url . $fileName;
                $foundFiles[$f]['thumbnailUrl'] = $upload_path_url . 'thumbs/' . $fileName;
                $foundFiles[$f]['deleteUrl'] = base_url() . 'index.php/owner/deleteImage/' . $fileName;
                $foundFiles[$f]['deleteType'] = 'DELETE';
                $foundFiles[$f]['error'] = null;
                
                $f++;
              }
            }
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('files' => $foundFiles)));
        } else {
            $data = $this->upload->data();
            /*
             * Array
              (
              [file_name] => png1.jpg
              [file_type] => image/jpeg
              [file_path] => /home/ipresupu/public_html/uploads/
              [full_path] => /home/ipresupu/public_html/uploads/png1.jpg
              [raw_name] => png1
              [orig_name] => png.jpg
              [client_name] => png.jpg
              [file_ext] => .jpg
              [file_size] => 456.93
              [is_image] => 1
              [image_width] => 1198
              [image_height] => 1166
              [image_type] => jpeg
              [image_size_str] => width="1198" height="1166"
              )
             */
            // to re-size for thumbnail images un-comment and set path here and in json array
            $config = array();
            $config['image_library'] = 'gd2';
            $config['source_image'] = $data['full_path'];
            $config['create_thumb'] = TRUE;
            $config['new_image'] = $data['file_path'] . 'thumbs/';
            $config['maintain_ratio'] = TRUE;
            $config['thumb_marker'] = '';
            $config['width'] = 5000;
            $config['height'] = 5000;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            
            //set the data for the json array
            $info = new StdClass;
            $info->name = $data['file_name'];
            $info->size = $data['file_size'] * 1024;
            $info->type = $data['file_type'];
            $info->url = $upload_path_url . $data['file_name'];
            // I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
            $info->thumbnailUrl = $upload_path_url . 'thumbs/' . $data['file_name'];
            $info->deleteUrl = base_url() . 'index.php/owner/deleteImage/' . $data['file_name'];
            $info->deleteType = 'DELETE';
            $info->error = null;

            $files[] = $info;
            //this is why we put this in the constants to pass only json data
            if ($this->input->is_ajax_request()) {
                echo json_encode(array("files" => $files));
                //this has to be the only data returned or you will get an error.
                //if you don't give this a json array it will give you a Empty file upload result error
                //it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
                // so that this will still work if javascript is not enabled
            } else {
                $file_data['upload_data'] = $this->upload->data();
            }
        }
    }

    public function deleteImage($file) {//gets the job done but you might want to add error checking and security
        //die();
        $success = unlink(FCPATH . 'uploads/gallery/' . $file);
        $success = unlink(FCPATH . 'uploads/gallery/thumbs/' . $file);
        //info to see if it is doing what it is supposed to
        $info = new StdClass;
        $info->sucess = $success;
        $info->path = base_url() . 'uploads/gallery/' . $file;
        $info->file = is_file(FCPATH . 'uploads/gallery' . $file);

        if ($this->input->is_ajax_request()) {
            //I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {
            //here you will need to decide what you want to show for a successful delete        
            $file_data['delete_data'] = $file;
        }
    }


    public function exitsession(){

        $this->session->sess_destroy();
        redirect('index.php/home/login');
        die();
    }  



    public function check_password($password = null){
        
        $data = $this->user_model->get_profile($this->session->userdata('id_profile'));
        if($data['password'] != $password){
            $this->form_validation->set_message('check_password', 'Password invalid, Please enter your password');          
            return false;
        }else{
            return true;
        }   
    }




    public function validate_repeat($str){
        if($str != $this->input->post('input_repeat')){
            $this->form_validation->set_message('validate_repeat', 'password are not the same');
            return false;
        }else{
            return true;
        }
    }    

}

