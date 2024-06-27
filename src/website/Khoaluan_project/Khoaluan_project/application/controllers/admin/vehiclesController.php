<?php
class vehiclesController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/vehiclesModel');
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

		$this->data['list_vehicles'] = $this->vehiclesModel->select();
		$this->load->view('admin/vehicles/list', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	/* -------------------------------------------------------------------------- */
	/*                               SECTION CREATE                               */
	public function create()
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');
		$this->load->view('admin/vehicles/create');
		$this->load->view('admin/Template_admin/footer');
	}

	public function handleADD()
	{
		$this->checklogin();
		$this->form_validation->set_rules('name', 'tên phân khúc', 'required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('slug', 'slug', 'required', ['required' => 'Vui lòng nhập %s']);
		if ($this->form_validation->run() == TRUE) {
			$data_vehicles = array(
				'name' => $this->security->xss_clean($this->input->post('name')),
				'slug' => $this->security->xss_clean($this->input->post('slug')),
				'status' => $this->input->post('status'),
			);

			$this->vehiclesModel->insert($data_vehicles);
			$this->session->set_flashdata('success', 'Thêm thông tin thành công');
			redirect(base_url('vehicles-management'));
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
		$this->load->view('admin/Template_admin/sidebar' );
		// lấy id 
		$this->data['vehiclesID'] = $this->vehiclesModel->selectbyID($id);
		$this->load->view('admin/vehicles/edit', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	public function handleEDIT($id)
	{
		$this->checklogin();
		$this->form_validation->set_rules('name', 'tên phân khúc', 'required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('slug', 'slug', 'required', ['required' => 'Vui lòng nhập %s']);
		if ($this->form_validation->run() == TRUE) {
			$data_vehicles_edited = array(
				'name' => $this->security->xss_clean($this->input->post('name')),
				'slug' => $this->security->xss_clean($this->input->post('slug')),
				'status' => $this->input->post('status'),
			);

			$this->vehiclesModel->update($id, $data_vehicles_edited);
			$this->session->set_flashdata('success', 'Cập nhật thông tin thành công');
			redirect(base_url('vehicles-management'));
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
		$this->vehiclesModel->delete($id);
		$this->session->set_flashdata('success', 'Xóa thông tin thành công');
		redirect(base_url('vehicles-management'));
	}
	/* -------------------------------------------------------------------------- */
}
