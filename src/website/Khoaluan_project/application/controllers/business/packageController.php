<?php 
	class packageController extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();

			$this->load->model('business/packageModel');
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
			$this->checklogin();
			$this->checkbusiness();
			$this->load->view('business/Template_business/header');	
			$this->load->view('business/Template_business/navbar');	
			$this->load->view('business/Template_business/sidebar');	

			$id = $this->session->userdata('account')['id'];
			$this->data['packages'] = $this->packageModel->select($id);
			$this->load->view('business/package/list', $this->data);	
			$this->load->view('business/Template_business/footer');	
		}
	}
?>