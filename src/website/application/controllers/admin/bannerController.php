<?php
class bannerController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/bannerModel');
	}

	public function checklogin()
	{
		if (!$this->session->userdata('account')['role'] == 2) {
			redirect(base_url('dang-nhap'));
		}
	}

	public function List()
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		$this->data['list_banners'] = $this->bannerModel->Select();
		$this->load->view('admin/banner/list', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}



	public function Create()
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		// $this->data['list_citys'] = $this->cityModel->select();
		$this->load->view('admin/banner/create');
		$this->load->view('admin/Template_admin/footer');
	}


	public function HandleCreate()
	{
		$this->checklogin();
		$origin_filename = $_FILES['thumbnail']['name'];
		$new_name = time() . "" . str_replace(' ', '-', $origin_filename);
		$config = [
			'upload_path' => FCPATH . 'uploads/banner',
			'allowed_types' => 'gif|jpg|png|jpeg',
			'file_name' => $new_name,
		];
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('thumbnail')) {
			$this->checklogin();
			$ImageError = array('error' => $this->upload->display_errors());
			$this->load->view('admin/Template_admin/header');
			$this->load->view('admin/Template_admin/navbar');
			$this->load->view('admin/Template_admin/sidebar');

			// $this->data['list_citys'] = $this->cityModel->select();
			$this->load->view('admin/banner/create', $ImageError);
			$this->load->view('admin/Template_admin/footer');
		} else {
			$new_filename = $this->upload->data('file_name');
			$data = array(
				'image' => $new_filename,
				'status' => $this->input->post('status'),
				'account_id' => $this->session->userdata('account')['id'],
			);

			$this->bannerModel->Insert($data);
			$this->session->set_flashdata('success', 'Thêm thông tin thành công!');
			redirect(base_url('add-banner'));
		}
	}

	public function Edit($id)
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		$this->data['value'] = $this->bannerModel->getID($id);
		$this->load->view('admin/banner/edit', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	public function HandleEdit($id)
	{
		$this->checklogin();
		if (!empty($_FILES['thumbnai']['name'])) {
			$origin_filename = $_FILES['thumbnail']['name'];
			$new_name = time() . "" . str_replace(' ', '-', $origin_filename);
			$config = [
				'upload_path' => FCPATH . 'uploads/banner',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'file_name' => $new_name,
			];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('thumbnail')) {
				$this->checklogin();
				$ImageError = array('error' => $this->upload->display_errors());
				$this->load->view('admin/Template_admin/header');
				$this->load->view('admin/Template_admin/navbar');
				$this->load->view('admin/Template_admin/sidebar');

				// $this->data['list_citys'] = $this->cityModel->select();
				$this->load->view('admin/banner/create', $ImageError);
				$this->load->view('admin/Template_admin/footer');
			} else {
				$new_filename = $this->upload->data('file_name');
				$data = array(
					'image' => $new_filename,
					'status' => $this->input->post('status'),
					'account_id' => $this->session->userdata('account')['id'],
				);
			}
		} else {
			$data = array(
				'status' => $this->input->post('status'),
				'account_id' => $this->session->userdata('account')['id'],
			);
		}

		$this->bannerModel->Update($id, $data);
		$this->session->set_flashdata('success', 'Cập nhật thông tin thành công!');
		redirect(base_url('banner-management'));
	}


	public function Delete($id)
	{
		$this->checklogin();
		$item = $this->bannerModel->getBannerByID($id);
		if ($item) {
			$thumbnail = 'uploads/banner/' . $item->image;

			if ($thumbnail) {
				unlink($thumbnail);
			}

			if ($this->bannerModel->Delete($id)) {
				$this->session->set_flashdata('success', 'Xóa thông tin thành công!');
			} else {
				$this->session->set_flashdata('error', 'Xảy ra lỗi');
			}
		} else {
			$this->session->set_flashdata('error', 'Không có thông tin cần xóa!');
		}
		redirect(base_url('banner-management'));
	}
}
