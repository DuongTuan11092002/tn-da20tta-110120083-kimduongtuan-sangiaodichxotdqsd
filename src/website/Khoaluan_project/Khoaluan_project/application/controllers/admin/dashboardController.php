<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboardController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('admin/dashboardModel');
	}

	public function checklogin()
	{
		if (!$this->session->userdata('account')['role'] == 2) {
			redirect(base_url('dang-nhap'));
		}
	}

	public function dashboard()
	{
		/* -------------------------------------------------------------------------- */
		/*                                    Model                                   */
		$this->data['count_all_account'] = $this->dashboardModel->Count_account();
		$this->data['count_packages_register'] = $this->dashboardModel->Count_register_new(); //mới đăng ký
		$this->data['count_packages_online'] = $this->dashboardModel->Count_register_online(); //gói đăng ký đang hoạt động
		$this->data['select_expired_package'] = $this->dashboardModel->select_register_expired();
		// thống kê
		$this->data['count_product'] = $this->dashboardModel->Count_product();
		$this->data['count_all_product'] = $this->dashboardModel->Count_all_product();
		$this->data['count_all_new_sale_none'] = $this->dashboardModel->Count_all_sale_status_none();
		$this->data['count_all_new_sale_checked'] = $this->dashboardModel->Count_all_sale_checked();
		$this->data['count_all_new'] = $this->dashboardModel->Count_all_new();
		// Liên hệ
		$this->data['count_contact_status'] = $this->dashboardModel->Count_all_contact_new();
		$this->data['count_contact_checked'] = $this->dashboardModel->Count_all_contact_checked();
		$this->data['select_contact'] = $this->dashboardModel->Select_contact();
		/* -------------------------------------------------------------------------- */
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');
		$this->load->view('admin/dashboard', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	public function detailContact($id)
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		$this->data['value'] = $this->dashboardModel->getID($id);
		$this->load->view('admin/contact/index', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	public function handleDetailContact($id)
	{
		$data = array(
			'status' => $this->input->post('status'),
		);

		$this->dashboardModel->update($id, $data);
		$this->session->set_flashdata('success', 'Cập nhật thông tin thành công!');
		redirect(base_url('quan-tri'));
	}
}
