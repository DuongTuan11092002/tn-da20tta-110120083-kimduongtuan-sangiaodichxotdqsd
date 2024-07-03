<?php
class newController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/newModel');
		$this->load->model('admin/accountModel');
	}

	public function checklogin()
	{
		if (!$this->session->userdata('account')['role'] == 2) {
			redirect(base_url('dang-nhap'));
		}
	}

	/* -------------------------------------------------------------------------- */
	/*                             CATEGORY-MANAGEMENT                            */
	public function category()
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		$this->data['list_category'] = $this->newModel->selectCategory();
		$this->load->view('admin/news/category/list', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	/* --------------------------------- CREATE --------------------------------- */
	public function categoryADD()
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');
		$this->load->view('admin/news/category/create');
		$this->load->view('admin/Template_admin/footer');
	}

	public function handleCategoryADD()
	{
		$this->checklogin();
		$this->form_validation->set_rules('name', 'tên danh mục', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('slug', 'slug', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		if ($this->form_validation->run() == TRUE) {
			$data_category = array(
				'name' => $this->security->xss_clean($this->input->post('name')),
				'slug' => $this->security->xss_clean($this->input->post('slug')),
				'status' => $this->input->post('status'),
			);

			$this->newModel->insertCategory($data_category);
			$this->session->set_flashdata('success', 'Thêm thông tin thành công');
			redirect(base_url('category-management'));
		} else {
			$this->create();
		}
	}
	/* ---------------------------------- EDIT ---------------------------------- */
	public function categoryEDIT($id)
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		$this->data['categoryID'] = $this->newModel->selectbyID($id);
		$this->load->view('admin/new/category/edit', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	public function handleEDIT($id)
	{
		$this->checklogin();
		$this->form_validation->set_rules('name', 'tên danh mục', 'required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('slug', 'slug', 'required', ['required' => 'Vui lòng nhập %s']);
		if ($this->form_validation->run() == TRUE) {
			$data_category_edit = array(
				'name' => $this->security->xss_clean($this->input->post('name')),
				'slug' => $this->security->xss_clean($this->input->post('slug')),
				'status' => $this->input->post('status'),
			);

			$this->newModel->updateCategory($id, $data_category_edit);
			$this->session->set_flashdata('success', 'Thay đổi thông tin thành công');
			redirect(base_url('category-management'));
		} else {
			$this->edit($id);
		}
	}

	/* --------------------------------- DELETE --------------------------------- */
	public function categoryDELETE($id)
	{
		$this->checklogin();
		$this->newModel->delete($id);
		$this->session->set_flashdata('success', 'Xóa thông tin thành công');
		redirect(base_url('category-management'));
	}

	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                               NEW-MANAGEMENT                               */
	public function new()
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		$this->data['list_news'] = $this->newModel->selectNEW();
		$this->load->view('admin/news/new/list', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	/* --------------------------------- CREATE --------------------------------- */
	public function newADD()
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		$this->data['list_category'] = $this->newModel->selectCategory(); //select category
		$this->data['list_account_admin'] = $this->accountModel->selectbyAD();
		$this->load->view('admin/news/new/create', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}


	public function handlenewADD()
	{
		$this->checklogin();
		$this->form_validation->set_rules('name', 'tên bài viết', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('slug', 'slug', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('description', 'mô tả', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('content', 'nội dung', 'trim|required', ['required' => 'Vui lòng nhập %s']);

		if ($this->form_validation->run() == TRUE) {
			/* --------------------------- modul config image --------------------------- */
			$origin_filename = $_FILES['thumbnail']['name'];
			$new_name = time() . "" . str_replace(' ', '-', $origin_filename);
			$config = [
				'upload_path' => FCPATH . 'uploads/new',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'file_name' => $new_name,
			];
			$this->load->library('upload', $config);
			/* ------------------------------------ - ----------------------------------- */

			if (!$this->upload->do_upload('thumbnail')) {
				$ImageError = array('error' => $this->upload->display_errors());
				$this->load->view('admin/Template_admin/header');
				$this->load->view('admin/Template_admin/navbar');
				$this->load->view('admin/Template_admin/sidebar');

				$this->data['list_category'] = $this->newModel->selectCategory();
				$this->data['list_account_admin'] = $this->accountModel->selectbyAD();
				$this->load->view('admin/news/new/create', array_merge($this->data, $ImageError));
				$this->load->view('admin/Template_admin/footer');
			} else {
				$new_filename = $this->upload->data('file_name');
				$data_new = array(
					'name' => $this->security->xss_clean($this->input->post('name')),
					'slug' => $this->security->xss_clean($this->input->post('slug')),
					'description' => $this->security->xss_clean($this->input->post('description')),
					'content' => $this->input->post('name'),
					'status' => $this->input->post('status'),
					'account_id' => $this->input->post('account_id'),
					'categories_news_id' => $this->input->post('category_id'),
					'thumbnail' => $new_filename,
				);

				$this->newModel->insertNEW($data_new);
				$this->session->set_flashdata('success', 'Thêm thông tin bài viết thành công!');
				redirect(base_url('new-management'));
			}
		} else {
			$this->newADD();
		}
	}

	/* ---------------------------------- EDIT ---------------------------------- */
	public function newEDIT($id)
	{
		$this->checklogin();
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');

		$this->data['list_category'] = $this->newModel->selectCategory(); //select category
		$this->data['list_account_admin'] = $this->accountModel->selectbyAD();
		$this->data['newID'] = $this->newModel->selectnewbyID($id);
		$this->load->view('admin/news/new/edit', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	public function handlenewEDIT($id)
	{
		$this->checklogin();
		$this->form_validation->set_rules('name', 'tên bài viết', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('slug', 'slug', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('description', 'mô tả', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('content', 'nội dung', 'trim|required', ['required' => 'Vui lòng nhập %s']);

		if ($this->form_validation->run() == TRUE) {
			if (!empty($_FILES['thumbnail']['name'])) {
				/* --------------------------- modul config image --------------------------- */
				$origin_filename = $_FILES['thumbnail']['name'];
				$new_name = time() . "" . str_replace(' ', '-', $origin_filename);
				$config = [
					'upload_path' => FCPATH . 'uploads/new',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'file_name' => $new_name,
				];
				$this->load->library('upload', $config);
				/* ------------------------------------ - ----------------------------------- */
				if (!$this->upload->do_upload('thumbnail')) {
					$ImageError = array('error' => $this->upload->display_errors());
					$this->load->view('admin/Template_admin/header');
					$this->load->view('admin/Template_admin/navbar');
					$this->load->view('admin/Template_admin/sidebar');

					$this->data['list_category'] = $this->newModel->selectCategory();
					$this->data['list_account_admin'] = $this->accountModel->selectbyAD();
					$this->load->view('admin/news/new/create', array_merge($this->data, $ImageError));
					$this->load->view('admin/Template_admin/footer');
				} else {
					$filename = $this->upload->data('file_name');
					$data_new_edit = array(
						'name' => $this->security->xss_clean($this->input->post('name')),
						'slug' => $this->security->xss_clean($this->input->post('slug')),
						'description' => $this->security->xss_clean($this->input->post('description')),
						'content' => $this->input->post('content'),
						'status' => $this->input->post('status'),
						'account_id' => $this->input->post('account_id'),
						'categories_news_id' => $this->input->post('category_id'),
						'thumbnail' => $filename,
					);
				}
			} else {
				$data_new_edit = array(
					'name' => $this->security->xss_clean($this->input->post('name')),
					'slug' => $this->security->xss_clean($this->input->post('slug')),
					'description' => $this->security->xss_clean($this->input->post('description')),
					'content' => $this->input->post('content'),
					'status' => $this->input->post('status'),
					'account_id' => $this->input->post('account_id'),
					'categories_news_id' => $this->input->post('category_id'),
				);
			}
			$this->newModel->updateNEW($id, $data_new_edit);
			$this->session->set_flashdata('success', 'Thay đổi thông tin bài viết thành công!');
			redirect(base_url('new-management'));
		} else {
			$this->newEDIT($id);
		}
	}
	/* --------------------------------- DELETE --------------------------------- */
	public function deleteNEW($id)
	{
		$this->checklogin();

		$item = $this->newModel->getNewByID($id);
			if($item){
				$thumbnail = 'uploads/new' . $item->thumbnail;

				if($thumbnail){
					unlink($thumbnail);
				}

				if($this->newModel->deleteNEW($id)){
					$this->session->set_flashdata('success', 'Xóa thông tin thành công');
				}else{
					$this->session->set_flashdata('error', 'Xảy ra lỗi!');
				}
			}else{
				$this->session->set_flashdata('error', 'Không nhận được thông tin xóa!');
			}

		
		redirect(base_url('new-management'));
	}
	/* -------------------------------------------------------------------------- */

	public function newBuyCarList()
	{
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');
		$this->data['newSaleList'] = $this->newModel->selectNewBuyCar();
		$this->load->view('admin/news/newsale/list', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}


	public function newBuyCarEdit($id)
	{
		$this->load->view('admin/Template_admin/header');
		$this->load->view('admin/Template_admin/navbar');
		$this->load->view('admin/Template_admin/sidebar');
		$this->data['newSaleEditID'] = $this->newModel->selectNewBuyCarID($id);
		$this->load->view('admin/news/newsale/edit', $this->data);
		$this->load->view('admin/Template_admin/footer');
	}

	public function HandleNewBuyCarEdit($id)
	{
		$data_new_change = array(
			'status' => $this->input->post('status'),
			'end_time' => $this->input->post('end_time'),
		);
		$this->newModel->updateNewSaleCar($id, $data_new_change);
		$this->session->set_flashdata('success', 'Cập nhật thông tin thành công');
		redirect(base_url('new-sales-management'));
	}

	public function DeleteNewSaleCar($id)
	{

		$this->checklogin();
		$item = $this->newModel->getNewSaleCarByID($id);
		if($item){
			$thumbnail_sale_car = 'uploads/new/' . $item->thumbnail;

			if($thumbnail_sale_car){
					unlink($thumbnail_sale_car);
			}

			if($this->newModel->deleteNewSaleCar($id)){
				$this->session->set_flashdata('success', 'Xóa thông tin thành công');
			}else{
				$this->session->set_flashdata('error', 'Xảy ra lỗi!');
			}
		}else{
			$this->session->set_flashdata('error', 'Không có thông tin cần xóa!');
		}
		
		redirect(base_url('new-sales-management'));
	}
}
