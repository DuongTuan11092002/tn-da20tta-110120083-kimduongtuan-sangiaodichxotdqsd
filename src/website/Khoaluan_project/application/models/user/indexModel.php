<?php
class indexModel extends CI_Model
{
	/* -------------------------------------------------------------------------- */
	/*                                 MAIN-SELECT                                */
	/* -------------------------------------------------------------------------- */




	public function selectBusiness()
	{
		$sql_select_business = $this->db->select('account.name_business as tendoanhnghiep, account.thumbnail as thumbnail_business, account.id as business_id ,COUNT(product_cars.product_id) as total_products, product_cars.*')
			->from('account')
			->join('product_cars', 'product_cars.account_id = account.id')
			->where('status_premium', 2)
			->group_by('account.name_business')
			->get();

		return $sql_select_business->result();
	}


	/* -------------------------------------------------------------------------- */
	/*                              lấy id đăng nhập                              */
	// phần hồ sơ của tài khoản
	public function AccountID($id)
	{
		$sql_get_id = $this->db->get_where('account', ['id' => $id]);
		return $sql_get_id->row();
	}


	public function updateAccount($id, $data_info_account)
	{
		$this->db->where('id', $id);
		$this->db->set($data_info_account);
		return $this->db->update('account');
	}
	// load danh sách
	public function selectPackageByID($id)
	{
		$sql = $this->db->select('account.fullname as tenTK, packages.name as tenPA, register_packages.*')
			->from('account')
			->join('register_packages', 'register_packages.account_id = account.id')
			->join('packages', 'packages.id = register_packages.package_id')
			->where('register_packages.account_id', $id)
			->order_by('register_packages.id', 'desc')
			->limit(5)
			->get();
		return $sql->result();
	}



