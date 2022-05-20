<?php


class Chat_model extends CI_Model
{
	function __construct()
	{
		parent::__construct(); 
	}
		
	function getMsg($_data)
	{	
		$r = $_data['reciever_userid'];
		$s = $_data['sender_userid'];
		$sql = "SELECT * FROM tbl_messages m JOIN tbl_user ON m.sender_userid = id_user
				WHERE (sender_userid = $s AND reciever_userid = $r)
				OR (reciever_userid = $s AND sender_userid = $r )";

		//$_data['sender_userid'] $_data['reciever_userid']
		return $this->db->query($sql);//, array($_data['sender_userid'], $_data['reciever_userid'],$_data['reciever_userid'], $_data['sender_userid'])
	}
	

	public function view_all($_data){

		$sql = "SELECT id_user,message, name, last_name, photo, time FROM tbl_messages, tbl_user
		WHERE reciever_userid = ?
		AND sender_userid = id_user
		group by sender_userid order by time desc;";

		return $this->db->query($sql, $_data['reciever_userid'])->result();

	}





	function insertMsg($_data, $current){

		$sql = "INSERT INTO tbl_messages SET  message=?, sender_userid = ?, reciever_userid = ?, time=?";
		return $this->db->query($sql, array($_data['message'], $_data['profile']['id_user'], $_data['reciever_userid'], $current));

	}
}

