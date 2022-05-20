<?php

class Chat extends CI_Controller{
	
	/**
	 * Constructor duh
	 * - loads the model
	 */
	public $data;
	function __construct(){

		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('chat_model');
		$this->data['profile'] = $this->user_model->get_profile($this->session->userdata('id_profile'));		
	}
	
	/**
	 * Loads the default page for the XML example
	 * 
	 */
	public function index()
	{	
		$this->load->view('chat/chatView');
		//$this->load->view('chat/chatView');		
	}
	
	/**
	 * UPDATES the DB
	 * 
	 * @param $_POST array
	 * @return bool
	 */
	public function update(){

		/*if($this->input->post('postmsgs')){

			die();
		}*/
		//$name = $this->input->post('name');
		//$message = $this->input->post('message');
		//$html_redirect = $this->input->post('html_redirect');

		$current = new DateTime();

		$this->data['id'] = $this->session->userdata('id_profile');
		$this->data['reciever_userid'] = $this->input->post('reciever_userid');
		$this->data['name'] = $this->input->post('name');
		$this->data['message'] = $this->input->post('message');
		$this->data['html_redirectt'] = $this->input->post('html_redirect');
		//echo "--" . $this->data['reciever_userid'];
		$this->chat_model->insertMsg($this->data, $current->getTimestamp());
		
		if($this->data['html_redirect'] === "true")
		{
			redirect('/chat');
		}
	}
	
	/**
	 * XML Backend
	 * 
	 * @return
	 */
	public function backend()
	{	
		//HTTP headers for XML							
		header("Content-type: text/xml");
		header("Cache-Control: no-cache");
		
		//get the data
		$this->data['sender_userid'] =  $this->session->userdata('id_profile');
		$this->data['reciever_userid'] = $this->input->post('reciever_userid');
		//var_dump($this->data);
		//echo $this->data['sender_userid'] . "\n";
		//echo $this->data['reciever_userid'];
		$query = $this->chat_model->getMsg($this->data);
		
		//var_dump($query); die();
		
		//if empty change the status


		
		if($query->num_rows()==0){
			$status_code = 2;
		}else{
			$status_code = 1;
		}
		
		//XML headers
		echo "<?xml version=\"1.0\"?>\n";
		echo "<response>\n";
		echo "\t<status>$status_code</status>\n";
		echo "\t<time>".time()."</time>\n";
		
		//Loop through all the data
		if($query->num_rows()>0){
			foreach($query->result() as $row){
				
				//sanitize so XML is valid
				$escmsg = htmlspecialchars(stripslashes($row->message));
				echo "\t<message>\n";
				echo "\t\t<author>$row->time</author>\n";
				echo "\t\t<name>$row->name</name>\n";
				echo "\t\t<time>".date('H:i:s d-m-Y ', $row->time)."</time>\n";				
				echo "\t\t<sender_userid>$row->sender_userid</sender_userid>\n";
				echo "\t\t<text>$escmsg</text>\n";
				echo "\t</message>\n";
			}
		}
		echo "</response>";
				
	}
	
	/**
	 * Loads the default view for the JSON example
	 * 
	 */
	public function json()
	{
		$this->load->view('jsonView');
	}
	
	/**
	 * Displays the JSON formatted data
	 */
	public function json_backend()
	{
		// Headers for the JSON
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		
		//get the data
		$query = $this->chat_model->getMsg();

		//store the results in an array
		$data = $query->result_array();
		
		//encode the array into json
		$jsonData = json_encode($data);
		
		//JSON sized dump to STDOUT
		echo $jsonData;
	}
	
	/**
	* Main for the HTML example
	* @return a web page
	*/
	public function html()
	{
		$data = array();
		
		$data['html'] = $this->html_backend();
		
		$this->load->view('chat/htmlView',$data);
	}
	
	/** 
	* Function to display the data in HTML
	* @return HTML data
	*/	
	public function html_backend()
	{
		//create 
		$data = array();
		$ret = false;
		
		//store
		$data['query'] = $this->chat_model->getMsg();
		
		//send to view, store the results in variable
		$ret = $this->load->view('chat/htmlBackView',$data, true);
		
		return $ret;
	}
}
?>