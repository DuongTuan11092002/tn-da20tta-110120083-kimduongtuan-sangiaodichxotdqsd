<?php
class cityModel extends CI_Model
{
	public function select()
	{
		$this->db->order_by('id', 'DESC');
		$sql_city = $this->db->get('citys');
		return $sql_city->result();
	}


	/* --------------------------------- CREATE --------------------------------- */
	public function insert($data_city)
	{
		return $this->db->insert('citys', $data_city);
	}

	/* ---------------------------------- EDIT ---------------------------------- */
	public function selectbyID($id)
	{
		$sql_city_id = $this->db->get_where('citys', ['id' => $id]);
		return $sql_city_id->row();
	}

	public function update($id, $data_city_edit)
	{
		return $this->db->update('citys', $data_city_edit, ['id' => $id]);
	}

	/* --------------------------------- DELETE --------------------------------- */
	public function delete($id)
	{
		return $this->db->delete('citys', ['id' => $id]);
	}
}
?>