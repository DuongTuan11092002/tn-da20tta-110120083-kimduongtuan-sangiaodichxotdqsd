<?php
class libraryIMGModel extends CI_Model
{
	/* -------------------------------------------------------------------------- */
	/*                            section library image                           */
	// thêm ảnh vào thư viện
	public function insertMultiIMG($data_image_multi)
	{
		return	$this->db->insert('library_img', $data_image_multi);
	}
	// select img trong thư viện
	public function selectLibraryIMGbyID($id)
	{
		$sql_select_library_img = $this->db->get_where('library_img', ['product_id' => $id]);
		return $sql_select_library_img->result();
	}


	public function updateMultiIMG($id, $data_image_multi_edit)
	{
		foreach ($data_image_multi_edit as $data) {
			// Kiểm tra xem hình ảnh đã tồn tại trong cơ sở dữ liệu chưa
			$existing_image = $this->db->get_where('library_img', ['img_car' => $data['img_car'], 'product_id' => $id])->row();

			// Nếu hình ảnh chưa tồn tại, thêm mới vào cơ sở dữ liệu
			if (!$existing_image) {
				$data['product_id'] = $id;
				$this->db->insert('library_img', $data);
			}
		}
	}


	//delete img in database
	public function delete($id)
	{
		return $this->db->delete('library_img', ['id' => $id]);
	}

	public function deleteAll($id)
	{
		return $this->db->delete('library_img', ['product_id' => $id]);
	}

	/* -------------------------------------------------------------------------- */
}
