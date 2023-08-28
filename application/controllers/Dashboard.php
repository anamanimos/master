<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'user' => $user,
            'title' => 'Dashboard',
            'css' => [
                ''
            ],
            'js_plugin' => [
                ''
            ],
            'js_plugin_init' => [
                ''
            ]
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/content', $data);
        $this->load->view('templates/footer', $data);
    }
}
