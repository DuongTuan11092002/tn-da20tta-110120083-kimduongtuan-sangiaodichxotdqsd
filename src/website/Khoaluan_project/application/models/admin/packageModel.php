<?php
class packageModel extends CI_Model
{
	/* --------------------------------- LIST --------------------------------- */
	public function select()
	{
		$this->db->order_by('id', 'DESC');
		$sql_select_package = $this->db->get('packages');
		return $sql_select_package->result();
	}

	/* --------------------------------- CREATE --------------------------------- */
	public function insert($data_package)
	{
		return $this->db->insert('packages', $data_package);
	}

	/* ---------------------------------- EDIT ---------------------------------- */
	public function selectbyID($id)
	{
		$sql_select_id = $this->db->get_where('packages', ['id' => $id]);
		return $sql_select_id->row();
	}

	public function update($id, $data_package_edit)
	{
		return $this->db->update('packages', $data_package_edit, ['id' => $id]);
	}

	/* --------------------------------- DELETE --------------------------------- */
	public function delete($id)
	{
		return $this->db->delete('packages', ['id' => $id]);
	}

// hiện danh sách đăng ký gói
public function selectListRegisterPackage()
{
	$sql_select_register_package = $this->db->select('account.fullname as tenKH, account.id as idKH, packages.name as tengoi, packages.price as giagoi, register_packages.*')
	->from('account')
	->join('register_packages', 'register_packages.account_id = account.id')
	->join('packages', 'packages.id = register_packages.package_id')
	->order_by('register_packages.id', 'desc')
	->get();
	return $sql_select_register_package->result();
}

public function GetAccountRegister($id)
{
	$sql_select_register_package = $this->db->select('account.*, account.id as idKH, packages.name as tengoi, packages.price as giagoi, packages.date as TGgoi, register_packages.*')
	->from('account')
	->join('register_packages', 'register_packages.account_id = account.id')
	->join('packages', 'packages.id = register_packages.package_id')
	->where('register_packages.id', $id)
	->get();
	return $sql_select_register_package->row();
}

public function UpdatePackageID($id, $data_register_package)
{
	return $this->db->update('register_packages', $data_register_package, ['id' => $id]);
}

public function UpdateBusinessAccount($account_id, $change_status_business)
{
	return $this->db->update('account', $change_status_business, ['id'=> $account_id]);
}

public function DeleteRegister($id)
{
	return $this->db->update('register_packages', ['id' => $id]);
}

}
