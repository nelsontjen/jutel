<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation', 'session', 'captcha');
		$this->load->helper(array('captcha', 'url'));
	}
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$path = './assets/captcha/';
			// if(!file_exists($path)){
			// 	$buat=mkdir($path,0777);
			// 	if(!$buat){
			// 		return;
			// 	}
			// }

			$word = array_merge(range('0', '9'), range('A', 'Z'));
			$acak = shuffle($word);
			$str  = substr(implode($word), 0, 5);

			$data_ses = array('captcha_str' => $str);
			$this->session->set_userdata($data_ses);
			$vals = [
				'word'  => $str, //huruf acak yang telah dibuat diatas
				'img_path'  => $path, //path untuk menyimpan gambar captcha
				'img_url'   => base_url() . 'assets/captcha/', //url untuk menampilkan gambar captcha
				'img_width' => '150', //lebar gambar captcha
				'img_height' => 40, //tinggi gambar captcha
				'expiration' => 7200 //expired time per captcha
			];

			$capc = create_captcha($vals);

			$data['image'] = $capc['image']; //variable array untuk menampilkan captcha pada view


			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login', $data['image']);
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$captcha = $this->input->post('captcha');
		$user = $this->db->get_where('user', ['email' => $email])->row_array(); // untuk mencegah sql injection
		if ($captcha != $this->session->userdata('captcha_str')) {
			$this->session->set_flashdata('notif', '
			<div class="alert alert-warning">Captcha Salah</div>
			');
			redirect('auth');
		} else if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'email' => $user['email'],
					'role_id' => $user['role_id'],
					'user_id' => $user['id']
				];
				$this->session->set_userdata($data);
				if ($user['role_id'] == 1) {
					redirect('admin');
				} else {
					redirect('user');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Password salah!
			  </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email gada
		  </div>');
			redirect('auth');
		}
	}

	private function _uploadImage()
	{
		$config['upload_path'] = './assets/profile';
		$config['allowed_types'] = 'jpg|png';
		$config['overwrite'] = true;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ($this->upload->do_upload('profilePhoto')) {
			return $this->upload->data('file_name');
			// $this->db->set('img', $new_image);
		} else {
			return 'default.jpg';
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('firstname', 'First Name', 'required|trim');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password minimal 6 karakter'
		]);

		$this->form_validation->set_rules('bdate', 'Birthday Date', 'required');
		$this->form_validation->set_rules('no_telp', 'Phone Number', 'required|trim');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[6]|matches[password1]');
		if (!empty($_FILES["profilePhoto"]["name"])) {
			$image = $this->_uploadImage();
		} else {
			$image = 'default.jpg';
		}

		if ($this->form_validation->run() == false) {
			$this->load->library('form_validation');
			$data['title'] = 'Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'firstname' => htmlspecialchars($this->input->post('firstname', true)), //htmlspecialchars untuk sanitasi atau membersihkan dari xss
				'lastname' => htmlspecialchars($this->input->post('lastname', true)),
				'email' => htmlspecialchars($this->input->post('email')),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'bdate' => $this->input->post('bdate'),
				'no_telp' => $this->input->post('no_telp'),
				'foto' => $image,
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Registrasi Berhasil!,Silahkan Login
		  </div>');
			redirect('auth');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Logout!
	  </div>');
		redirect('');
	}
}
