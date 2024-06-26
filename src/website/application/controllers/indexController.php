<?php
defined('BASEPATH') or exit('No direct script access allowed');

class indexController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('user_agent');
		$this->load->model('admin/companyModel');
		$this->load->model('admin/vehiclesModel');
		$this->load->model('admin/cityModel');
		$this->load->model('business/libraryIMGModel');
		$this->load->model('user/indexModel');
	}

	public function checklogin()
	{
		if (!$this->session->userdata('account')) {
			$this->session->set_flashdata('success', 'Vui lòng đăng nhập tài khoản!');
			redirect(base_url('dang-nhap'));
		}
	}


	public function index()
	{
		$this->data['list_companies'] = $this->companyModel->select();
		$this->data['list_vehicles'] = $this->vehiclesModel->select();
		$this->data['list_business'] = $this->indexModel->selectBusiness();
		$this->data['list_cityes'] = $this->cityModel->select();
		$this->data['list_banner'] = $this->indexModel->SelectBanner();
		$this->data['hot_banner'] = $this->indexModel->SelectBannerHot();
		$this->data['main_product'] = $this->indexModel->mainProduct(); //lấy sản phẩm Deal

		// phần sản phẩm
		$config = array();
		$config["base_url"] = base_url() . '/phan-trang-san-pham/';
		$config['total_rows'] = ceil($this->indexModel->countAllProduct()); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 8; //từng trang 3 sản phẩn
		$config["uri_segment"] = 2; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		$this->data['allproduct_pagination'] = $this->indexModel->getIndexPagination($config["per_page"], $this->page);
		// $this->data['product'] = $this->indexModel->product(); //lấy sản phẩm
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		$this->load->view('user/template_user/navbar', $this->data);
		$this->load->view('index', $this->data);
		$this->load->view('user/template_user/footer');
	}

	/* -------------------------------------------------------------------------- */
	/*                                   QUẢN LÝ HỒ SƠ                            */
	public function profile()
	{
		$this->checklogin();
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		//get id account
		$account_id = $this->session->userdata('account')['id'];
		$this->data['getID'] = $this->indexModel->AccountID($account_id);

		// load package
		$this->data['packages'] = $this->indexModel->selectPackageByID($account_id);
		$this->load->view('user/profile/index', $this->data);
		$this->load->view('user/template_user/footer');
	}

	public 	function handleProfile($id)
	{
		$this->form_validation->set_rules('fullname', 'họ và tên', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('email', 'email', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('phone', 'số điện thoại', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('address', 'địa chỉ', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);


		if ($this->form_validation->run() == TRUE) {
			$data_info_account = [];
			if (!empty($_FILES['thumbnail']['name'])) {
				/* --------------------------- modul config image --------------------------- */
				$origin_filename = $_FILES['thumbnail']['name'];
				$new_name = time() . "" . str_replace(' ', '-', $origin_filename);
				$config = [
					'upload_path' => FCPATH . 'uploads/profile',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'file_name' => $new_name,
				];
				$this->load->library('upload', $config);
				/* ------------------------------------ - ----------------------------------- */
				if (!$this->upload->do_upload('thumbnail')) {
					$ThumbnailError = array('error' => $this->upload->display_errors());
					$this->checklogin();
					$this->load->view('user/template_user/header');
					$this->load->view('user/template_user/topbar');
					//get id account
					$account_id = $this->session->userdata('account')['id'];
					$this->data['getID'] = $this->indexModel->AccountID($account_id);

					$this->load->view('user/profile/index', array_merge($this->data, $ThumbnailError));
					$this->load->view('user/template_user/footer');
				} else {
					$new_filename = $this->upload->data('file_name');
					$data_info_account = array(
						'fullname' => $this->security->xss_clean($this->input->post('fullname')),
						'phone' => $this->security->xss_clean($this->input->post('phone')),
						'email' => $this->security->xss_clean($this->input->post('email')),
						'address' => $this->security->xss_clean($this->input->post('address')),
						'thumbnail' => $new_filename,
						'name_business' => $this->input->post('name_business'),
					);
				}
			} else {
				$data_info_account = array(
					'fullname' => $this->security->xss_clean($this->input->post('fullname')),
					'phone' => $this->security->xss_clean($this->input->post('phone')),
					'email' => $this->security->xss_clean($this->input->post('email')),
					'address' => $this->security->xss_clean($this->input->post('address')),
					'name_business' => $this->input->post('name_business'),
				);
			}

			$this->indexModel->updateAccount($id, $data_info_account);
			$this->session->set_flashdata('success', 'Thay đổi thông tin thành công!');
			redirect(base_url('ho-so-cua-toi/' . $id));
		} else {
			$this->profile();
		}
	}


	// bài đăng tin bán xe của theo tài khoản
	public function MyPost()
	{
		$this->checklogin();
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		//get id account
		$account_id = $this->session->userdata('account')['id'];
		$this->data['getID'] = $this->indexModel->AccountID($account_id);

		// danh sách bài đăng
		$this->data['Postes'] = $this->indexModel->selectPostByID($account_id);

		$this->load->view('user/profile/mypost/index', $this->data);
		$this->load->view('user/template_user/footer');
	}

	public function DetailMyPost($id)
	{


		$this->checklogin();
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		//get id account
		$account_id = $this->session->userdata('account')['id'];
		$this->data['getID'] = $this->indexModel->AccountID($account_id);


		// danh sách bài đăng
		$this->data['postID'] = $this->indexModel->getPostByID($id);

		// hàm check kiểm tra ngày hết hạn
		$resultPostID = $this->indexModel->getPostID($id);
		if ($resultPostID) {
			$currentTime = new DateTime();
			$endTime = new DateTime($resultPostID->created_end);

			if (!empty($endTime)) {
				if ($currentTime > $endTime) {
					$data = [
						'product_status' => 3,
					];

					$this->indexModel->updateStatusPost($id, $data);
				}
			}
		}

		$this->data['selectIMGLibrary'] = $this->indexModel->getSelectIMG($id);
		$this->load->view('user/profile/mypost/detail', $this->data);
		$this->load->view('user/template_user/footer');
	}


	public function contactList($id) 
	{
		$this->checklogin();
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');

		//get id account
		$account_id = $this->session->userdata('account')['id'];
		$this->data['getID'] = $this->indexModel->AccountID($account_id);

		$this->data['contacts'] = $this->indexModel->selectContactProductUser($account_id);
		$this->load->view('user/profile/contact/list', $this->data);
		$this->load->view('user/template_user/footer');

	}

	public function detailContactList($id)
	{
		$this->checklogin();
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');

		//get id account
		$account_id = $this->session->userdata('account')['id'];
		$this->data['getID'] = $this->indexModel->AccountID($account_id);

		$this->data['value'] = $this->indexModel->getContactProID($id);
		$this->load->view('user/profile/contact/detail', $this->data);
		$this->load->view('user/template_user/footer');
	}

	public function handleDetailContactList($id)
	{
		$data = [
			'status' => $this->input->post('status'),
		];

		$this->indexModel->updateContactProductUser($id, $data);
		$this->session->set_flashdata('success', 'Thay đổi trạng thái thành công!');
		redirect(base_url('danh-sach-lien-he'));
	}




	// Bài đăng tin mua xe
	public function MyBuyCar()
	{
		$this->checklogin();
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		//get id account
		$account_id = $this->session->userdata('account')['id'];
		$this->data['getID'] = $this->indexModel->AccountID($account_id);

		// danh sách bài đăng
		$this->data['Postes'] = $this->indexModel->selectBuyByID($account_id);
		$this->load->view('user/profile/mybuy/index', $this->data);
		$this->load->view('user/template_user/footer');
	}

	public function DetailBuyByID($id)
	{
		$this->checklogin();
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		//get id account
		$account_id = $this->session->userdata('account')['id'];
		$this->data['getID'] = $this->indexModel->AccountID($account_id);

		// check ngày hết hạn bài đăng
		$result = $this->indexModel->getBuyID($id);
		if ($result) {
			$currentTime = new DateTime();
			$new_end_time = new DateTime($result->end_time);

			if (!empty($new_end_time)) {
				if ($currentTime > $new_end_time) {
					$data = [
						'status' => 2,
					];
					$this->indexModel->updateStatusNew($id, $data);
				}
			}
		}
		// danh sách bài đăng
		$this->data['BuyID'] = $this->indexModel->getDetailBuyByID($id);

		$this->load->view('user/profile/mybuy/detailBuyCar', $this->data);
		$this->load->view('user/template_user/footer');
	}
// tìm kiếm tin mua xe
	public function SearchNewSale()
	{
		if(isset($_GET['keyword'])){
			$keyword = $_GET['keyword'];
		}else{
			$keyword = '';
		}

		$this->data['newSearch'] = $this->indexModel->searchNewSale($keyword);
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		$this->load->view('user/new/searchNewSale', $this->data);
		$this->load->view('user/template_user/footer');
	}
	/* -------------------------------------------------------------------------- */


	/* -------------------------------------------------------------------------- */
	/*                              QUẢN LÝ SẢN PHẨM                              */
	//Danh mục hãng xe
	public function categoryCompany($id)
	{
		$this->data['list_companies'] = $this->companyModel->select(); //hãng xe
		$this->data['list_vehicles'] = $this->vehiclesModel->select(); // dòng xe
		$this->data['list_cityes'] = $this->cityModel->select(); //khu vực
		$this->data['list_banner'] = $this->indexModel->SelectBanner();
		$this->data['list_business'] = $this->indexModel->selectBusiness();
		//
		$this->data['title'] = $this->indexModel->getTitleCategoriesCompany($id);
		// phần sản phẩm
		$this->data['slug'] = $this->indexModel->getSlugCategoriesCompany($id);
		$config = array();
		$config["base_url"] = base_url() . '/danh-muc-hang-xe/' . '/' . $id . '/' . $this->data['slug'];
		$config['total_rows'] = ceil($this->indexModel->countAllProductByCate($id)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 9; //từng trang 3 sản phẩn
		$config["uri_segment"] = 4; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại

		// Phần lọc sản phẩm 

		// lấy giá
		$this->data['min_price'] = $this->indexModel->getMinProductByCompany($id);
		$this->data['max_price'] = $this->indexModel->getMaxProductByCompany($id);

		if (isset($_GET['kytu'])) {
			$kytu = $_GET['kytu'];
			$this->data['allCate_pagination'] = $this->indexModel->getCatePaginationBykytu($id, $kytu, $config["per_page"], $this->page);
		} else if (isset($_GET['gia'])) {
			$gia = $_GET['gia'];
			$this->data['allCate_pagination'] = $this->indexModel->getCatePaginationBygia($id, $gia, $config["per_page"], $this->page);
		} else if (isset($_GET['to']) && $_GET['from']) {
			$price_from = $_GET['from'];
			$price_to = $_GET['to'];
			$this->data['allCate_pagination'] = $this->indexModel->getCatePaginationByrange($id, $price_from, $price_to, $config["per_page"], $this->page);
		} else { //nếu không có chọn lọc thì hiện tất cả sản phẩm
			$this->data['allCate_pagination'] = $this->indexModel->getCatePagination($id, $config["per_page"], $this->page);
		}



		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		$this->load->view('user/categoryCompany', $this->data);
		$this->load->view('user/template_user/footer');
	}

	//Danh mục dòng xe
	public function categoryVehicles($id)
	{
		$this->data['list_companies'] = $this->companyModel->select(); //hãng xe
		$this->data['list_vehicles'] = $this->vehiclesModel->select(); // dòng xe
		$this->data['list_cityes'] = $this->cityModel->select(); //khu vực
		$this->data['list_banner'] = $this->indexModel->SelectBanner();
		$this->data['list_business'] = $this->indexModel->selectBusiness();
		//
		$this->data['Title'] = $this->indexModel->getTitleCategoriesVehicles($id);
		// phần sản phẩm
		$this->data['slug'] = $this->indexModel->getSlugCategoriesVehicles($id);
		$config = array();
		$config["base_url"] = base_url() . '/danh-muc-dong-xe/' . '/' . $id . '/' . $this->data['slug'];
		$config['total_rows'] = ceil($this->indexModel->countAllProductByVehicles($id)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 9; //từng trang 3 sản phẩn
		$config["uri_segment"] = 4; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại

		$this->data['min_price'] = $this->indexModel->getMinProductByVehicles($id);
		$this->data['max_price'] = $this->indexModel->getMaxProductByVehicles($id);

		if (isset($_GET['kytu'])) {
			$kytu = $_GET['kytu'];
			$this->data['allVehicles_pagination'] = $this->indexModel->getVehiclesPaginationBykytu($id, $kytu, $config["per_page"], $this->page);
		} else if (isset($_GET['gia'])) {
			$gia = $_GET['gia'];
			$this->data['allVehicles_pagination'] = $this->indexModel->getVehiclesPaginationBygia($id, $gia, $config["per_page"], $this->page);
		} else if (isset($_GET['to']) && $_GET['from']) {
			$price_from = $_GET['from'];
			$price_to = $_GET['to'];
			$this->data['allVehicles_pagination'] = $this->indexModel->getVehiclesPaginationByRange($id, $price_from, $price_to, $config["per_page"], $this->page);
		} else {
			$this->data['allVehicles_pagination'] = $this->indexModel->getVehiclesPagination($id, $config["per_page"], $this->page);
		}




		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		$this->load->view('user/categoryVehicles', $this->data);
		$this->load->view('user/template_user/footer');
	}

	//Danh mục dòng xe
	public function categoryCity($id)
	{
		$this->data['list_companies'] = $this->companyModel->select(); //hãng xe
		$this->data['list_vehicles'] = $this->vehiclesModel->select(); // dòng xe
		$this->data['list_cityes'] = $this->cityModel->select(); //khu vực
		$this->data['list_banner'] = $this->indexModel->SelectBanner();
		$this->data['list_business'] = $this->indexModel->selectBusiness();
		//
		$this->data['Title'] = $this->indexModel->getTitleCategoriesCity($id);
		// phần sản phẩm
		$this->data['slug'] = $this->indexModel->getSlugCategoriesCity($id);
		$config = array();
		$config["base_url"] = base_url() . '/danh-muc-thanh-pho/' . '/' . $id . '/' . $this->data['slug'];
		$config['total_rows'] = ceil($this->indexModel->countAllProductByCity($id)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 9; //từng trang 3 sản phẩn
		$config["uri_segment"] = 4; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại

		// Take Min and Max of product
		$this->data['min_price'] = $this->indexModel->getMinProductByCity($id);
		$this->data['max_price'] = $this->indexModel->getMaxProductByCity($id);


		if (isset($_GET['kytu'])) {
			$kytu = $_GET['kytu'];
			$this->data['allCity_pagination'] = $this->indexModel->getCityPaginationBykytu($id, $kytu, $config["per_page"], $this->page);
		} else if (isset($_GET['gia'])) {
			$gia = $_GET['gia'];
			$this->data['allCity_pagination'] = $this->indexModel->getCityPaginationBygia($id, $gia, $config["per_page"], $this->page);
		} else if (isset($_GET['to']) && $_GET['from']) {
			$price_from = $_GET['from'];
			$price_to = $_GET['to'];
			$this->data['allCity_pagination'] = $this->indexModel->getCityPaginationByRange($id, $price_from, $price_to, $config["per_page"], $this->page);
		} else {
			$this->data['allCity_pagination'] = $this->indexModel->getCityPagination($id, $config["per_page"], $this->page);
		}


		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		$this->load->view('user/categoryCity', $this->data);
		$this->load->view('user/template_user/footer');
	}

	//Danh mục sản phẩm doanh nghiệp
	public function category_product_business($id)
	{
		$this->data['list_companies'] = $this->companyModel->select(); //hãng xe
		$this->data['list_vehicles'] = $this->vehiclesModel->select(); // dòng xe
		$this->data['list_cityes'] = $this->cityModel->select(); //khu vực
		$this->data['list_banner'] = $this->indexModel->SelectBanner();
		//
		$this->data['Title'] = $this->indexModel->getTitleCategoriesBusiness($id);
		// phần sản phẩm
		$this->data['slug'] = $this->indexModel->getSlugCategoriesBusiness($id);
		$config = array();
		$config["base_url"] = base_url() . 'danh-muc-san-pham-doanh-nghiep/' . '/' . $id . '/' . $this->data['slug'];
		$config['total_rows'] = ceil($this->indexModel->countAllProductByCity($id)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 9; //từng trang 3 sản phẩn
		$config["uri_segment"] = 4; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại


		$this->data['min_price'] = $this->indexModel->getMinProductByBusiness($id);
		$this->data['max_price'] = $this->indexModel->getMaxProductByBusiness($id);



		if (isset($_GET['kytu'])) {
			$kytu = $_GET['kytu'];
			$this->data['allBusiness_pagination'] = $this->indexModel->getBusinessPaginationBykytu($id, $kytu, $config["per_page"], $this->page);
		} else if (isset($_GET['gia'])) {
			$gia = $_GET['gia'];
			$this->data['allBusiness_pagination'] = $this->indexModel->getBusinessPaginationBygia($id, $gia, $config["per_page"], $this->page);
		} else if (isset($_GET['to']) && $_GET['from']) {
			$price_from = $_GET['from'];
			$price_to = $_GET['to'];
			$this->data['allBusiness_pagination'] = $this->indexModel->getBusinessPaginationByRange($id, $price_from, $price_to, $config["per_page"], $this->page);
		} else {
			$this->data['allBusiness_pagination'] = $this->indexModel->getBusinessPagination($id, $config["per_page"], $this->page);
		}


		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		$this->load->view('user/categoryBusiness', $this->data);
		$this->load->view('user/template_user/footer');
	}


	//CHI TIẾT SẢN PHẨM
	public function detailProduct($id)
	{
		$this->data['list_companies'] = $this->companyModel->select(); //hãng xe
		$this->data['list_vehicles'] = $this->vehiclesModel->select(); // dòng xe
		$this->data['list_cityes'] = $this->cityModel->select(); //khu vực
		$this->data['list_banner'] = $this->indexModel->SelectBanner();

		$this->data['list_business'] = $this->indexModel->selectBusiness();
		//
		$this->data['detail_product'] = $this->indexModel->detailProduct($id); //lấy chi tiết sản phẩm
		$this->data['library_img'] = $this->indexModel->detailLibraryIMG($id); // Lấy thư viện ảnh
		// hiển thị đánh giá
		$this->data['comment'] = $this->indexModel->detailComment($id);
		//sản phẩm liên quan từ business
		foreach ($this->data['detail_product'] as $key => $value) {
			$company_id = $value->categories_company_id;
			$business_name = $value->name_business;
		}
		$this->data['product_relate_company'] = $this->indexModel->productRelateCompany($id, $company_id); //lấy theo hãng
		$this->data['product_relate_business'] = $this->indexModel->productRelateBusiness($id, $business_name);


		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		$this->load->view('user/template_user/navbar', $this->data);
		$this->load->view('user/detail/detailProduct', $this->data);
		$this->load->view('user/template_user/footer');
	}


	public function SendComment()
	{
		$data = array(
			'fullname' => $this->input->post('name_comment'),
			'email' => $this->input->post('email_comment'),
			'message' => $this->input->post('message_comment'),
			'status' => 1,
			'star' => $this->input->post('rate_value'),
			'account_id' => $this->session->userdata('account')['id'],
			'product_car_id' => $this->input->post('product_id'),
		);

		$result = $this->indexModel->InsertComment($data);
		if ($result) {
			echo 'success';
		} else {
			echo 'failed';
		}
	}

	public function SendContactToProduct()
	{
		$data = array(
			'fullname' => $this->input->post('fullname'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'content' => $this->input->post('content'),
			'account_id' => $this->input->post('account_id'),
			'product_id' => $this->input->post('product_id'),
		);

		$result = $this->indexModel->InsertContactToProduct($data);
		if ($result) {
			$this->session->set_flashdata('success', 'Gửi thông tin liên hệ thành công, chúng tôi sẽ phản hồi cho bạn sớm nhất!');
		} else {
			$this->session->set_flashdata('error', 'Có lỗi xảy ra, Vui lòng thử lại sau!');
		}
		// Get the referring URL and redirect to it
		$referrer = $this->agent->referrer();
		if ($referrer) {
			redirect($referrer);
		} else {
			redirect(base_url('/'));
		}
	}
	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                         Danh sách tất cả xe hơi cũ                         */
	public function productAll()
	{
		$this->data['list_companies'] = $this->companyModel->select(); //hãng xe
		$this->data['list_vehicles'] = $this->vehiclesModel->select(); // dòng xe
		$this->data['list_cityes'] = $this->cityModel->select(); //khu vực
		$this->data['list_banner'] = $this->indexModel->SelectBanner();

		$config = array();
		$config["base_url"] = base_url() . '/phan-trang-danh-sach-tat-ca-xe-cu';
		$config['total_rows'] = ceil($this->indexModel->countProductAll()); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 9; //từng trang 3 sản phẩn
		$config["uri_segment"] = 2; //Lấy route trên có mấy phần
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		//pagination

		$this->data['min_price'] = $this->indexModel->getMinProductAll();
		$this->data['max_price'] = $this->indexModel->getMaxProductAll();

		if (isset($_GET['kytu'])) {
			$kytu = $_GET['kytu'];
			$this->data['productAll_pagination'] = $this->indexModel->getProductAllPaginationBykytu($kytu, $config["per_page"], $this->page);
		} else if (isset($_GET['gia'])) {
			$gia = $_GET['gia'];
			$this->data['productAll_pagination'] = $this->indexModel->getProductAllPaginationBygia($gia, $config["per_page"], $this->page);
		} else if (isset($_GET['to']) && $_GET['from']) {
			$price_from = $_GET['from'];
			$price_to = $_GET['to'];
			$this->data['productAll_pagination'] = $this->indexModel->getProductAllPaginationByRange($price_from, $price_to, $config["per_page"], $this->page);
		} else {
			$this->data['productAll_pagination'] = $this->indexModel->getProductAllPagination($config["per_page"], $this->page);
		}





		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		$this->load->view('user/template_user/navbar', $this->data);
		$this->load->view('user/productAll', $this->data);
		$this->load->view('user/template_user/footer');
	}
	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                                 Gói dịch vụ                                */
	public function pricingCart()
	{
		$this->data['packages'] = $this->indexModel->getPackage();
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		$this->load->view('user/pricingCard/pricing_cart', $this->data);
		$this->load->view('user/template_user/footer');
	}


	public function checkoutPackage($id)
	{
		$this->checklogin();
		if ($this->session->userdata('account')) {

			$this->data['package_id'] = $this->indexModel->getPackageID($id);
			$this->load->view('user/template_user/header');
			$this->load->view('user/template_user/topbar');
			$this->load->view('user/pricingCard/checkout', $this->data);
			$this->load->view('user/template_user/footer');
		}
	}


	public function handlePackage()
	{
		$data_package_register = array(
			'account_id' => $this->security->xss_clean($this->input->post('user_id')),
			'package_id' => $this->security->xss_clean($this->input->post('package_id')),
			'status' => 1,
		);
		$this->indexModel->RegisterPackage($data_package_register);
		$this->session->set_flashdata('success', 'Gửi thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất');
		redirect(base_url('goi-dich-vu'));
	}
	/* -------------------------------------------------------------------------- */


	/* -------------------------------------------------------------------------- */
	/*                                 TIN MUA XE                                 */
	public function NewBuyCar()
	{
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');



		$config = array();
		$config["base_url"] = base_url() . '/phan-trang-tin-mua-xe';
		$config['total_rows'] = ceil($this->indexModel->countNewSaleCar()); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 5; //từng trang 3 sản phẩn
		$config["uri_segment"] = 2; //Lấy route trên có mấy phần
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		$this->data['NewSaleCar_pagination'] = $this->indexModel->getNewSaleCarPagination($config["per_page"], $this->page);
		//pagination

		// $this->data['newSaleCar'] = $this->indexModel->selectNewSaleCar();
		$this->load->view('user/new/newSell', $this->data);
		$this->load->view('user/template_user/footer');
	}


	/* -------------------------------------------------------------------------- */
	/*                          section of form sell car                          */
	public function FormSellCar()
	{
		$this->checklogin();
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');

		$this->data['companies'] = $this->companyModel->select();
		$this->data['vehicles'] = $this->vehiclesModel->select();
		$this->data['citys'] = $this->cityModel->select();
		$this->load->view('user/new/formSellCar', $this->data);
		$this->load->view('user/template_user/footer');
	}

	public function PostSellCar()
	{
		$this->checklogin();
		$this->form_validation->set_rules('product_name', 'Tên', 'trim|required', ['required' => 'Vui lòng nhập %s sản phẩm']);
		$this->form_validation->set_rules('product_slug', 'đường dẫn SEO', 'trim|required', ['required' => 'Vui lòng nhập %s sản phẩm']);
		$this->form_validation->set_rules('product_price', 'giá', 'trim|required', ['required' => 'Vui lòng nhập %s sản phẩm']);
		$this->form_validation->set_rules('product_content', 'nội dung', 'trim|required', ['required' => 'Vui lòng nhập %s sản phẩm']);
		if ($this->form_validation->run()) {
			$code = rand(00000, 999999);

			$origin_filename = $_FILES['product_thumbnail']['name'];
			$new_name = time() . "" . str_replace(' ', '-', $origin_filename);
			$config = [
				'upload_path' => FCPATH . 'uploads/product',
				'allowed_types' => 'gif|jpg|png|jpeg|bmp|tiff|webp|svg',
				'file_name' => $new_name,
			];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('product_thumbnail')) {
				$this->checklogin();
				$ImageError = array('error' => $this->upload->display_errors());
				$this->load->view('user/template_user/header');
				$this->load->view('user/template_user/topbar');

				$this->data['companies'] = $this->companyModel->select();
				$this->data['vehicles'] = $this->vehiclesModel->select();
				$this->data['citys'] = $this->cityModel->select();
				$this->load->view('user/new/formSellCar', array_merge($this->data, $ImageError));
				$this->load->view('user/template_user/footer');
			} else {
				$new_filename = $this->upload->data('file_name');
				$account_id = $this->session->userdata('account')['id'];
				$data_post = array(
					'product_name' => $this->security->xss_clean($this->input->post('product_name')),
					'product_slug' => $this->input->post('product_slug'),
					'product_price' => $this->input->post('product_price'),
					'product_thumbnail' => $new_filename,
					'product_content' => $this->security->xss_clean($this->input->post('product_content')),
					'manufacture_year' => $this->security->xss_clean($this->input->post('manufacture_year')),
					'type_gearbox' => $this->security->xss_clean($this->input->post('type_gearbox')),
					'code' => $code,
					'product_status' => 0,
					'categories_company_id' => $this->input->post('categories_company_id'),
					'city_area_id' => $this->input->post('city_area_id'),
					'account_id' => $account_id,
					'vehicles_id' => $this->input->post('vehicles_id'),
				);

				$product_id = $this->indexModel->Postsellcar($data_post);

				if (!empty($_FILES['images']['name'][0])) {

					foreach ($_FILES['images']['name'] as $key => $image) {
						$temp_file = $_FILES['images']['tmp_name'][$key];
						$new_filename_multi = time() . "_" . str_replace(' ', '-', $image);
						$destination = FCPATH . 'uploads/product/' . $new_filename_multi;
						move_uploaded_file($temp_file, $destination);

						// Lưu thông tin hình ảnh vào bảng library_img
						$data_image_multi = array(
							'img_car' => $new_filename_multi,
							'product_id' => $product_id,
						);
						$this->libraryIMGModel->insertMultiIMG($data_image_multi);
					}
				}

				$this->session->set_flashdata('success', 'Đã gửi thành công! Chúng tôi sẽ duyệt tin sớm cho bạn');
				redirect(base_url('dang-tin-ban-xe'));
			}
		} else {
			$this->FormSellCar();
		}
	}

	/* -------------------------------------------------------------------------- */


	public function PostBuyCar()
	{
		$this->checklogin();

		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');

		$this->data['companies'] = $this->companyModel->select();
		$this->data['vehicles'] = $this->vehiclesModel->select();
		$this->load->view('user/new/postBuyCar', $this->data);
		$this->load->view('user/template_user/footer');
	}

	public function HandlePostBuyCar()
	{
		$this->checklogin();
		$this->form_validation->set_rules('name', 'tên sản phẩm', 'trim|required', ['required' => 'Vui lòng nhập thông tin %s']);
		$this->form_validation->set_rules('content', 'nội dung', 'trim|required', ['required' => 'Vui lòng nhập thông tin %s']);

		if ($this->form_validation->run()) {
			$code_sales = rand(00000, 999999); //random mã orderCode
			$origin_filename = $_FILES['thumbnail']['name'];
			$new_name = time() . "" . str_replace(' ', '-', $origin_filename);
			$config = [
				'upload_path' => FCPATH . 'uploads/new',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'file_name' => $new_name,
			];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('thumbnail')) {
				$this->checklogin();
				$ImageError = array('error' => $this->upload->display_errors());
				$this->load->view('user/template_user/header');
				$this->load->view('user/template_user/topbar');

				$this->data['companies'] = $this->companyModel->select();
				$this->data['vehicles'] = $this->vehiclesModel->select();
				$this->load->view('user/new/postBuyCar', array_merge($this->data, $ImageError));
				$this->load->view('user/template_user/footer');
			} else {
				$new_filename = $this->upload->data('file_name');
				$data_post = array(
					'name' => $this->security->xss_clean($this->input->post('name')),
					'description' => $this->security->xss_clean($this->input->post('content')),
					'thumbnail' => $new_filename,
					'code_sales' => $code_sales,
					'categories_company_id' => $this->input->post('categories_company_id'),
					'categories_vehicles_id' => $this->input->post('categories_vehicles_id'),
					'categories_new_id' => 1,
					'status' => 0,
					'account_id' => $this->session->userdata('account')['id'],
				);

				$this->indexModel->InsertPostBuyCar($data_post);
				$this->session->set_flashdata('success', 'Gửi thông tin, chúng tôi duyệt bài cho bạn sớm nhất');
				redirect(base_url('dang-tin-mua-xe'));
			}
		} else {
			$this->session->set_flashdata('error', 'Vui lòng nhập đầy đủ thông tin');
			$this->PostBuyCar();
		}
	}
	/* -------------------------------------------------------------------------- */
	/* -------------------------------------------------------------------------- */
	/*                                   TIN TỨC                                  */
	public function NewList()
	{
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');

		$config = array();
		$config["base_url"] = base_url() . '/phan-trang-tin-tuc';
		$config['total_rows'] = ceil($this->indexModel->countNewList()); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 5; //từng trang 3 sản phẩn
		$config["uri_segment"] = 2; //Lấy route trên có mấy phần
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		$this->data['NewList_pagination'] = $this->indexModel->getNewListPagination($config["per_page"], $this->page);
		//pagination

		$this->load->view('user/new/newList', $this->data);
		$this->load->view('user/template_user/footer');
	}


	public function detailNew($id)
	{
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');

		$this->data['DetailNewID'] = $this->indexModel->getDetailID($id);
		$this->data['RelateNew'] = $this->indexModel->RelateNew($id);
		$this->load->view('user/new/detailNew', $this->data);
		$this->load->view('user/template_user/footer');
	}
	/* -------------------------------------------------------------------------- */


	/* -------------------------------------------------------------------------- */
	/*                                   Liên hệ                                  */
	public function Contact()
	{
		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		$this->load->view('user/contact/contact');
		$this->load->view('user/template_user/footer');
	}

	public function HandleContact()
	{
		$this->form_validation->set_rules('fullname', 'họ và tên', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('phone', 'số điện thoại', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('email', 'email', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('message', 'nội dung', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);

		if ($this->form_validation->run()) {
			$data_info_contact = array(
				'fullname' => $this->security->xss_clean($this->input->post('fullname')),
				'phone' => $this->security->xss_clean($this->input->post('phone')),
				'email' => $this->input->post('email'),
				'content' => $this->security->xss_clean($this->input->post('message')),
				'account_id' => 1,
				'status' => 0,
			);
			$this->indexModel->InsertContact($data_info_contact);
			$this->session->set_flashdata('success', 'Gửi thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất');
			redirect(base_url('lien-he'));
		} else {
			$this->Contact();
		}
	}
	/* -------------------------------------------------------------------------- */

	// phần chat liên hệ mua sản phẩm
	// public function chatForm($id)
	// {
	// 	$this->checklogin();
	// 	$this->load->view('user/template_user/header');
	// 	$this->load->view('user/template_user/topbar');
	// 	$this->load->view('user/chat/chatForm');
	// 	$this->load->view('user/template_user/footer');
	// }

	/* -------------------------------------------------------------------------- */
	/*                                Phần tìm kiếm                               */
	public function Search()
	{

		$this->data['list_companies'] = $this->companyModel->select(); //hãng xe
		$this->data['list_vehicles'] = $this->vehiclesModel->select(); // dòng xe
		$this->data['list_cityes'] = $this->cityModel->select(); //khu vực
		$this->data['list_banner'] = $this->indexModel->SelectBanner();

		if (isset($_GET['keyword'])) {
			$keyword = $_GET['keyword'];
		}

		$this->data['title'] = $keyword;
		// $this->data['result'] = $this->indexModel->getSearch($keyword);

		$config = array();
		$config["base_url"] = base_url() . '/tim-kiem-thong-tin?keyword=' . $keyword;
		$config['total_rows'] = ceil($this->indexModel->countSearch($keyword)); // count all products, ceil to round up
		$config["per_page"] = 6; // products per page
		$config["page_query_string"] = TRUE; // use query string for pagination
		$config['query_string_segment'] = 'page'; // the query string segment to capture the page number
		$config['use_page_numbers'] = TRUE; // use page numbers instead of offsets
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		// Initialize pagination
		$this->pagination->initialize($config); // automatically create pages
		$this->page = ($this->input->get('page')) ? $this->input->get('page') : 1; // current page active, default to 1 if not set

		// Calculate offset based on current page
		$offset = ($this->page - 1) * $config["per_page"];

		$this->data["links"] = $this->pagination->create_links(); // automatically create pagination links based on the current page
		$this->data['Search_pagination'] = $this->indexModel->getSearchPagination($keyword, $config["per_page"], $offset);

		$this->load->view('user/template_user/header');
		$this->load->view('user/template_user/topbar');
		$this->load->view('user/template_user/navbar', $this->data);
		$this->load->view('user/search/search', $this->data);
		$this->load->view('user/template_user/footer');
	}
	/* -------------------------------------------------------------------------- */
}
