<?php
defined('BASEPATH') or exit('No direct script access allowed');

class loginController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('loginModel');
	}


	public function index()
	{
		$this->load->view('Login/Template/header');
		$this->load->view('Login/Login');
		$this->load->view('Login/Template/footer');
	}

	public function handleLogin()
	{
		// form_validation
		$this->form_validation->set_rules('email', 'email tài khoản', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('password', 'mật khẩu', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);

		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$checkLogin = $this->loginModel->checkLogin($email, $password); //load model
			if ($checkLogin) {
				$info_account = [
					'id' => $checkLogin[0]->id,
					'fullname' => $checkLogin[0]->fullname,
					'email' => $checkLogin[0]->email,
					'phone' => $checkLogin[0]->phone,
					'address' => $checkLogin[0]->address,
					'role' => $checkLogin[0]->role,
					'status_premium' => $checkLogin[0]->status_premium,
				];
				$this->session->set_userdata('account', $info_account);
				if ($info_account['role'] == 2) {
					$this->session->set_flashdata('success', 'Đăng nhập thành công! Xin chào' . ' ' . $info_account['fullname']);
					redirect(base_url('quan-tri'));
				} else if ($info_account['role'] == 1) {
					$this->session->set_flashdata('success', 'Đăng nhập thành công! Xin chào' . ' ' . $info_account['fullname']);
					redirect(base_url('/'));
				} else if ($info_account['role'] == 0) {
					$this->session->set_flashdata('success', 'Đăng nhập thành công! Xin chào' . ' ' . $info_account['fullname']);
					redirect(base_url('/'));
				}
			} else {
				$this->session->set_flashdata('error', 'Sai tài khoản hoặc mật khẩu! vui lòng đăng nhập lại' . ' ' . $info_account['fullname']);
				redirect(base_url('dang-nhap'));
			}
		} else {
			$this->index();
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('account');
		$this->session->set_flashdata('success', 'Đăng xuất thành công!');
		redirect(base_url('dang-nhap'));
	}


	/* -------------------------------------------------------------------------- */
	/*                                  REGISTER                                  */
	public function register()
	{
		$this->load->view('Login/Template/header');
		$this->load->view('Login/register');
		$this->load->view('Login/Template/footer');
	}

	public function handleRegister()
	{
		$this->form_validation->set_rules('fullname', 'họ và tên', 'required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('email', 'email tài khoản', 'required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('phone', 'số điện thoại', 'required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('address', 'địa chỉ', 'required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('password', 'mật khẩu', 'required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('confirmPassword', 'mật khẩu', 'required', ['required' => 'Vui lòng nhập %s của bạn']);
		if ($this->form_validation->run() == TRUE) {
			$data_register = array(
				'fullname' => $this->security->xss_clean($this->input->post('fullname')),
				'phone' => $this->security->xss_clean($this->input->post('phone')),
				'address' => $this->security->xss_clean($this->input->post('address')),
				'email' => $this->security->xss_clean($this->input->post('email')),
				'password' => md5($this->security->xss_clean($this->input->post('password'))),
				'status' => 1,
				
			);

			$this->loginModel->register($data_register);
			$this->session->set_flashdata('success', 'Đăng ký thành công vui lòng đăng nhập!');
			redirect(base_url('dang-nhap'));
		} else {
			$this->register();
		}
	}
	/* -------------------------------------------------------------------------- */
}
