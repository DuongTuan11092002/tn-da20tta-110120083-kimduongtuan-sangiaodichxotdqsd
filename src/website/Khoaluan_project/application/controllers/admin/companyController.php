<?php
defined('BASEPATH') or exit('No direct script access allowed');

class companyController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function checklogin()
	{
		if (!$this->session->userdata('account')['role'] == 2) {
			redirect(base_url('dang-nhap'));
		}
	}


	public function list()
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		// select
		$this->load->model('admin/companyModel');
		$data['list_company'] = $this->companyModel->select();
		$this->load->view('admin/company/list', $data);
		$this->load->view('admin/Template_admin/footer');
	}


	/* -------------------------------------------------------------------------- */
	/*                          SECTION CREATE                                    */
	public function create()
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');
		$this->load->view('admin/company/create');
		$this->load->view('admin/Template_admin/footer');
	}

	public function handleADD()
	{
		$this->form_validation->set_rules('name', 'tên hãng xe', 'required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('slug', 'slug', 'required', ['required' => 'Vui lòng nhập %s']);

		if ($this->form_validation->run() == TRUE) {
			$data_company = array(
				'name' => $this->security->xss_clean($this->input->post('name')),
				'slug' => $this->security->xss_clean($this->input->post('slug')),
				'status' => $this->input->post('status'),
			);
			$this->load->model('admin/companyModel');
			$this->companyModel->Insert($data_company);
			$this->session->set_flashdata('success', 'Thêm thông tin thành công');
			redirect(base_url('company-management'));
		} else {
			$this->create();
		}
	}
	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                                SECTION EDIT                                */
	public function edit($id)
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		$this->load->model('admin/companyModel');
		$data['companyID'] = $this->companyModel->selectID($id);
		$this->load->view('admin/company/edit', $data);
		$this->load->view('admin/Template_admin/footer');
	}

	public function handleEDIT($id)
	{
		$this->form_validation->set_rules('name', 'tên hãng xe', 'required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('slug', 'slug', 'required', ['required' => 'Vui lòng nhập %s']);
		if ($this->form_validation->run() == TRUE) {
			$data_company_edited = [
				'name' => $this->security->xss_clean($this->input->post('name')),
				'slug' => $this->security->xss_clean($this->input->post('slug')),
				'status' => $this->input->post('status'),
			];
			$this->load->model('admin/companyModel');
			$this->companyModel->update($id, $data_company_edited);
			$this->session->set_flashdata('success', 'Sửa thông tin thành công');
			redirect(base_url('company-management'));
		} else {
			$this->edit($id);
		}
	}
	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                               SECTION DELETE                               */
	public function delete($id)
	{
		$this->checklogin();
		$this->load->model('admin/companyModel');
		$this->companyModel->delete($id);
		$this->session->set_flashdata('success', 'Xóa thông tin thành công');
		redirect(base_url('company-management'));
	}
	/* -------------------------------------------------------------------------- */
}
