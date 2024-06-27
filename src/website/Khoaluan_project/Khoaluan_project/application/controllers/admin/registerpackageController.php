<?php
class registerpackageController extends CI_Controller
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

		$this->data['list'] = $this->packageModel->selectListRegisterPackage();
		$this->load->view('admin/registerpackage/list', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}


	public function Detail($id)
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');
		$this->data['ID'] = $this->packageModel->GetAccountRegister($id);
		$this->load->view('admin/registerpackage/detail', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	public function Handledetail($id,$account_id)
	{
		$this->checklogin();
		$this->form_validation->set_rules('status_premium', 'Kích hoạt trạng thại gói', 'trim|required', ['required' => 'Vui lòng chọn %s']);
		
		$this->form_validation->set_rules('status', 'trạng thái', 'trim|required', ['required' => 'Vui lòng chọn %s']);
		$this->form_validation->set_rules('start_time', 'thời hạn bắt đầu', 'trim|required', ['required' => 'Vui lòng chọn %s']);
		$this->form_validation->set_rules('start_end', 'thời hạn kết thúc', 'trim|required', ['required' => 'Vui lòng chọn %s']);
		if($this->form_validation->run()){
			$data_register_package = array(
				'start_time' => $this->input->post('start_time'),
				'end_time' => $this->input->post('start_end'),
				'status' => $this->input->post('status'),
			);
			$update_package = $this->packageModel->UpdatePackageID($id, $data_register_package);
			if($update_package) {
				$change_status_business = array(
					'status_premium' => $this->input->post('status_premium'),
					'role' => $this->input->post('role'),
				);
				$update_status_business = $this->packageModel->UpdateBusinessAccount($account_id, $change_status_business);

				if($update_status_business) {
					$this->session->set_flashdata('success', 'Cập nhật đăng ký gói thành công!');
				}else{
					$this->session->set_flashdata('error', 'Cập nhật kích hoạt doanh nghiệp không thành công!');
				}
				
			}else{
				$this->session->set_flashdata('error', 'Cập nhật đăng ký gói không thành công!');
			}
		
			redirect(base_url('register_package'));
		}else{
			$this->Detail($id);
		}
	}

	public function Delete($id)
	{
	
	}
}
