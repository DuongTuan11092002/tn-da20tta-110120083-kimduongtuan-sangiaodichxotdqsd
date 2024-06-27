<?php 
	class vehiclesModel extends CI_Model
	{
		/* --------------------------------- SELECT --------------------------------- */
		public function select()
		{
			$this->db->order_by('id', 'desc');
			$sql_select = $this->db->get('vehicles');
			return $sql_select->result();
		}

		/* --------------------------------- CREATE --------------------------------- */
		public function insert($data_vehicles)
		{
			return $this->db->insert('vehicles', $data_vehicles);
		}

		/* -------------------------------------------------------------------------- */
		/*                                    EDIT                                    */
		public function selectbyID($id)
		{
			$sql_get_id = $this->db->get_where('vehicles', ['id' => $id]);
			return $sql_get_id->row();
		}

		public function update($id, $data_vehicles_edited) 
		{
			return $this->db->update('vehicles', $data_vehicles_edited, ['id' => $id]);
		}
		/* --------------------------------- DELETE --------------------------------- */
		public function delete($id)
		{
			return $this->db->delete('vehicles', ['id' => $id]);	
		}
		/* -------------------------------------------------------------------------- */
	}

?>