<?php
class productController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/productModel');
		$this->load->model('admin/libraryModel');
	}

	public function checklogin()
	{
		if (!$this->session->userdata('account')['role'] == 2) {
			$this->session->set_flashdata('success', 'Vui lòng đăng nhập tài khoản!');
			redirect(base_url('dang-nhap'));
		}
	}


	public function select()
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		$this->data['lists'] = $this->productModel->select();
		$this->load->view('admin/product/list', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	public function edit($id)
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		$this->data['valueIMG'] = $this->libraryModel->select($id);
		$this->data['value'] = $this->productModel->edit($id);

		$result = $this->productModel->getID($id);

		if($result){
			$currentTime = new DateTime();
			$Product_end = new DateTime($result->created_end);

			if(!empty($Product_end)){
				if($currentTime > $Product_end){
					$data = [
						'product_status' => 0,
					];
					$this->productModel->update($id, $data);
				}
			}
		}

		$this->load->view('admin/product/edit', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	public function handleEdit($id)
	{
		$data = array(
			'product_status' => $this->input->post('product_status'),
			'created_end' => $this->input->post('created_end')
		);
		$this->productModel->update($id, $data);
		$this->session->set_flashdata('success', 'Cập nhật thông tin thành công');
		redirect(base_url('product-management'));
	}


	public function delete($id)
	{
		// Lấy thông tin ảnh trong bảng library theo ID
		$item_library = $this->libraryModel->getID($id);

		if ($item_library) {
			$image_path = 'uploads/product/' . $item_library->img_car;

			// Kiểm tra và xóa tệp ảnh từ thư mục
			if (file_exists($image_path)) {
				if (unlink($image_path)) {
					// Nếu xóa tệp ảnh thành công, tiếp tục xóa bản ghi trong cơ sở dữ liệu
					$this->libraryModel->delete($id);
				} else {
					// Nếu có lỗi khi xóa tệp ảnh, cài đặt thông báo lỗi
					$this->session->set_flashdata('error', 'Có lỗi xảy ra khi xóa ảnh từ thư mục!');
					redirect(base_url('product-management'));
					return; // Dừng thực thi
				}
			}
		}

		// Lấy thông tin sản phẩm theo ID
		$item = $this->productModel->getID($id);

		if ($item) {
			$thumbnail_path = 'uploads/product/' . $item->thumbnail;

			// Kiểm tra và xóa tệp thumbnail từ thư mục
			if (file_exists($thumbnail_path)) {
				unlink($thumbnail_path);
			}

			// Xóa sản phẩm từ cơ sở dữ liệu
			if ($this->productModel->delete($id)) {
				$this->session->set_flashdata('success', 'Xoá thông tin thành công!');
			} else {
				$this->session->set_flashdata('error', 'Có lỗi xảy ra khi xóa sản phẩm!');
			}
		} else {
			$this->session->set_flashdata('error', 'Không tìm thấy thông tin sản phẩm!');
		}

		// Chuyển hướng về trang quản lý sản phẩm
		redirect(base_url('product-management'));
	}
}
