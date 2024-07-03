<?php
class productModel extends CI_Model
{
	/* --------------------------------- SELECT --------------------------------- */
	public function select($id)
	{
		$sql_select = $this->db->select('categories_company.name as tenhangxe, citys.name as tenkhuvuc, vehicles.name as tendongxe,
		product_cars.*, account.role as role')
			->from('categories_company')
			->join('product_cars', 'product_cars.categories_company_id = categories_company.id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('vehicles', 'vehicles.id = product_cars.vehicles_id')
			->join('account', 'product_cars.account_id = account.id')
			->order_by('product_id', 'DESC')
			->where('product_cars.account_id', $id)
			->where('account.role', 1)
			->get();
		return $sql_select->result();
	}


	/* --------------------------------- INSERT --------------------------------- */
	public function insert($data_product_business)
	{
		$this->db->insert('product_cars', $data_product_business);
		return $this->db->insert_id();
	}

	/* --------------------------------- LẤY SẢN PHẨM THEO ID --------------------------------- */
	public function selectbyID($id)
	{
		$sql_select_by_id = $this->db->get_where('product_cars', ['product_id' => $id]);
		return $sql_select_by_id->row();
	}

	public function update($id, $data_product_business_edit)
	{
		return $this->db->update('product_cars', $data_product_business_edit, ['product_id' => $id]);
	}


	/* ------------------------------ XÓA sẢN phẨM ------------------------------ */
	public function delete($id)
	{
		return $this->db->delete('product_cars', ['product_id' => $id]);
	}
}