	// load danh sách bài đăng tin bán xe
	public function selectPostByID($id)
	{
		$sql = $this->db->select('account.fullname as TenTK, product_cars.*, categories_company.name as tenHX, citys.name as tenTP, vehicles.name as tenDX')
			->from('account')
			->join('product_cars', 'product_cars.account_id = account.id')
			->join('categories_company', 'categories_company.id = product_cars.categories_company_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('vehicles', 'vehicles.id = product_cars.vehicles_id')
			->where('product_cars.account_id', $id)
			->order_by('product_cars.product_id', 'desc')
			->get();
		return $sql->result();
	}

	// load danh sách liên hệ của người dùng cơ bản
	public function selectContactProductUser($account_id)
	{
		$sql = $this->db->select('product_cars.product_name as tenSP, account.fullname as tenTK, contacts.*')
			->from('product_cars')
			->join('contacts', 'contacts.product_id = product_cars.product_id')
			->join('account', 'account.id = contacts.account_id')
			->where('contacts.account_id', $account_id)
			->order_by('created_at', 'desc')
			->get();
		return $sql->result();
	}

	public function getContactProID($id)
	{
		$sql = $this->db->select('product_cars.product_name as tenSP, account.fullname as tenTK, contacts.*')
			->from('product_cars')
			->join('contacts', 'contacts.product_id = product_cars.product_id')
			->join('account', 'account.id = contacts.account_id')
			->where('contacts.id', $id)
			->get();
		return $sql->row();
	}

	public function updateContactProductUser($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('contacts', $data);
	}


	public function getPostByID($id)
	{
		$sql = $this->db->select('account.fullname as TenTK, product_cars.*, categories_company.name as tenHX, citys.name as tenTP, vehicles.name as tenDX')
			->from('account')
			->join('product_cars', 'product_cars.account_id = account.id')
			->join('categories_company', 'categories_company.id = product_cars.categories_company_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('vehicles', 'vehicles.id = product_cars.vehicles_id')
			->where('product_cars.product_id', $id)
			->get();
		return $sql->row();
	}


	// Phấn Model xử lý hết hạn bài viết
	public function getPostID($id)
	{
		$sql = $this->db->get_where('product_cars', ['product_id' => $id]);
		return $sql->row();
	}

	public function updateStatusPost($id, $data)
	{
		$this->db->where('product_id', $id);
		return $this->db->update('product_cars', $data);
	}


	public function getSelectIMG($id)
	{
		$this->db->where('product_id', $id);
		$sql = $this->db->get('library_img');
		return $sql->result();
	}
	// Load danh sách bài đăng tin mua xe
	public function selectBuyByID($id)
	{
		$sql = $this->db->select('vehicles.name as tenDX, account.fullname as tenTK, categories_company.name as tenHX, categories_news.name as tenDMTT, new_car_sales.*')
			->from('account')
			->join('new_car_sales', 'new_car_sales.account_id = account.id')
			->join('vehicles', 'vehicles.id = new_car_sales.categories_vehicles_id')
			->join('categories_company', 'categories_company.id = new_car_sales.categories_company_id')
			->join('categories_news', 'categories_news.id = new_car_sales.categories_new_id')
			->where('new_car_sales.account_id', $id)
			->order_by('new_car_sales.id', 'desc')
			->get();
		return $sql->result();
	}


	public function getDetailBuyByID($id)
	{
		$sql = $this->db->select('vehicles.name as tenDX, account.fullname as tenTK, categories_company.name as tenHX,  new_car_sales.*')
			->from('account')
			->join('new_car_sales', 'new_car_sales.account_id = account.id')
			->join('vehicles', 'vehicles.id = new_car_sales.categories_vehicles_id')
			->join('categories_company', 'categories_company.id = new_car_sales.categories_company_id')
			->where('new_car_sales.id', $id)
			->get();
		return $sql->row();
	}

	// check stop time 
	public function getBuyID($id)
	{
		$sql = $this->db->get_where('new_car_sales', ['id' => $id]);
		return $sql->row();
	}

	public function updateStatusNew($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('new_car_sales', $data);
	}

	/* -------------------------------------------------------------------------- */



	/* -------------------------------------------------------------------------- */
	/*                                Phần tìm kiếm                               */
	public function productSearch($data_search)
	{
		$sql_search = $this->db->select('citys.name as tenkhuvuc, categories_company.name as tenhangxe, product_cars.*, vehicles.name as tendongxe')
			->from('citys')
			->join('product_cars', 'product_cars.city_area_id = citys.id')
			->join('categories_company', 'product_cars.categories_company_id = categories_company.id')
			->join('vehicles', 'product_cars.vehicles_id = vehicles.id')
			->where("product_cars.name LIKE '%$data_search%' OR vehicles.name LIKE '%$data_search%' OR citys.name LIKE '%$data_search%' OR categories_company.name LIKE '%$data_search%'")
			->get();

		return $sql_search->result();
	}

	/* -------------------------------------------------------------------------- */


	/* -------------------------------------------------------------------------- */
	/*                                 Lấy banner                                 */
	public function SelectBanner()
	{
		$status = array(1, 2);
		$this->db->order_by('id', 'desc');
		$this->db->where_in('status', $status);
		$sql = $this->db->get('banner');
		return $sql->result();
	}

	public function SelectBannerHot()
	{
		$this->db->limit(2);
		$this->db->order_by('banner', 'random');
		$sql = $this->db->get_where('banner', ['status' => 2]);
		return $sql->result();
	}
	/* -------------------------------------------------------------------------- */





	/* -------------------------------------------------------------------------- */
	/*                                lấy sản phẩm                                */
	public function mainProduct()
	{
		$sql_main_product = $this->db->select('account.fullname as tennguoidung, account.thumbnail as hinhnguoidung, account.phone as phone ,product_cars.*, citys.name as tenkhuvuc, categories_company.name as tenhangxe, vehicles.name as tendongxe')
			->from('account')
			->join('product_cars', 'product_cars.account_id = account.id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('categories_company', 'product_cars.categories_company_id = categories_company.id')
			->join('vehicles', 'product_cars.vehicles_id = vehicles.id')
			->order_by('product_cars.product_id', 'desc')
			->where('product_cars.product_status', 2)
			->get();
		return $sql_main_product->result();
	}



	public function countAllProduct()
	{
		$this->db->from('product_cars');
		return $this->db->count_all_results();
	}

	public function getIndexPagination($limit, $start)
	{
		$status_array = array(1, 2);

		$sql_main_product = $this->db->select('account.fullname as tennguoidung, account.thumbnail as hinhnguoidung, account.phone as phone ,product_cars.*, citys.name as tenkhuvuc, categories_company.name as tenhangxe, vehicles.name as tendongxe')
			->from('account')
			->join('product_cars', 'product_cars.account_id = account.id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('categories_company', 'product_cars.categories_company_id = categories_company.id')
			->join('vehicles', 'product_cars.vehicles_id = vehicles.id')
			->limit($limit, $start)
			->order_by('product_cars.product_id', 'random')
			->where_in('product_cars.product_status', $status_array)
			->get();
		return $sql_main_product->result();
	}
	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                      lấy sản phẩm theo danh mục xe hơi                     */

	public function getTitleCategoriesCompany($id)
	{
		$this->db->select('categories_company.*');
		$this->db->from('categories_company');
		$this->db->limit(1);
		$this->db->where('categories_company.id', $id);
		$sql = $this->db->get();
		$result = $sql->row();
		return $title = $result->name;
	}

	public function getSlugCategoriesCompany($id)
	{
		$this->db->select('categories_company.*');
		$this->db->from('categories_company');
		$this->db->limit(1);
		$this->db->where('categories_company.id', $id);
		$sql = $this->db->get();
		$result = $sql->row();
		return $slug = $result->slug;
	}

	public function countAllProductByCate($id)
	{
		$this->db->where('categories_company_id', $id);
		$this->db->from('product_cars');
		return $this->db->count_all_results();
	}

	public function getCatePagination($id, $limit, $start)
	{
		$status_array = array(1, 2);

		$sql_get_categories_company =  $this->db->select('categories_company.name as tenhangxe, product_cars.*, account.fullname as tennguoidung, citys.name as tenkhuvuc')
			->from('categories_company')
			->join('product_cars', 'product_cars.categories_company_id = categories_company.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where('product_cars.categories_company_id', $id)
			->where_in('product_cars.product_status', $status_array)
			->order_by('product_cars.product_id', 'desc')
			->limit($limit, $start)
			->get();
		return $sql_get_categories_company->result();
	}


	// phần lọc sản phẩm của hãng xe
	public function getCatePaginationBykytu($id, $kytu, $limit, $start) //theo ký tự lọc
	{
		$status_array = array(1, 2);

		$sql_get_categories_company_filter_kytu =  $this->db->select('categories_company.name as tenhangxe, product_cars.*, account.fullname as tennguoidung, citys.name as tenkhuvuc')
			->from('categories_company')
			->join('product_cars', 'product_cars.categories_company_id = categories_company.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where('product_cars.categories_company_id', $id)
			->where_in('product_cars.product_status', $status_array)
			->order_by('product_cars.product_name', $kytu)
			->limit($limit, $start)
			->get();
		return $sql_get_categories_company_filter_kytu->result();
	}


	//  lọc theo ký tự giá

	public function getCatePaginationBygia($id, $gia, $limit, $start) //theo ký tự lọc
	{
		$status_array = array(1, 3);

		$sql_get_categories_company_filter_gia =  $this->db->select('categories_company.name as tenhangxe, product_cars.*, account.fullname as tennguoidung, citys.name as tenkhuvuc')
			->from('categories_company')
			->join('product_cars', 'product_cars.categories_company_id = categories_company.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where('product_cars.categories_company_id', $id)
			->where_in('product_cars.product_status', $status_array)
			->order_by('product_cars.product_price', $gia)
			->limit($limit, $start)
			->get();
		return $sql_get_categories_company_filter_gia->result();
	}

	public function getMinProductByCompany($id)
	{
		$this->db->select('product_cars.*');
		$this->db->from('product_cars');
		$this->db->select_min('product_price');
		$this->db->where('product_cars.categories_company_id', $id);
		$this->db->limit(1);
		$sql = $this->db->get();
		$result = $sql->row();
		return $price = $result->product_price;
	}

	public function getMaxProductByCompany($id)
	{
		$this->db->select('product_cars.*');
		$this->db->from('product_cars');
		$this->db->select_max('product_price');
		$this->db->where('product_cars.categories_company_id', $id);
		$this->db->limit(1);
		$sql = $this->db->get();
		$result = $sql->row();
		return $price = $result->product_price;
	}

	public function getCatePaginationByrange($id, $price_from, $price_to, $limit, $start)
	{
		$status_array = array(1, 3);

		$sql_get_categories_company_filter =  $this->db->select('categories_company.name as tenhangxe, product_cars.*, account.fullname as tennguoidung, citys.name as tenkhuvuc')
			->from('categories_company')
			->join('product_cars', 'product_cars.categories_company_id = categories_company.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where('product_cars.categories_company_id', $id)
			->where_in('product_cars.product_status', $status_array)
			->where('product_cars.product_price >=', $price_from)
			->where('product_cars.product_price <=', $price_to)
			->order_by('product_cars.product_price', 'asc')
			->limit($limit, $start)
			->get();
		return $sql_get_categories_company_filter->result();
	}

	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                   lấy sản phẩm theo danh mục dòng xe hơi                   */


	public function getTitleCategoriesVehicles($id)
	{
		$this->db->select('vehicles.*');
		$this->db->from('vehicles');
		$this->db->limit(1);
		$this->db->where('vehicles.id', $id);
		$sql = $this->db->get();
		$result = $sql->row();
		return $title = $result->name;
	}

	public function getSlugCategoriesVehicles($id)
	{
		$this->db->select('vehicles.*');
		$this->db->from('vehicles');
		$this->db->limit(1);
		$this->db->where('vehicles.id', $id);
		$sql = $this->db->get();
		$result = $sql->row();
		return $slug = $result->slug;
	}

	public function countAllProductByVehicles($id)
	{
		$this->db->where('vehicles_id', $id);
		$this->db->from('product_cars');
		return $this->db->count_all_results();
	}

	public function getVehiclesPagination($id, $limit, $start)
	{
		$status_array = array(1, 2);

		$sql_get_categories_vehicles =  $this->db->select('vehicles.name as tendongxe, product_cars.*, account.fullname as tennguoidung, citys.name as tenkhuvuc')
			->from('vehicles')
			->join('product_cars', 'product_cars.vehicles_id = vehicles.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where('product_cars.vehicles_id', $id)
			->where_in('product_cars.product_status', $status_array)
			->order_by('product_cars.product_id', 'desc')
			->limit($limit, $start)
			->get();
		return $sql_get_categories_vehicles->result();
	}

	// lọc theo ký tự
	public function getVehiclesPaginationBykytu($id, $kytu, $limit, $start)
	{
		$status_array = array(1, 2);

		$sql_get_categories_vehicles_filter_kytu =  $this->db->select('vehicles.name as tendongxe, product_cars.*, account.fullname as tennguoidung, citys.name as tenkhuvuc')
			->from('vehicles')
			->join('product_cars', 'product_cars.vehicles_id = vehicles.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where('product_cars.vehicles_id', $id)
			->where_in('product_cars.product_status', $status_array)
			->order_by('product_cars.product_name', $kytu)
			->limit($limit, $start)
			->get();
		return $sql_get_categories_vehicles_filter_kytu->result();
	}
	// lọc theo giá
	public function getVehiclesPaginationBygia($id, $gia, $limit, $start)
	{
		$status_array = array(1, 2);

		$sql_get_categories_vehicles_filter_gia =  $this->db->select('vehicles.name as tendongxe, product_cars.*, account.fullname as tennguoidung, citys.name as tenkhuvuc')
			->from('vehicles')
			->join('product_cars', 'product_cars.vehicles_id = vehicles.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where('product_cars.vehicles_id', $id)
			->where_in('product_cars.product_status', $status_array)
			->order_by('product_cars.product_price', $gia)
			->limit($limit, $start)
			->get();
		return $sql_get_categories_vehicles_filter_gia->result();
	}


	// lọc theo khoảng giá
	public function getMinProductByVehicles($id) //lấy min
	{
		$this->db->select('product_cars.*');
		$this->db->from('product_cars');
		$this->db->select_min('product_price');
		$this->db->where('product_cars.vehicles_id', $id);
		$this->db->limit(1);
		$sql = $this->db->get();
		$result = $sql->row();
		return $price = $result->product_price;
	}

	public function getMaxProductByVehicles($id) //lấy Max
	{
		$this->db->select('product_cars.*');
		$this->db->from('product_cars');
		$this->db->select_max('product_price');
		$this->db->where('product_cars.vehicles_id', $id);
		$this->db->limit(1);
		$sql = $this->db->get();
		$result = $sql->row();
		return $price = $result->product_price;
	}

	public function getVehiclesPaginationByRange($id, $price_from, $price_to, $limit, $start)
	{
		$status_array = array(1, 2);

		$sql_get_categories_vehicles_filter_range =  $this->db->select('vehicles.name as tendongxe, product_cars.*, account.fullname as tennguoidung, citys.name as tenkhuvuc')
			->from('vehicles')
			->join('product_cars', 'product_cars.vehicles_id = vehicles.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where('product_cars.vehicles_id', $id)
			->where_in('product_cars.product_status', $status_array)
			->where('product_cars.product_price >=', $price_from)
			->where('product_cars.product_price <=', $price_to)
			->order_by('product_cars.product_price', 'asc')
			->limit($limit, $start)
			->get();
		return $sql_get_categories_vehicles_filter_range->result();
	}

	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                   lấy sản phẩm theo danh mục thành phố                   */
	public function getTitleCategoriesCity($id)
	{
		$this->db->select('citys.*');
		$this->db->from('citys');
		$this->db->limit(1);
		$this->db->where('citys.id', $id);
		$sql = $this->db->get();
		$result = $sql->row();
		return $title = $result->name;
	}

	public function getSlugCategoriesCity($id)
	{
		$this->db->select('citys.*');
		$this->db->from('citys');
		$this->db->limit(1);
		$this->db->where('citys.id', $id);
		$sql = $this->db->get();
		$result = $sql->row();
		return $slug = $result->slug;
	}

	public function countAllProductByCity($id)
	{
		$this->db->where('city_area_id', $id);
		$this->db->from('product_cars');
		return $this->db->count_all_results();
	}

	public function getCityPagination($id, $limit, $start)
	{
		$status_array = array(1, 2);

		$sql_get_categories_city =  $this->db->select('vehicles.name as tendongxe, product_cars.*, account.fullname as tennguoidung, account.phone as phone, citys.name as tenkhuvuc')
			->from('vehicles')
			->join('product_cars', 'product_cars.vehicles_id = vehicles.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->order_by('product_cars.product_id', 'random')
			->where_in('product_cars.product_status', $status_array)
			->where('product_cars.city_area_id', $id)
			->limit($limit, $start)
			->get();
		return $sql_get_categories_city->result();
	}


	// lọc theo ký tự sản phẩm theo khu vực
	public function getCityPaginationBykytu($id, $kytu, $limit, $start)
	{
		$status_array = array(1, 2);

		$sql_get_categories_city =  $this->db->select('vehicles.name as tendongxe, product_cars.*, account.fullname as tennguoidung, account.phone as phone, citys.name as tenkhuvuc')
			->from('vehicles')
			->join('product_cars', 'product_cars.vehicles_id = vehicles.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where_in('product_cars.product_status', $status_array)
			->where('product_cars.city_area_id', $id)
			->order_by('product_cars.product_name', $kytu)
			->limit($limit, $start)
			->get();
		return $sql_get_categories_city->result();
	}

	// Lọc theo giá thấp và cao của sản phẩm
	public function getCityPaginationBygia($id, $gia, $limit, $start)
	{
		$status_array = array(1, 2);

		$sql_get_categories_city =  $this->db->select('vehicles.name as tendongxe, product_cars.*, account.fullname as tennguoidung, account.phone as phone, citys.name as tenkhuvuc')
			->from('vehicles')
			->join('product_cars', 'product_cars.vehicles_id = vehicles.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where_in('product_cars.product_status', $status_array)
			->where('product_cars.city_area_id', $id)
			->order_by('product_cars.product_price', $gia)
			->limit($limit, $start)
			->get();
		return $sql_get_categories_city->result();
	}

	// get Min and Max follow city
	public function getMinProductByCity($id)
	{
		$this->db->select('product_cars.*');
		$this->db->from('product_cars');
		$this->db->select_min('product_price');
		$this->db->where('city_area_id', $id);
		$sql = $this->db->get();
		$result = $sql->row();
		return $price = $result->product_price;
	}

	public function getMaxProductByCity($id)
	{
		$this->db->select('product_cars.*');
		$this->db->from('product_cars');
		$this->db->select_max('product_price');
		$this->db->where('city_area_id', $id);
		$sql = $this->db->get();
		$result = $sql->row();
		return $price = $result->product_price;
	}

	public function getCityPaginationByRange($id, $price_from, $price_to, $limit, $start)
	{
		$status_array = array(1, 2);

		$sql_get_categories_city =  $this->db->select('vehicles.name as tendongxe, product_cars.*, account.fullname as tennguoidung, account.phone as phone, citys.name as tenkhuvuc')
			->from('vehicles')
			->join('product_cars', 'product_cars.vehicles_id = vehicles.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where_in('product_cars.product_status', $status_array)
			->where('product_cars.city_area_id', $id)
			->where('product_cars.product_price >=', $price_from)
			->where('product_cars.product_price <=', $price_to)
			->order_by('product_cars.product_price', 'asc')
			->limit($limit, $start)
			->get();
		return $sql_get_categories_city->result();
	}
	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                   lấy sản phẩm theo danh mục doanh nghiệp                  */

	public function getTitleCategoriesBusiness($id)
	{
		$this->db->select('account.*');
		$this->db->from('account');
		$this->db->limit(1);
		$this->db->where('account.id', $id);
		$sql = $this->db->get();
		$result = $sql->row();
		return $title = $result->name_business;
	}

	// public function getSlugCategoriesBusiness($id)
	// {
	// 	$this->db->select('account.*');
	// 	$this->db->from('account');
	// 	$this->db->limit(1);
	// 	$this->db->where('account.id', $id);
	// 	$sql = $this->db->get();
	// 	$result = $sql->row();
	// 	return $name_business = $result->name_business;
	// }

	public function countAllProductByBusiness($id)
	{
		$this->db->where('account_id', $id);
		$this->db->from('product_cars');
		return $this->db->count_all_results();
	}



	public function getBusinessPagination($id, $limit, $start)
	{
		$status_array = array(1, 2);

		$sql_get_categories_business =  $this->db->select('vehicles.name as tendongxe, product_cars.*, account.*, citys.name as tenkhuvuc')
			->from('vehicles')
			->join('product_cars', 'product_cars.vehicles_id = vehicles.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where('account.status_premium', 2)
			->where('product_cars.account_id', $id)
			->where_in('product_cars.product_status', $status_array)
			->limit($limit, $start)
			->get();
		return $sql_get_categories_business->result();
	}

	// lọc theo ký tự sản phẩm
	public function getBusinessPaginationBykytu($id, $kytu, $limit, $start)
	{
		$status_array = array(1, 2);

		$sql_get_categories_business =  $this->db->select('vehicles.name as tendongxe, product_cars.*, account.*, citys.name as tenkhuvuc')
			->from('vehicles')
			->join('product_cars', 'product_cars.vehicles_id = vehicles.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where('product_cars.account_id', $id)
			->where('account.status_premium', 2)
			->where_in('product_cars.product_status', $status_array)
			->order_by('product_cars.product_name', $kytu)
			->limit($limit, $start)
			->get();
		return $sql_get_categories_business->result();
	}

	// ký tự lọc theo giá sản phẩm
	public function getBusinessPaginationBygia($id, $gia, $limit, $start)
	{
		$status_array = array(1, 2);

		$sql_get_categories_business =  $this->db->select('vehicles.name as tendongxe, product_cars.*, account.*, citys.name as tenkhuvuc')
			->from('vehicles')
			->join('product_cars', 'product_cars.vehicles_id = vehicles.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where('product_cars.account_id', $id)
			->where('account.status_premium', 2)
			->where_in('product_cars.product_status', $status_array)
			->order_by('product_cars.product_price', $gia)
			->limit($limit, $start)
			->get();
		return $sql_get_categories_business->result();
	}

	// Lọc theo khoảng giá
	public function getMinProductByBusiness($id)
	{
		$this->db->select('product_cars.*');
		$this->db->from('product_cars');
		$this->db->select_min('product_price');
		$this->db->limit(1);
		$this->db->where('account_id', $id);
		$sql = $this->db->get();
		$result = $sql->row();
		return $price = $result->product_price;
	}

	public function getMaxProductByBusiness($id)
	{
		$this->db->select('product_cars.*');
		$this->db->from('product_cars');
		$this->db->select_max('product_price');
		$this->db->limit(1);
		$this->db->where('account_id', $id);
		$sql = $this->db->get();
		$result = $sql->row();
		return $price = $result->product_price;
	}


	public function getBusinessPaginationByRange($id, $price_from, $price_to, $limit, $start)
	{
		$status_array = array(1, 2);

		$sql_get_categories_business =  $this->db->select('vehicles.name as tendongxe, product_cars.*, account.*, citys.name as tenkhuvuc')
			->from('vehicles')
			->join('product_cars', 'product_cars.vehicles_id = vehicles.id')
			->join('account', 'account.id = product_cars.account_id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->where('product_cars.account_id', $id)
			->where('account.status_premium', 2)
			->where_in('product_cars.product_status', $status_array)
			->where('product_cars.product_price >=', $price_from)
			->where('product_cars.product_price <=', $price_to)
			->order_by('product_cars.product_price', 'asc')
			->limit($limit, $start)
			->get();
		return $sql_get_categories_business->result();
	}
	/* -------------------------------------------------------------------------- */


	/* -------------------------------------------------------------------------- */
	/*                              chi tiết sản phẩm                             */
	public function detailProduct($id)
	{
		$sql_detail_product = $this->db->select('categories_company.name as tenhangxe, citys.name as tenkhuvuc, vehicles.name as tendongxe, account.*,product_cars.*')
			->from('categories_company')
			->join('product_cars', 'product_cars.categories_company_id = categories_company.id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('vehicles', 'vehicles.id = product_cars.vehicles_id')
			->join('account', 'account.id = product_cars.account_id')
			->where('product_cars.product_id', $id)
			->get();
		return $sql_detail_product->result();
	}

	//lấy thư viện ảnh theo detail
	public function detailLibraryIMG($id)
	{
		$sql_get_library_img = $this->db->get_where('library_img', ['product_id' => $id]);
		return $sql_get_library_img->result();
	}

	// Phần bình luận
	public function InsertComment($data)
	{
		return $this->db->insert('comment', $data);
	}

	public function detailComment($id)
	{
		$this->db->order_by('date', 'desc');
		$this->db->where('product_car_id', $id);
		$sql = $this->db->get_where('comment', ['status' => 1]);
		return $sql->result();
	}

	// Phần gửi liên hệ thông tin của sản phẩm đó
	public function InsertContactToProduct($data)
	{
		return $this->db->insert('contacts', $data);
	}
	/* -------------------------------------------------------------------------- */



	/* -------------------------------------------------------------------------- */
	/*                       sản phẩm liên quan từ business                       */
	//liên quan theo hãng
	public function productRelateCompany($id, $company_id)
	{
		$sql_relate_company = $this->db->select('categories_company.name as tenhangxe, citys.name as tenkhuvuc, vehicles.name as tendongxe, account.* ,product_cars.*')
			->from('categories_company')
			->join('product_cars', 'product_cars.categories_company_id = categories_company.id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('vehicles', 'vehicles.id = product_cars.vehicles_id')
			->join('account', 'account.id = product_cars.account_id')
			->where('product_cars.categories_company_id', $company_id)
			->where_not_in('product_cars.product_id', $id)
			->get();
		return $sql_relate_company->result();
	}

	//liên quan theo tên
	public function productRelateBusiness($id, $business_name)
	{
		$sql_relate_business = $this->db->select('categories_company.name as tenhangxe, citys.name as tenkhuvuc, vehicles.name as tendongxe, account.* ,product_cars.*')
			->from('categories_company')
			->join('product_cars', 'product_cars.categories_company_id = categories_company.id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('vehicles', 'vehicles.id = product_cars.vehicles_id')
			->join('account', 'account.id = product_cars.account_id')
			->where('account.status_premium', 2)
			->where('account.name_business', $business_name)
			->where_not_in('product_cars.product_id', $id)
			->get();
		return $sql_relate_business->result();
	}

	/* -------------------------------------------------------------------------- */



	/* -------------------------------------------------------------------------- */
	/*                           Danh sách tất cả xe cũ                           */
	public function countproductAll()
	{
		return $this->db->count_all('product_cars');
	}

	public function getProductAllPagination($limit, $start)
	{
		$status_array = array(1, 2);
		$this->db->limit($limit, $start);
		$sql_main_product = $this->db->select('account.fullname as tennguoidung, account.thumbnail as hinhnguoidung, account.phone as phone ,product_cars.*, citys.name as tenkhuvuc, categories_company.name as tenhangxe, vehicles.name as tendongxe')
			->from('account')
			->join('product_cars', 'product_cars.account_id = account.id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('categories_company', 'product_cars.categories_company_id = categories_company.id')
			->join('vehicles', 'product_cars.vehicles_id = vehicles.id')
			->where_in('product_cars.product_status', $status_array)
			->order_by('product_cars.product_id', 'random')
			->get();
		return $sql_main_product->result();
	}
	// lọc theo ký tự sản phẩm
	public function getProductAllPaginationBykytu($kytu, $limit, $start)
	{
		$status_array = array(1, 2);
		$this->db->limit($limit, $start);
		$sql_main_product = $this->db->select('account.fullname as tennguoidung, account.thumbnail as hinhnguoidung, account.phone as phone ,product_cars.*, citys.name as tenkhuvuc, categories_company.name as tenhangxe, vehicles.name as tendongxe')
			->from('account')
			->join('product_cars', 'product_cars.account_id = account.id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('categories_company', 'product_cars.categories_company_id = categories_company.id')
			->join('vehicles', 'product_cars.vehicles_id = vehicles.id')
			->where_in('product_cars.product_status', $status_array)
			->order_by('product_cars.product_name', $kytu)
			->get();
		return $sql_main_product->result();
	}

	// Lọc theo giá sản phẩm
	public function getProductAllPaginationBygia($gia, $limit, $start)
	{
		$status_array = array(1, 2);
		$this->db->limit($limit, $start);
		$sql_main_product = $this->db->select('account.fullname as tennguoidung, account.thumbnail as hinhnguoidung, account.phone as phone ,product_cars.*, citys.name as tenkhuvuc, categories_company.name as tenhangxe, vehicles.name as tendongxe')
			->from('account')
			->join('product_cars', 'product_cars.account_id = account.id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('categories_company', 'product_cars.categories_company_id = categories_company.id')
			->join('vehicles', 'product_cars.vehicles_id = vehicles.id')
			->where_in('product_cars.product_status', $status_array)
			->order_by('product_cars.product_price', $gia)
			->get();
		return $sql_main_product->result();
	}

	// Lọc theo khoảng giá 
	public function getMinProductAll()
	{
		$this->db->select('product_cars.*');
		$this->db->from('product_cars');
		$this->db->select_min('product_price');
		$this->db->limit(1);
		$sql = $this->db->get();
		$result = $sql->row();
		return $price = $result->product_price;
	}

	public function getMaxProductAll()
	{
		$this->db->select('product_cars.*');
		$this->db->from('product_cars');
		$this->db->select_max('product_price');
		$this->db->limit(1);
		$sql = $this->db->get();
		$result = $sql->row();
		return $price = $result->product_price;
	}

	public function getProductAllPaginationByRange($price_from, $price_to, $limit, $start)
	{
		$status_array = array(1, 2);
		$this->db->limit($limit, $start);
		$sql_main_product = $this->db->select('account.fullname as tennguoidung, account.thumbnail as hinhnguoidung, account.phone as phone ,product_cars.*, citys.name as tenkhuvuc, categories_company.name as tenhangxe, vehicles.name as tendongxe')
			->from('account')
			->join('product_cars', 'product_cars.account_id = account.id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('categories_company', 'product_cars.categories_company_id = categories_company.id')
			->join('vehicles', 'product_cars.vehicles_id = vehicles.id')
			->where_in('product_cars.product_status', $status_array)
			->where('product_cars.product_price >=', $price_from)
			->where('product_cars.product_price <=', $price_to)
			->order_by('product_cars.product_price', 'asc')
			->get();
		return $sql_main_product->result();
	}

	/* -------------------------------------------------------------------------- */


	/* -------------------------------------------------------------------------- */
	/*                               Đăng tin bán xe                              */
	public function Postsellcar($data_post)
	{
		$this->db->insert('product_cars', $data_post);
		return $this->db->insert_id();
	}

	// Tìm kiếm tin mua xe
	public function searchNewSale($keyword)
	{
		$status = [2, 3];
		$sql = $this->db->select('categories_company.name as company, vehicles.name as vehicle, account.fullname as tenTK, account.phone as phoneTK, account.email as emailTK, new_car_sales.*')
			->from('categories_company')
			->join('new_car_sales', 'new_car_sales.categories_company_id = categories_company.id')
			->join('vehicles', 'vehicles.id = new_car_sales.categories_vehicles_id')
			->join('account', 'account.id = new_car_sales.account_id')
			->where_in('new_car_sales.status', $status)
			->like('new_car_sales.name', $keyword)
			->get();
		return $sql->result();
	}

	/* -------------------------------------------------------------------------- */


	/* -------------------------------------------------------------------------- */
	/*                                 Gói dịch vụ                                */
	public function getPackage()
	{
		$sql_get_package = $this->db->get_where('packages', ['status' => 1]);
		return $sql_get_package->result();
	}

	public function getPackageID($id)
	{
		$sql_package_id = $this->db->get_where('packages', ['id' => $id]);
		return $sql_package_id->result();
	}

	public function RegisterPackage($data_package_register)
	{
		return $this->db->insert("register_packages", $data_package_register);
	}
	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                               ĐĂNG TIN MUA XE                              */
	public function InsertPostBuyCar($data_post)
	{
		return $this->db->insert('new_car_sales', $data_post);
	}


	public function countNewSaleCar()
	{
		return $this->db->count_all('new_car_sales');
	}

	public function getNewSaleCarPagination($limit, $start)
	{
		$arrayStatus = array(1, 3);
		$sql_select_sale_car = $this->db->select('account.fullname as tenTK, account.email as emailTK, account.phone as phoneTK, new_car_sales.*')
			->from('account')
			->join('new_car_sales', 'new_car_sales.account_id = account.id')
			->where_in('new_car_sales.status', $arrayStatus)
			->order_by('new_car_sales.id', 'desc')
			->limit($limit, $start)
			->get();
		return $sql_select_sale_car->result();
	}

	// lấy các ban tin đăng mua xe
	public function selectNewSaleCarHot()
	{
		$sql_select_sale_car = $this->db->select('account.fullname as tenTK, account.email as emailTK, account.phone as phoneTK, new_car_sales.*')
			->from('account')
			->join('new_car_sales', 'new_car_sales.account_id = account.id')
			->where_in('new_car_sales.status', 3)
			->order_by('new_car_sales.id', 'rand')
			->get();
		return $sql_select_sale_car->result();
	}
	/* -------------------------------------------------------------------------- */
	/* -------------------------------------------------------------------------- */
	/*                                   Tin tức                                  */
	public function countNewList()
	{
		return $this->db->count_all('news');
	}

	public function getNewListPagination($limit, $start)
	{
		$sql_new = $this->db->select('categories_news.name as tenDM, news.*, account.fullname as tenTK')
			->from('categories_news')
			->join('news', 'news.categories_news_id = categories_news.id')
			->join('account', 'account.id = news.account_id')
			->where('news.status', 1)
			->order_by('news.id', 'desc')
			->limit($limit, $start)
			->get();
		return $sql_new->result();
	}
	/* --------------------------- Template sidebarNew -------------------------- */
	// ==>
	public function getNewLimit()
	{
		$sql_new = $this->db->select('categories_news.name as tenDM, news.*, account.fullname as tenTK')
			->from('categories_news')
			->join('news', 'news.categories_news_id = categories_news.id')
			->join('account', 'account.id = news.account_id')
			->where('news.status', 1)
			->order_by('news.id', 'desc')
			->get();
		return $sql_new->result();
	}




	// ==> chi tiết tin tức
	public function getDetailID($id)
	{
		$sql_new = $this->db->select('categories_news.name as tenDM, news.*, account.fullname as tenTK')
			->from('categories_news')
			->join('news', 'news.categories_news_id = categories_news.id')
			->join('account', 'account.id = news.account_id')
			->where('news.id', $id)
			->get();
		return $sql_new->row();
	}

	// bài viết tin tức liên quan
	public function RelateNew($id)
	{
		$sql = $this->db->select('categories_news.name as tenDM, news.*, account.fullname as tenTK')
			->from('categories_news')
			->join('news', 'news.categories_news_id = categories_news.id')
			->join('account', 'account.id = news.account_id')
			->where_not_in('news.id', $id)
			->get();
		return $sql->result();
	}


	/* -------------------------------------------------------------------------- */



	/* -------------------------------------------------------------------------- */
	/*                                   Liên hệ                                  */
	public function InsertContact($data_info_contact)
	{
		return $this->db->insert('contacts', $data_info_contact);
	}
	/* -------------------------------------------------------------------------- */



	/* -------------------------------------------------------------------------- */
	/*                                Phần tìm kiếm                               */

	public function countSearch($keyword)
	{
		$this->db->like('product_cars.product_name', $keyword);
		$this->db->from('product_cars');
		return $this->db->count_all_results();
	}

	public function getSearchPagination($keyword, $limit, $start)
	{
		$status_array = array(1, 3);
		$this->db->limit($limit, $start);
		$sql_main_product_search = $this->db->select('account.fullname as tennguoidung, account.thumbnail as hinhnguoidung, account.phone as phone ,product_cars.*, citys.name as tenkhuvuc, categories_company.name as tenhangxe, vehicles.name as tendongxe')
			->from('account')
			->join('product_cars', 'product_cars.account_id = account.id')
			->join('citys', 'citys.id = product_cars.city_area_id')
			->join('categories_company', 'product_cars.categories_company_id = categories_company.id')
			->join('vehicles', 'product_cars.vehicles_id = vehicles.id')
			->where_in('product_cars.product_status', $status_array)
			->like('product_cars.product_name', $keyword)
			->get();
		return $sql_main_product_search->result();
	}

	/* -------------------------------------------------------------------------- */
}
