<?php
class productController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/vehiclesModel');
		$this->load->model('admin/cityModel');
		$this->load->model('admin/companyModel');
		$this->load->model('business/productModel');
		$this->load->model('business/libraryIMGModel');
	}

	public function checklogin()
	{
		if (!$this->session->userdata('account')['role'] == 1) {
			redirect(base_url('dang-nhap'));
		}
	}

	public function checkbusiness()
	{
		if ($this->session->userdata('account')['status_premium'] == 0) {
			$this->session->set_flashdata('success', 'Gói dịch vụ doanh nghiệp đã hết hạn, vui lòng gia hạn gói dịch vụ');
			redirect(base_url('quan-tri-doanh-nghiep'));
		}
	}


	public function list()
	{
		$id = $this->session->userdata('account')['id'];
		$this->checklogin();
		$this->checkbusiness();
		$this->load->view('business/Template_business/header');
		$this->load->view('business/Template_business/navbar');
		$this->load->view('business/Template_business/sidebar');

		$this->data['list_product_business'] = $this->productModel->select($id);
		$this->load->view('business/product/list', $this->data);
		$this->load->view('business/Template_business/footer');
	}

	/* -------------------------------------------------------------------------- */
	/*                                THÊM SẢN PHẨM                               */
	public function create()
	{
		$this->checklogin();
		$this->checkbusiness();
		$this->load->view('business/Template_business/header');
		$this->load->view('business/Template_business/navbar');
		$this->load->view('business/Template_business/sidebar');

		/* -------------------------------------------------------------------------- */
		/*                                laoding model                               */
		$this->data['list_citys'] = $this->cityModel->select();
		$this->data['list_vehicles'] = $this->vehiclesModel->select();
		$this->data['list_company'] = $this->companyModel->select();
		/* -------------------------------------------------------------------------- */

		$this->load->view('business/product/create', $this->data);
		$this->load->view('business/Template_business/footer');
	}

	public function handleADD()
	{
		$this->checklogin();
		$this->checkbusiness();
		$this->form_validation->set_rules('name', 'tên sản phẩm', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('slug', 'slug sản phẩm', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('price', 'giá sản phẩm', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('content', 'nội dung', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('type_gearbox', 'loại hộp số', 'trim|required', ['required' => 'Vui lòng chọn %s của bạn']);
		$this->form_validation->set_rules('company_id', 'loại hãng xe', 'trim|required', ['required' => 'Vui lòng chọn %s của bạn']);
		$this->form_validation->set_rules('city_id', 'thành phố', 'trim|required', ['required' => 'Vui lòng chọn %s của bạn']);
		$this->form_validation->set_rules('vehicles_id', 'dòng xe', 'trim|required', ['required' => 'Vui lòng chọn %s của bạn']);
		$this->form_validation->set_rules('manufacture_year', 'năm sản xuất', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);

		$order_code = rand(000000, 9999999);
		$account_id = $this->session->userdata('account')['id'];

		if ($this->form_validation->run()) {
			// Upload hình ảnh thumbnail
			$origin_filename = $_FILES['thumbnail']['name'];
			$new_name = time() . "" . str_replace(' ', '-', $origin_filename);
			$config = [
				'upload_path' => FCPATH . 'uploads/product',
				'allowed_types' => 'gif|jpg|png|jpeg|bmp|tiff|webp|svg',
				'file_name' => $new_name,
			];
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('thumbnail')) {
				// Xử lý lỗi nếu upload thumbnail không thành công
				$thumbnailError = array('error' => $this->upload->display_errors());
				$this->load->view('business/Template_business/header');
				$this->load->view('business/Template_business/navbar');
				$this->load->view('business/Template_business/sidebar');
				$this->data['list_citys'] = $this->cityModel->select();
				$this->data['list_vehicles'] = $this->vehiclesModel->select();
				$this->data['list_company'] = $this->companyModel->select();
				$this->load->view('business/product/create', array_merge($this->data, $thumbnailError));
				$this->load->view('business/Template_business/footer');
			} else {
				// Thêm thông tin sản phẩm vào bảng product_cars
				$new_filename = $this->upload->data('file_name');
				$data_product_business = array(
					'product_name' => $this->security->xss_clean($this->input->post('name')),
					'product_slug' => $this->security->xss_clean($this->input->post('slug')),
					'product_price' => $this->security->xss_clean($this->input->post('price')),
					'product_content' => $this->input->post('content'),
					'manufacture_year' => $this->input->post('manufacture_year'),
					'type_gearbox' => $this->input->post('type_gearbox'),
					'code'  => $order_code,
					'product_status' => $this->input->post('status'),
					'categories_company_id' => $this->input->post('company_id'),
					'city_area_id' => $this->input->post('city_id'),
					'vehicles_id' => $this->input->post('vehicles_id'),
					'product_thumbnail' => $new_filename,
					'account_id' => $account_id,
				);

				$product_id = $this->productModel->insert($data_product_business);

				// Upload và thêm các hình ảnh phụ vào bảng library_img và liên kết chúng với sản phẩm trong bảng product_cars
				if (!empty($_FILES['images']['name'][0])) {
					// vòng lặp foreach
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

				$this->session->set_flashdata('success', 'Thêm thông tin sản phẩm thành công!');
				redirect(base_url('quan-ly-san-pham-doanh-nghiep'));
			}
		} else {
			// Nếu không thông tin sản phẩm không hợp lệ, hiển thị form tạo mới lại
			$this->create();
		}
	}

	/* -------------------------------------------------------------------------- */


	/* -------------------------------------------------------------------------- */
	/*                                SỬA SẢN PHẨM                                */
	public 	function edit($id)
	{
		$this->checklogin();
		$this->checkbusiness();
		$this->load->view('business/Template_business/header');
		$this->load->view('business/Template_business/navbar');
		$this->load->view('business/Template_business/sidebar');

		/* -------------------------------------------------------------------------- */
		/*                                laoding model                               */
		$this->data['list_citys'] = $this->cityModel->select();
		$this->data['list_vehicles'] = $this->vehiclesModel->select();
		$this->data['list_company'] = $this->companyModel->select();
		/* -------------------------------------------------------------------------- */
		$this->data['product_car'] =  $this->productModel->selectbyID($id);
		// load library
		$this->data['library_img'] = $this->libraryIMGModel->selectLibraryIMGbyID($id);
		$this->load->view('business/product/edit', $this->data);
		$this->load->view('business/Template_business/footer');
	}

	public 	function handleEDIT($id)
	{
		$this->checklogin();
		$this->checkbusiness();
		$this->form_validation->set_rules('name', 'tên sản phẩm', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('slug', 'slug sản phẩm', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('price', 'giá sản phẩm', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('content', 'nội dung', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('type_gearbox', 'loại hộp số', 'trim|required', ['required' => 'Vui lòng chọn %s của bạn']);
		$this->form_validation->set_rules('company_id', 'loại hãng xe', 'trim|required', ['required' => 'Vui lòng chọn %s của bạn']);
		$this->form_validation->set_rules('city_id', 'thành phố', 'trim|required', ['required' => 'Vui lòng chọn %s của bạn']);
		$this->form_validation->set_rules('vehicles_id', 'dòng xe', 'trim|required', ['required' => 'Vui lòng chọn %s của bạn']);
		$this->form_validation->set_rules('manufacture_year', 'năm sản xuất', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);

		$order_code = rand(000000, 9999999);
		$account_id = $this->session->userdata('account')['id'];

		if ($this->form_validation->run()) {
			$data_product_business_edit = array(
				'product_name' => $this->security->xss_clean($this->input->post('name')),
				'product_slug' => $this->security->xss_clean($this->input->post('slug')),
				'product_price' => $this->security->xss_clean($this->input->post('price')),
				'product_content' => $this->input->post('content'),
				'manufacture_year' => $this->input->post('manufacture_year'),
				'type_gearbox' => $this->input->post('type_gearbox'),
				'code'  => $order_code,
				'product_status' => $this->input->post('status'),
				'categories_company_id' => $this->input->post('company_id'),
				'city_area_id' => $this->input->post('city_id'),
				'vehicles_id' => $this->input->post('vehicles_id'),
				'account_id' => $account_id,
			);

			// Kiểm tra nếu có tải lên hình ảnh thumbnail
			if (!empty($_FILES['thumbnail']['name'])) {
				// Upload hình ảnh thumbnail
				$origin_filename = $_FILES['thumbnail']['name'];
				$new_name = time() . "" . str_replace(' ', '-', $origin_filename);
				$config = [
					'upload_path' => FCPATH . 'uploads/product',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'file_name' => $new_name,
				];
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('thumbnail')) {
					$new_filename = $this->upload->data('file_name');
					$data_product_business_edit['product_thumbnail'] = $new_filename;
				} else {
					// Xử lý lỗi nếu upload thumbnail không thành công
					$thumbnailError = array('error' => $this->upload->display_errors());
					$this->load->view('business/Template_business/header');
					$this->load->view('business/Template_business/navbar');
					$this->load->view('business/Template_business/sidebar');
					$this->data['list_citys'] = $this->cityModel->select();
					$this->data['list_vehicles'] = $this->vehiclesModel->select();
					$this->data['list_company'] = $this->companyModel->select();
					$this->load->view('business/product/create', array_merge($this->data, $thumbnailError));
					$this->load->view('business/Template_business/footer');
					return; // Kết thúc hàm nếu có lỗi upload thumbnail
				}
			}

			// Kiểm tra nếu có tải lên hình ảnh phụ
			if (!empty($_FILES['images']['name'][0])) {
				$data_image_multi_edit = array(); // Khởi tạo mảng để lưu dữ liệu hình ảnh
				foreach ($_FILES['images']['name'] as $key => $image) {
					$temp_file = $_FILES['images']['tmp_name'][$key];
					$new_filename_multi_edit = time() . "_" . str_replace(' ', '-', $image);
					$destination = FCPATH . 'uploads/product/' . $new_filename_multi_edit;
					move_uploaded_file($temp_file, $destination);
					// Thêm dữ liệu hình ảnh vào mảng
					$data_image_multi_edit[] = array(
						'img_car' => $new_filename_multi_edit,
						'product_id' => $id,
					);
				}
				// Cập nhật hoặc thêm mới nhiều hình ảnh vào cơ sở dữ liệu
				$this->libraryIMGModel->updateMultiIMG($id, $data_image_multi_edit);
			}

			// Cập nhật thông tin sản phẩm vào cơ sở dữ liệu
			$this->productModel->update($id, $data_product_business_edit);
			$this->session->set_flashdata('success', 'Thêm thông tin sản phẩm thành công!');
			redirect(base_url('quan-ly-san-pham-doanh-nghiep'));
		} else {
			// Nếu không thông tin sản phẩm không hợp lệ, hiển thị form tạo mới lại
			$this->edit($id);
		}
	}


	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                                XÓA SẢN PHẨM                                */

		//xóa sản phẩm
		public function delete($id)
		{
			$allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

			$imageDirectory = './uploads/product'; // Thay thế bằng đường dẫn thư mục của bạn

			// Xóa ảnh từ cơ sở dữ liệu và thư mục lưu trữ
			if ($this->libraryIMGModel->deleteAll($id) && $this->productModel->delete($id)) {
				// Xóa ảnh từ thư mục lưu trữ
				foreach ($allowedExtensions as $extension) {
					$imagePath = $imageDirectory . $id . '.' . $extension;
					if (file_exists($imagePath)) {
						unlink($imagePath);
					}
				}
				$this->session->set_flashdata('success', 'Xóa thông tin sản phẩm thành công!');
				redirect(base_url('quan-ly-san-pham-doanh-nghiep'));
			} else {
				// Xử lý khi không thể xóa sản phẩm
				$this->session->set_flashdata('error', 'Không thể xóa thông tin sản phẩm!');
				redirect(base_url('quan-ly-san-pham-doanh-nghiep'));
			}
		}

		// xóa thư viện ảnh
		public function deleteLibraryIMG($id, $product_id)
		{
			$this->libraryIMGModel->delete($id);
			$this->session->set_flashdata('success', 'Xóa ảnh trong thư viện thành công!');
			redirect('business/productController/edit/' . $product_id);
		}
	/* -------------------------------------------------------------------------- */
}
