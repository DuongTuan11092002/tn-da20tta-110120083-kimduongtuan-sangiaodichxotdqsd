<?php
class newModel extends CI_Model
{

	/* -------------------------------------------------------------------------- */
	/*                                  CATEGORY                                  */

	/* --------------------------------- SELECT --------------------------------- */
	public function selectCategory()
	{
		$this->db->order_by('id', 'asc');
		$sql_select = $this->db->get('categories_news');
		return $sql_select->result();
	}
	/* --------------------------------- INSERT --------------------------------- */
	public function insertCategory($data_category)
	{
		return $this->db->insert('categories_news', $data_category);
	}

	/* ---------------------------------- EDIT ---------------------------------- */
	public function selectbyID($id)
	{
		$sql_select_category_id = $this->db->get_where('categories_news', ['id' => $id]);
		return $sql_select_category_id->row();
	}


	public 	function updateCategory($id, $data_category_edit)
	{
		return $this->db->update('categories_news', $data_category_edit, ['id' => $id]);
	}

	/* --------------------------------- DELETE --------------------------------- */
	public function delete($id)
	{
		return $this->db->delete('categories_news', ['id' => $id]);
	}

	/* -------------------------------------------------------------------------- */


	/* -------------------------------------------------------------------------- */
	/*                                     NEW                                    */

	/* --------------------------------- select --------------------------------- */
	public function selectNEW()
	{
		$sql_select_new = $this->db->select('categories_news.name as tendanhmuc, news.*, account.fullname as tentaikhoan')
			->from('categories_news')
			->join('news', 'news.categories_news_id = categories_news.id')
			->join('account', 'news.account_id = account.id')
			->get();
		return $sql_select_new->result();
	}

	/* --------------------------------- create --------------------------------- */
	public function insertNEW($data_new)
	{
		return $this->db->insert('news', $data_new);
	}

	/* ---------------------------------- edit ---------------------------------- */
	public function selectnewbyID($id)
	{
		$sql_select_new_id = $this->db->get_where('news', ['id' => $id]);
		return $sql_select_new_id->row();
	}

	public function updateNEW($id, $data_new_edit)
	{
		return $this->db->update('news', $data_new_edit, ['id' => $id]);
	}


	/* --------------------------------- DELETE --------------------------------- */
	public function getNewByID($id)
	{
		$sql = $this->db->get_where('news', ['id' => $id]);
		return $sql->row();
	}


	public function deleteNEW($id)
	{
		return $this->db->delete('news', ['id' => $id]);
	}
	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                                  NEW SALE                                  */
	public function selectNewBuyCar()
	{
		$sql_select_new_sale = $this->db->select('account.fullname as tenTK, new_car_sales.*, categories_news.name as tenDM ,categories_company.name as tenHX, vehicles.name as tenPK')
			->from('account')
			->join('new_car_sales', 'new_car_sales.account_id = account.id')
			->join('categories_company', 'categories_company.id = new_car_sales.categories_company_id')
			->join('vehicles', 'vehicles.id = new_car_sales.categories_vehicles_id')
			->join('categories_news', 'categories_news.id = new_car_sales.categories_new_id')
			->order_by('new_car_sales.id', 'desc')
			->get();
		return $sql_select_new_sale->result();
	}


	public function selectNewBuyCarID($id)
	{
		$sql_get_id = $this->db->select('account.fullname as tenTK, new_car_sales.*, categories_news.name as tenDM ,categories_company.name as tenHX, vehicles.name as tenPK')
			->from('account')
			->join('new_car_sales', 'new_car_sales.account_id = account.id')
			->join('categories_company', 'categories_company.id = new_car_sales.categories_company_id')
			->join('vehicles', 'vehicles.id = new_car_sales.categories_vehicles_id')
			->join('categories_news', 'categories_news.id = new_car_sales.categories_new_id')
			->order_by('new_car_sales.id', 'desc')
			->where('new_car_sales.id', $id)
			->get();
		return $sql_get_id->row();
	}


	public function updateNewSaleCar($id, $data_new_change)
	{
		return $this->db->update('new_car_sales', $data_new_change, ['id' => $id]);
	}



	/* --------------------------- Phần xóa thông tin --------------------------- */
	public function getNewSaleCarByID($id)
	{
		$sql = $this->db->get_where('new_car_sales', ['id' => $id]);
		return $sql->row();
	}


	public function DeleteNewSaleCar($id)
	{
		return $this->db->delete('new_car_sales', ['id' => $id]);
	}
	/* -------------------------------------------------------------------------- */
}
