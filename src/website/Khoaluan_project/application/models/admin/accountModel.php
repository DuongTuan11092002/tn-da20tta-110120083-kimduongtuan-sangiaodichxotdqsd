<?php 
	class accountModel extends CI_Model
	{
		public function select()
		{
			$sql_account = $this->db->get('account');
			return $sql_account->result();
		}

		/* ------------------------------ SELECT ADMIN ------------------------------ */
		public function selectbyAD()
		{
			$sql_account_admin = $this->db->get_where('account', ['role' => 2]);
			return $sql_account_admin->result();
		}
	}

?>