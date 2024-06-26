	<?php
class cityController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/cityModel');
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

		$this->data['list_citys'] = $this->cityModel->select();
		$this->load->view('admin/city/list', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	/* -------------------------------------------------------------------------- */
	/*                                 CREATE CITY                                */
	public function create()
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');
		$this->load->view('admin/city/create');
		$this->load->view('admin/Template_admin/footer');
	}

	public 	function handleADD()
	{
		$this->checklogin();
		$this->form_validation->set_rules('name', 'tên khu vực', 'required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('slug', 'slug', 'required', ['required' => 'Vui lòng nhập %s']);
		if ($this->form_validation->run() == TRUE) {
			$data_city = array(
				'name' => $this->security->xss_clean($this->input->post('name')),
				'slug' => $this->security->xss_clean($this->input->post('slug')),
				'status' => $this->input->post('status'),
			);

			$this->cityModel->insert($data_city);
			$this->session->set_flashdata('success', 'Thêm thông tin thành công');
			redirect(base_url('add-city	'));
		} else {
			$this->create();
		}
	}
	/* -------------------------------------------------------------------------- */

	/* ---------------------------------- EDIT ---------------------------------- */

	public function edit($id)
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		$this->data['cityID'] = $this->cityModel->selectbyID($id);
		$this->load->view('admin/city/edit', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	public function handleEDIT($id)
	{
		$this->checklogin();
		$this->form_validation->set_rules('name', 'tên khu vực', 'required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('slug', 'slug', 'required', ['required' => 'Vui lòng nhập %s']);
		if ($this->form_validation->run() == TRUE) {
			$data_city_edit = array(
				'name' => $this->security->xss_clean($this->input->post('name')),
				'slug' => $this->security->xss_clean($this->input->post('slug')),
				'status' => $this->input->post('status'),
			);

			$this->cityModel->update($id, $data_city_edit);
			$this->session->set_flashdata('success', 'Thêm thông tin thành công');
			redirect(base_url('city-management'));
		} else {
			$this->edit($id);
		}
	}

	/* --------------------------------- DELETE --------------------------------- */
	public function delete($id)
	{
		$this->checklogin();
		$this->cityModel->delete($id);
		$this->session->set_flashdata('success', 'Xóa thông tin thành công');
		redirect(base_url('city-management'));
	}
}
