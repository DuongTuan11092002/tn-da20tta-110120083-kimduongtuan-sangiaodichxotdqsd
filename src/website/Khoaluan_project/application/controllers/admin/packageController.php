<?php
class packageController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/packageModel');
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

		$this->data['list_package'] = $this->packageModel->select();
		$this->load->view('admin/package/list', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	/* -------------------------------------------------------------------------- */
	/*                                   CREATE                                   */
	public function create()
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');
		$this->load->view('admin/package/create');
		$this->load->view('admin/Template_admin/footer');
	}

	public function handleADD()
	{
		$this->form_validation->set_rules('name', 'tên gói', 'trim|required', ['required' => 'Vui lòng nhập %s dịch vụ']);
		$this->form_validation->set_rules('slug', 'slug', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('description', 'mô tả', 'trim|required', ['required' => 'Vui lòng nhập %s gói dịch vụ']);
		$this->form_validation->set_rules('date', 'thời gian', 'trim|required', ['required' => 'Vui lòng nhập %s gói dịch vụ']);
		$this->form_validation->set_rules('price', 'giá', 'trim|required', ['required' => 'Vui lòng nhập %s gói dịch vụ']);
		if ($this->form_validation->run() == TRUE) {
			$data_package = array(
				'name' => $this->security->xss_clean($this->input->post('name')),
				'slug' => $this->security->xss_clean($this->input->post('slug')),
				'description' => $this->input->post('description'),
				'date' => $this->input->post('date'),
				'price' => $this->input->post('price'),
				'status' => $this->input->post('status'),
			);

			$this->packageModel->insert($data_package);
			$this->session->set_flashdata('success', 'Thêm thông tin thành công');
			redirect(base_url('package-management'));
		} else {
			$this->create();
		}
	}
	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                                    EDIT                                    */
	public function edit($id)
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		$this->data['packageID'] =  $this->packageModel->selectbyID($id);
		$this->load->view('admin/package/edit', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	public function handleEDIT($id)
	{
		$this->form_validation->set_rules('name', 'tên gói', 'required', ['required' => 'Vui lòng nhập %s dịch vụ']);
		$this->form_validation->set_rules('slug', 'slug', 'required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('description', 'mô tả', 'required', ['required' => 'Vui lòng nhập %s gói dịch vụ']);
		$this->form_validation->set_rules('date', 'thời gian', 'required', ['required' => 'Vui lòng nhập %s gói dịch vụ']);
		$this->form_validation->set_rules('price', 'giá', 'required', ['required' => 'Vui lòng nhập %s gói dịch vụ']);
		if ($this->form_validation->run() == TRUE) {
			$data_package_edit = array(
				'name' => $this->security->xss_clean($this->input->post('name')),
				'slug' => $this->security->xss_clean($this->input->post('slug')),
				'description' => $this->input->post('description'),
				'date' => $this->input->post('date'),
				'price' => $this->input->post('price'),
				'status' => $this->input->post('status'),
			);

			$this->packageModel->update($id, $data_package_edit);
			$this->session->set_flashdata('success', 'Sửa thông tin thành công');
			redirect(base_url('package-management'));
		} else {
			$this->edit($id);
		}
	}

	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                                   DELETE                                   */
	public function delete($id)
	{
		$this->checklogin();
		$this->packageModel->delete($id);
		$this->session->set_flashdata('success', 'Xóa thông tin thành công');
		redirect(base_url('package-management'));
	}
	/* -------------------------------------------------------------------------- */
}
