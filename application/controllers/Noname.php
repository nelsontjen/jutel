<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Noname extends CI_Controller
{
    public function index()
    {
        $this->db->select('*');
        $this->db->from('hotel');

        $data['hotel'] = $this->db->get()->result_array();
        // var_dump($data);
        // die;
        // $data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
        $this->load->view("templates/header");
        $this->load->view('noname/index', $data);
    }
    public function filter_search()
    {
        $filter = $this->input->post('filter');
        $search = $this->input->post('search');
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
        $this->load->view("templates/header");
        $this->load->view('noname/index', $data);
    }
}
