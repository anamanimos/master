<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
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
            'title' => 'Akun',
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

    public function setting()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'user' => $user,
            'title' => 'Pengaturan Akun',
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
