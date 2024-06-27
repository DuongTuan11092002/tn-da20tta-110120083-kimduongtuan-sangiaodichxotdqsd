<?php
class productModel extends CI_Model
{
	public function select()
	{
		$sql = $this->db->select('account.fullname as tenTK, account.role as role, categories_company.name as tenHX, citys.name as tenTP, vehicles.name as tenDX, product_cars.*')
			->from('account')
			->join('product_cars', 'product_cars.account_id = account.id')
			->join('categories_company', 'categories_company.id = product_cars.categories_company_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('vehicles', 'vehicles.id = product_cars.vehicles_id')
			->order_by('product_cars.product_id', 'desc')
			->where('account.role', 0)
			->get();
		return $sql->result();
	}



	public function edit($id)
	{
		$sql = $this->db->select('account.fullname as tenTK, account.role as role, categories_company.name as tenHX, citys.name as tenTP, vehicles.name as tenDX, product_cars.*')
			->from('account')
			->join('product_cars', 'product_cars.account_id = account.id')
			->join('categories_company', 'categories_company.id = product_cars.categories_company_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('vehicles', 'vehicles.id = product_cars.vehicles_id')
			->where('product_cars.product_id', $id)
			->get();
		return $sql->row();
	}

	public function update($id, $data)
	{
		return $this->db->update('product_cars', $data ,['product_id' => $id]);
	}

	public function getID($id)
	{
		$sql = $this->db->get_where('product_cars', ['product_id' => $id]);
		return $sql->row();
	}

	public function delete($id)
	{
		return $this->db->delete('product_cars', ['product_id' => $id]);
	}
}
