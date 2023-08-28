<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin_menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        // is_logged_in();
    }

    public function index()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'user' => $user,
            'title' => 'Manajemen Menu',
            'count_menu' => $this->db->query('SELECT * FROM user_menu WHERE is_deleted=0')->num_rows(),
            'count_submenu' => $this->db->query('SELECT * FROM user_sub_menu  WHERE is_deleted=0')->num_rows(),
            'count_submenu_active' => $this->db->query('SELECT * FROM user_sub_menu WHERE is_active=1 AND is_deleted=0')->num_rows(),
            'list_menu' => $this->db->query('SELECT * FROM user_menu WHERE is_deleted=0 ORDER BY sort ASC')->result_array(),
            'css' => [
                'http://themes.test/front-dashboard/dist/assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css',
                'http://themes.test/front-dashboard/dist/assets/vendor/flatpickr/dist/flatpickr.min.css',
                'http://themes.test/front-dashboard/dist/assets/vendor/daterangepicker/daterangepicker.css',
                base_url('assets/vendor/iconpicker/dist/iconpicker.css?ver=' . time()),
                base_url('assets/css/pages/superadmin-menu.css?ver=' . time())
            ],
            'js_plugin' => [
                base_url('assets/vendor/appear/dist/appear.min.js'),
                base_url('assets/vendor/circles.js/circles.min.js'),
                base_url('assets/vendor/sortablejs/Sortable.min.js'),
                base_url('assets/vendor/iconpicker/dist/iconpicker.js?ver=' . time()),
            ],
            'js_plugin_init' => [
                base_url('assets/js/pages/superadmin-menu.js?ver=' . time()),
            ]
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('superadmin/menu', $data);
        $this->load->view('templates/footer', $data);
    }

    public function ajaxaddmenu()
    {
        $namamenu = $_POST['namaMenu'];
        $menuUrl = slugify($_POST['menuUrl']);

        // CEK DUPLIKASI URL
        if ($this->db->get_where('user_menu', ['slug' => $menuUrl, 'is_deleted' => 0])->num_rows() == 0) {
            $data = [
                'menu' => $namamenu,
                'slug' => $menuUrl,
                'sort' => $this->db->get_where('user_menu', ['is_deleted' => 0])->num_rows(),
                'is_deleted' => 0
            ];

            if ($this->db->insert('user_menu', $data)) {
                $data['submenu'] = 0;
                $data['id'] = $this->db->insert_id();
                $return = [
                    'status' => 200,
                    'success' => true,
                    'detail' => 'Menu baru berhasil disimpan.',
                    'data' => $data
                ];
            } else {
                $return = [
                    'status' => 500,
                    'success' => false,
                    'detail' => 'Kendala server',

                ];
            }
        } else {
            $return = [
                'status' => 200,
                'success' => false,
                'detail' => 'Slug telah digunakan!',

            ];
        }

        echo json_encode($return);
    }

    public function ajaxeditmenu()
    {
        $menuId = $_POST['menuId'];
        $menuName = $_POST['namaMenu'];
        $menuUrl = slugify($_POST['menuUrl']);

        // CEK DUPLIKASI URL
        if ($this->db->query("SELECT * FROM user_menu WHERE slug='$menuUrl' AND NOT id='$menuId'")->num_rows() == 0) {
            $this->db->set('menu', $menuName);
            $this->db->set('slug', $menuUrl);
            $this->db->where('id', $menuId);
            if ($this->db->update('user_menu')) {
                $return = [
                    'status' => 200,
                    'success' => true,
                    'detail' => 'Menu baru berhasil disimpan.',
                    'data' => ['slug' => $menuUrl]
                ];
            } else {
                $return = [
                    'status' => 500,
                    'success' => false,
                    'detail' => 'Kendala server',
                ];
            }
        } else {
            $return = [
                'status' => 200,
                'success' => false,
                'detail' => 'Slug sudah terpakai!',
            ];
        }
        echo json_encode($return);
    }

    public function ajaxdeletemenu()
    {
        $menuId = $_POST['menuId'];

        // CEK APAKAH PUNYA SUBMENU
        if ($this->db->query("SELECT * FROM user_sub_menu WHERE menu_id='$menuId' AND is_deleted=0")->num_rows() == 0) {
            // GET menu deleted
            $menu = $this->db->get_where('user_menu', ['id' => $menuId])->row_array();

            // UPDATE SORT UNTUK MENU TERDAMPAK
            $countmenu = $this->db->get_where('user_menu', ['is_deleted' => 0])->num_rows();
            $terdampak = [];
            for ($i = $menu['sort'] + 1; $i <= $countmenu - 1; $i++) {
                $menuterdampak = $this->db->get_where('user_menu', ['sort' => $i, 'is_deleted' => 0])->row_array();
                $this->db->set('sort', $i - 1);
                $this->db->where('id', $menuterdampak['id']);
                $this->db->update('user_menu');
                array_push($terdampak, $menuterdampak);
            }

            $this->db->set(['is_deleted' => 1, 'sort' => 99999]);
            $this->db->where('id', $menuId);
            if ($this->db->update('user_menu')) {
                $return = [
                    'status' => 200,
                    'success' => true,
                    'detail' => 'Menu berhasil dihapus.',
                    'data' => $terdampak
                ];
            } else {
                $return = [
                    'status' => 500,
                    'success' => false,
                    'detail' => 'Kendala server',
                ];
            }
        } else {
            $return = [
                'status' => 200,
                'success' => false,
                'detail' => 'Menu gagal dihapus karena memiliki sub menu.',
            ];
        }
        echo json_encode($return);
    }

    public function ajaxsortingmenu()
    {
        $old = $_POST['oldIndex'];
        $new = $_POST['newIndex'];

        if ($old < $new) {
            $start = $old + 1;
            $end = $new;
            $action = 'minus';
        } else {
            $start = $new;
            $end = $old - 1;
            $action = 'plus';
        }
        // SELECT MENU FROM OLD INDEX
        $menu = $this->db->get_where('user_menu', ['sort' => $old, 'is_deleted' => 0])->row_array();
        for ($i = $start; $i <= $end; $i++) {
            // UPDATE INDEX UNTUK MENU TERDAMPAK
            $menuterdampak = $this->db->get_where('user_menu', ['sort' => $i, 'is_deleted' => 0])->row_array();
            if ($action == 'plus') {
                $this->db->set('sort', $i + 1);
                $this->db->where('id', $menuterdampak['id']);
                $this->db->update('user_menu');
            } else {
                $this->db->set('sort', $i - 1);
                $this->db->where('id', $menuterdampak['id']);
                $this->db->update('user_menu');
            }
        }
        // UPDATE INDEX UNTUK MENU SELECTED
        $this->db->set('sort', $new);
        $this->db->where('id', $menu['id']);
        $this->db->update('user_menu');

        echo json_encode($_POST);
    }

    public function ajaxgetsubmenu()
    {
        $menuid = $_POST['menuId'];
        $submenu = $this->db->query("SELECT * FROM user_sub_menu WHERE menu_id=$menuid AND is_deleted=0 ORDER BY sort ASC")->result_array();
        for ($i = 0; $i < count($submenu); $i++) {
            if ($submenu[$i]['type'] != 'external') {
                $submenu[$i]['url'] = base_url($submenu[$i]['url']);
            }
            $submenu[$i]['url_show'] = substr($submenu[$i]['url'], 0, 20) . '...';
        }
        echo json_encode($submenu);
    }

    public function ajaxsortingsubmenu()
    {
        $old = $_POST['oldIndex'];
        $new = $_POST['newIndex'];
        $menuId = $_POST['menuId'];

        if ($old < $new) {
            $start = $old + 1;
            $end = $new;
            $action = 'minus';
        } else {
            $start = $new;
            $end = $old - 1;
            $action = 'plus';
        }
        // SELECT SUBMENU FROM OLD INDEX
        $submenu = $this->db->get_where('user_sub_menu', ['menu_id' => $menuId, 'sort' => $old, 'is_deleted' => 0])->row_array();
        for ($i = $start; $i <= $end; $i++) {
            // UPDATE INDEX UNTUK SUBMENU TERDAMPAK
            $menuterdampak = $this->db->get_where('user_sub_menu', ['menu_id' => $menuId, 'sort' => $i, 'is_deleted' => 0])->row_array();
            if ($action == 'plus') {
                $this->db->set('sort', $i + 1);
                $this->db->where('id', $menuterdampak['id']);
                $this->db->update('user_sub_menu');
            } else {
                $this->db->set('sort', $i - 1);
                $this->db->where('id', $menuterdampak['id']);
                $this->db->update('user_sub_menu');
            }
        }
        // UPDATE INDEX UNTUK MENU SELECTED
        $this->db->set('sort', $new);
        $this->db->where('id', $submenu['id']);
        $this->db->update('user_sub_menu');

        echo json_encode($_POST);
    }

    public function ajaxswitchsubmenu()
    {
        $submenuid = $_POST['subMenuId'];
        $is_active = $_POST['activeSwitch'];

        if ($is_active == 'false') {
            $isi = 0;
        } else {
            $isi = 1;
        }
        $this->db->set('is_active', $isi);
        $this->db->where('id', $submenuid);
        $this->db->update('user_sub_menu');

        $submenu = $this->db->get_where('user_sub_menu', ['is_deleted' => 0])->num_rows();
        $submenuActive = $this->db->get_where('user_sub_menu', ['is_active' => 1, 'is_deleted' => 0])->num_rows();
        $submenu_percent = ($submenuActive / $submenu) * 100;
        $return = [
            'submenu' => $submenu,
            'submenu_active' => $submenuActive,
            'submenu_percent' => $submenu_percent,
        ];
        echo json_encode($return);
    }

    public function ajaxdeletesubmenu()
    {
        $submenuid = $_POST['submenuId'];

        // GET submenu deleted
        $submenu = $this->db->get_where('user_sub_menu', ['id' => $submenuid])->row_array();

        // UPDATE SORT UNTUK MENU TERDAMPAK
        $countsubmenu = $this->db->get_where('user_sub_menu', ['menu_id' => $submenu['menu_id'], 'is_deleted' => 0])->num_rows();
        $terdampak = [];
        for ($i = $submenu['sort'] + 1; $i <= $countsubmenu - 1; $i++) {
            $submenuterdampak = $this->db->get_where('user_sub_menu', ['menu_id' => $submenu['menu_id'], 'sort' => $i, 'is_deleted' => 0])->row_array();
            $this->db->set('sort', $i - 1);
            $this->db->where('id', $submenuterdampak['id']);
            $this->db->update('user_sub_menu');
            array_push($terdampak, $submenuterdampak);
        }

        $this->db->set(['is_deleted' => 1, 'sort' => 99999]);
        $this->db->where('id', $submenuid);
        if ($this->db->update('user_sub_menu')) {
            $return = [
                'status' => 200,
                'success' => true,
                'detail' => 'Menu berhasil dihapus.',
                'data' => $terdampak
            ];
        } else {
            $return = [
                'status' => 500,
                'success' => false,
                'detail' => 'Kendala server',
            ];
        }

        echo json_encode($return);
    }

    public function ajaxaddsubmenu()
    {
        $menuId = $_POST['menuId'];
        // get menu
        $menu = $this->db->get_where('user_menu', ['id' => $menuId])->row_array();
        $submenuName = $_POST['submenuName'];
        $submenuIcon = $_POST['submenuIcon'];
        if ($_POST['submenuType'] == 0) {
            $submenuType = 'internal';
            $submenuSlug = $menu['slug'] . '/' . $_POST['submenuSlug'];
        } else {
            $submenuType = 'external';
            $submenuSlug = $_POST['submenuSlug'];
        }
        $submenuTarget = $_POST['submenuTarget'];



        // count submenu
        $countsubmenu = $this->db->get_where('user_sub_menu', ['menu_id' => $menuId, 'is_deleted' => 0])->num_rows();

        $datainsert = [
            'menu_id' => $menuId,
            'title' => $submenuName,
            'type' => $submenuType,
            'url' => $submenuSlug,
            'target' => $submenuTarget,
            'icon' => $submenuIcon,
            'sort' => $countsubmenu,
            'is_active' => 1,
            'is_deleted' => 0
        ];

        if ($this->db->insert('user_sub_menu', $datainsert)) {
            $datainsert['id'] = $this->db->insert_id();
            $return = [
                'status' => 200,
                'success' => true,
                'detail' => 'Menu baru berhasil disimpan.',
                'data' => $datainsert
            ];
        } else {
            $return = [
                'status' => 500,
                'success' => false,
                'detail' => 'Kendala server',

            ];
        }
        echo json_encode($return);
    }

    public function ajaxgetsubmenudetail()
    {
        $submenuId = $_POST['submenuId'];
        $submenu = $this->db->get_where('user_sub_menu', ['id' => $submenuId])->row_array();

        $menu = $this->db->get_where('user_menu', ['id' => $submenu['menu_id']])->row_array();

        if ($submenu['type'] == 'internal') {
            $url = explode('/', $submenu['url']);
            $submenu['menuslug'] = $menu['slug'];
            $submenu['url'] = $url[1];
        } else {
            $submenu['menuslug'] = $menu['slug'];
        }



        echo json_encode($submenu);
    }

    public function ajaxeditsubmenu()
    {
        $submenuId = $_POST['submenuId'];
        $submenuName = $_POST['submenuName'];
        $submenuIcon = $_POST['submenuIcon'];
        $submenuType = $_POST['submenuType'];
        $submenuSlug = $_POST['submenuSlug'];
        $submenuTarget = $_POST['submenuTarget'];

        $data = [
            'title' => $submenuName,
            'type' => $submenuType,
            'url' => $submenuSlug,
            'target' => $submenuTarget,
            'icon' => $submenuIcon,
        ];

        $this->db->set($data);
        $this->db->where('id', $submenuId);
        if ($this->db->update('user_sub_menu')) {
            $data['id'] = $submenuId;
            $submenu = $this->db->get_where('user_sub_menu', ['id' => $submenuId])->row_array();
            $return = [
                'status' => 200,
                'success' => true,
                'detail' => 'Perubahan berhasil disimpan.',
                'data' => $submenu
            ];
        } else {
            $return = [
                'status' => 500,
                'success' => false,
                'detail' => 'Kendala server',
            ];
        }
        echo json_encode($return);
    }
}
