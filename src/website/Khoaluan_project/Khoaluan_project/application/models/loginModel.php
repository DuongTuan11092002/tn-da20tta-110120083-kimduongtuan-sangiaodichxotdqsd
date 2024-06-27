<?php
class loginModel extends CI_Model
{

	public function checkLogin($email, $password)
	{
		$sql_check_login = $this->db->where('email', $email)->where('password', $password)->get('account');
		return $sql_check_login->result();
	}

	public function register($data_register)
	{
		return $this->db->insert('account', $data_register);
	}
}
