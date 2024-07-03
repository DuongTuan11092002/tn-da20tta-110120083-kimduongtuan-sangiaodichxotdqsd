<?php
class bannerModel extends CI_Model
{
	public function Select()
	{
		$this->db->order_by('banner.id', 'desc');
		$sql = $this->db->get('banner');
		return $sql->result();
	}


	public function Insert($data)
	{
		return $this->db->insert('banner', $data);
	}

	public function getID($id)
	{
		$sql = $this->db->select('account.fullname as tenTK, banner.*')
			->from('account')
			->join('banner', 'banner.account_id = account.id')
			->where('banner.id', $id)
			->get();
		return $sql->row();
	}

	public function Update($id, $data)
	{
		return $this->db->update('banner', $data, ['id' => $id]);
	}
	public function getBannerByID($id)
	{
		$sql = $this->db->get_where('banner', ['id' => $id]);
		return $sql->row();
	}

	public function Delete($id)
	{
		return $this->db->delete('banner', ['id' => $id]);
	}
}
