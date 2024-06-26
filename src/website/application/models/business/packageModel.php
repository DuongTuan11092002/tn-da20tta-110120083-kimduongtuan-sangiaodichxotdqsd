<?php
class packageModel extends CI_Model
{
	public function select($id)
	{
		$sql = $this->db->select('account.fullname as tenTK, packages.name as tenPA, packages.date as thang, register_packages.*,')
		->from('account')
		->join('register_packages', 'account.id = register_packages.account_id')
		->join('packages', 'packages.id = register_packages.package_id')
		->where('register_packages.account_id', $id)
		->order_by('register_packages.id', 'desc')
		->get();
		return $sql->result();
	}
}

?>