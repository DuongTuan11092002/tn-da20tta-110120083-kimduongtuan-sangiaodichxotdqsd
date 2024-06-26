<?php
class companyModel extends CI_Model
{
	public function select()
	{
		$this->db->order_by('id','desc');
		$sql_select = $this->db->get('categories_company');
		return $sql_select->result();
	}

	/* --------------------------------- INSERT --------------------------------- */
	public function Insert($data_company)
	{
		return $this->db->insert('categories_company', $data_company);
	}

	/* -------------------------------- SELECT ID ------------------------------- */

	public function selectID($id)
	{
		$sql_select_id = $this->db->get_where('categories_company', ['id' => $id]);
		return $sql_select_id = $sql_select_id->row();
	}

	/* --------------------------------- UPDATE --------------------------------- */
	public function update($id, $data_company_edited)
	{
		return $this->db->update('categories_company', $data_company_edited, ['id' => $id]);
	}

	/* --------------------------------- DELETE --------------------------------- */
	public function delete($id) 
	{
		return $this->db->delete('categories_company', ['id' => $id]);
	}
}
