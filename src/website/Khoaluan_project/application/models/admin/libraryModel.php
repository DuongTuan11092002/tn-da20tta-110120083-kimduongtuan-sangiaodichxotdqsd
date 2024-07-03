<?php 
	class libraryModel extends CI_Model
	{
		public function select($id)
		{
			$sql = $this->db->get_where('library_img', ['product_id' => $id]);
			return $sql->result();
		}

		public function getID($id)
		{
			$sql = $this->db->get_where('library_img', ['product_id' => $id]);
			return $sql->row();
		}

		public function delete($id)
		{
			return $this->db->delete('library_img', ['product_id' => $id]);
		}
	}

?>