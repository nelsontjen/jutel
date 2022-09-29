<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation', 'session', 'captcha');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Profile';
        // echo 'mantap '  . $data['user']['firstname'] . " " . $data['user']['lastname'];
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id = ' . $this->session->userdata('user_id'));
        $data['edit'] = $this->db->get()->result_array();
        // $data['buyProduct'] = $this->db->get_where('products', array(`add_to_cart` . '.' . `user_id` => $this->session->userdata(`user_id`), `add_to_cart` . '.' . `product_id` => `products` . '.' . `id`))->result_array();
        // print_r($data['buyProduct']);
        // die();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function menu()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu';
        $data['products_indonesia'] = $this->db->get_where('products', array('category_id' => 1))->result_array();
        $data['products_chinese'] = $this->db->get_where('products', array('category_id' => 2))->result_array();
        $data['products_western'] = $this->db->get_where('products', array('category_id' => 3))->result_array();
        $data['products_italian'] = $this->db->get_where('products', array('category_id' => 4))->result_array();
        // echo 'mantap '  . $data['user']['firstname'] . " " . $data['user']['lastname'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/menu', $data);
        $this->load->view('templates/footer', $data);
    }

    public function list_hotel()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'List Hotel';

        $this->db->select('*');
        $this->db->from('hotel');

        $data['hotel'] = $this->db->get()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/list_hotel', $data);
        $this->load->view('templates/footer', $data);
    }

    public function about()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'About Us';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/about', $data);
        $this->load->view('templates/footer', $data);
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

    public function Edit()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('bdate', 'Birthday Date', 'required');
        $this->form_validation->set_rules('no_telp', 'Phone Number', 'required|trim');
        if (!empty($_FILES["profilePhoto"]["name"])) {
            $image = $this->_uploadImage();
        } else {
            $image = $this->input->post("OldProfilePhoto");;
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
                'role_id' => 2,
                'is_active' => 1,
                'bdate' => $this->input->post('bdate'),
                'no_telp' => $this->input->post('no_telp'),
                'foto' => $image,
            ];
            $this->db->where('email', $this->session->userdata('email'));
            $this->db->update('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Data berhasil diganti
		  </div>');
            redirect('User');
        }
    }

    public function booking_awal()
    {
        $idHotel = $this->input->post('idHotel');
        $data['hotel'] = $this->db->get_where('hotel', array('id' => $idHotel))->result_array();
        // var_dump($hotel[0]);
        // die;
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'List Hotel';
        $this->form_validation->set_rules('tanggal_checkIn', 'Check In Date', 'required');
        $this->form_validation->set_rules('tanggal_checkOut', 'Check Out Date', 'required');
        $this->form_validation->set_rules('jumKamar', 'Jumlah Kamar', 'required');
        $data['kamar'] = $this->input->post('jumKamar');
        if ($this->input->post('tanggal_checkIn') !== null) {
            $data['checkIn'] = $this->input->post('tanggal_checkIn');
            $data['checkOut'] = $this->input->post('tanggal_checkOut');

            $data['hasil'] = strtotime($data['checkOut']) - strtotime($data['checkIn']);
            $data['hasil'] = $data['hasil'] / 86400;
            // var_dump($data['hasil']);
            // die;
        } else {
            $data['checkIn'] = null;
            $data['checkOut'] = null;
            $data['hasil'] = -1;
        }

        // var_dump($this->input->post());
        // die;
        if ($this->form_validation->run() == false || $data['checkOut'] < $data['checkIn'] || $data['kamar'] > $data['hotel'][0]['jumlah_kamar']) {
            if ($data['checkOut'] < $data['checkIn']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Tanggal Check Out harus lebih besar dari tanggal check in !
              </div>');
            }
            if ($data['kamar'] > $data['hotel'][0]['jumlah_kamar']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Kamar sudah habis atau jumlah kamar yang tersedia tidak mencukupi
              </div>');
            }
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/book_awal', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/book_confirm', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function book_confirmed()
    {
        $idHotel = $this->input->post('idHotel');
        $data['hotel'] = $this->db->get_where('hotel', array('id' => $idHotel))->result_array();
        // var_dump($hotel[0]);
        // die;
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'List Hotel';
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $variabel = array(
            'id_customer' => $this->session->userdata('user_id'),
            'id_hotel' => $idHotel,
            'tgl_checkIn' => $this->input->post('tanggal_checkIn'),
            'tgl_checkOut' => $this->input->post('tanggal_checkOut'),
            'tgl_order' => $now,
            'totalHarga' => $this->input->post('totHarga'),
            'kamar' => $this->input->post('jumKamar')
        );
        $this->db->insert('order_book', $variabel);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Order is successfully booked
              </div>');
        redirect(base_url('user/booking_list'));
    }

    public function booking_list()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Order / Booking';
        $this->db->select('*');
        $this->db->from('order_book');
        $this->db->where('order_book.id_customer', $this->session->userdata('user_id'));
        $this->db->join('hotel', 'hotel.id = order_book.id_hotel');
        $this->db->join('user', 'user.id = order_book.id_customer');
        $data['hotel'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/book_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function filter_search()
    {
        $filter = $this->input->post('filter');
        $search = $this->input->post('search');
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'List Hotel';

        if (isset($filter) && !empty($search)) {
            if ($filter == 'hargaMore') {
                $this->db->select('*');
                $this->db->from('hotel');
                $this->db->where('harga >=', $search);
                $data['hotel'] = $this->db->get()->result_array();
            } else if ($filter == 'hargaLess') {
                $this->db->select('*');
                $this->db->from('hotel');
                $this->db->where('harga <=', $search);
                $data['hotel'] = $this->db->get()->result_array();
            } else {
                $this->db->select('*');
                $this->db->from('hotel');
                $this->db->like($filter, $search);
                $data['hotel'] = $this->db->get()->result_array();
            }
        } else {
            $this->db->select('*');
            $this->db->from('hotel');
            $data['hotel'] = $this->db->get()->result_array();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/list_hotel', $data);
        $this->load->view('templates/footer', $data);
    }
}
