<?php
class dashboardController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('business/dashboardModel');
	}


	public function checklogin()
	{
		if (!$this->session->userdata('account')['role'] == 1) {
			redirect(base_url('dang-nhap'));
		}
	}

	public function dashboard()
	{
		$id = $this->session->userdata('account')['id'];

		// Lấy gói dịch vụ đã đăng ký của tài khoản
		$result = $this->dashboardModel->getPackageByAccount($id);
		if ($result) {
			$currentTime = new DateTime();
			$packageTime = new DateTime($result->end_time);

			$currentTime->setTime(0, 0, 0);
			$packageTime->setTime(0, 0, 0);

			// Tính toán thời gian còn lại
			$interval = $currentTime->diff($packageTime);
			$daysRemaining = $interval->days;

			if ($currentTime >= $packageTime) {
				$data = array(
					'status' => 3,
				);
				$Change_register = $this->dashboardModel->ChangeRegisterPackage($id, $data);

				if ($Change_register) {
					$data = array(
						'status_premium' => 0,
					);
					$this->dashboardModel->ChangeToStatusAccount($id, $data);
				}
				$this->session->set_flashdata('success', 'Gói dịch vụ của bạn đã hết hạn. Vui lòng liên hệ admin để gia hạn.');
			} elseif ($daysRemaining == 1) {
				$this->session->set_flashdata('success', 'Gói dịch vụ của bạn sẽ hết hạn trong 24 giờ tới. Vui lòng liên hệ admin để gia hạn.');
			}
		}

		$this->data['countToProduct'] = $this->dashboardModel->countAllToProductByBusiness($id); //đếm số lượng sản phẩm của doanh nghiệp đó
		// Điếm số lượng liên hệ
		$this->data['countToContactCheck'] = $this->dashboardModel->countAllToContactStatusCheck($id);
		$this->data['countToContactChecked'] = $this->dashboardModel->countAllToContactStatusChecked($id);
		// hiển thị sản phẩm
		$this->data['contacts'] = $this->dashboardModel->selectContactToBusiness($id);
		$this->checklogin();
		$this->load->view('business/Template_business/header');
		$this->load->view('business/Template_business/navbar');
		$this->load->view('business/Template_business/sidebar');
		$this->load->view('business/dashboard', $this->data);
		$this->load->view('business/Template_business/footer');
	}

	public function DetailContact($id)
	{
		$this->checklogin();
		$this->load->view('business/Template_business/header');
		$this->load->view('business/Template_business/navbar');
		$this->load->view('business/Template_business/sidebar');

		$this->data['value'] = $this->dashboardModel->DetailContact($id);
		$this->load->view('business/contact/contactDetail', $this->data);
		$this->load->view('business/Template_business/footer');
	}

	public function HandleUpdateContact($id)
	{
		$data = array(
			'status' => $this->input->post('status'),
		);
		$this->dashboardModel->UpdateContact($id, $data);
		$this->session->set_flashdata('success', 'Cập nhật thông tin thành công!');
		
		redirect(base_url('quan-tri-doanh-nghiep'));
	}
}
