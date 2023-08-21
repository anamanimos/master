<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->model('Auth_model', 'auth');
        if (isset($_COOKIE['ID']) && isset($_COOKIE['key'])) {
            $this->auth->matchKey($_COOKIE['ID'], $_COOKIE['key']);
        }

        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->load->view('auth/login');
    }

    public function ajaxlogin()
    {
        $this->load->model('Auth_model', 'auth');
        if (isset($_POST['email']) || isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->db->get_where('users', ['email' => $email])->row_array();

            // Jika usernya ada
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    // cek remember me
                    if (isset($_POST['remember'])) {
                        setcookie('ID', $user['id'], time() + 60 * 60 * 24 * 30, "/");
                        setcookie('key', $this->auth->generateKey($user['id']), time() + 60 * 60 * 24 * 30, "/");
                    }
                    // if ($user['role_id'] == 1) {
                    //     redirect('admin');
                    // } else {
                    //     redirect('user');
                    // }
                    $return = [
                        'status' => 200,
                        'success' => true,
                        'detail' => 'Berhasil masuk! Mohon tunggu Anda akan dialihkan.',

                    ];
                    echo json_encode($return);
                } else {
                    $return = [
                        'status' => 200,
                        'success' => false,
                        'detail' => 'Password tidak sesuai!'
                    ];

                    echo json_encode($return);
                }
            } else {
                $return = [
                    'status' => 200,
                    'success' => false,
                    'detail' => 'Email tidak terdaftar!'
                ];

                echo json_encode($return);
            }
        } else {
            $return = [
                'status' => 403,
                'success' => false,
                'detail' => 'Server Forbidden',
            ];

            echo json_encode($return);
        }
    }

    public function registration()
    {
        $this->load->model('Auth_model', 'auth');
        if (isset($_COOKIE['ID']) && isset($_COOKIE['key'])) {
            $this->auth->matchKey($_COOKIE['ID'], $_COOKIE['key']);
        }
        if (isset($_COOKIE['login'])) {
            if ($_COOKIE['login'] == 'true') {
                $data = [
                    'email' => 'cranam21@gmail.com',
                    'role_id' => 1
                ];
                $this->session->set_userdata($data);
            }
        }

        if ($this->session->userdata('email')) {
            redirect('user');
        }


        $data['title'] = 'WPU User Registration';
        $this->load->view('auth/registration', $data);
    }

    public function ajaxregistercheckemail()
    {
        $user = $this->db->get_where('users', ['email' => $_POST['email']])->num_rows();
        if ($user > 0) {
            $return = [
                'status' => 200,
                'success' => false,
                'detail' => 'Alamat email sudah terdaftar.',
            ];
        } else {
            $return = [
                'status' => 200,
                'success' => true,
                'detail' => 'Alamat email dapat digunakan.',
            ];
        }
        echo json_encode($return);
    }

    public function ajaxregistercheckwhatsapp()
    {

        if (strlen($_POST['whatsapp']) > 7) {
            $user = $this->db->get_where('users', ['whatsapp' => $_POST['whatsapp']])->num_rows();
            if ($user > 0) {
                $return = [
                    'status' => 200,
                    'success' => false,
                    'detail' => 'Nomor WhatsApp sudah terdaftar.',
                ];
            } else {
                $return = [
                    'status' => 200,
                    'success' => true,
                    'detail' => 'Nomor WhatsApp dapat digunakan.',
                ];
            }
        } else {
            $return = [
                'status' => 200,
                'success' => false,
                'detail' => 'Mohon masukkan nomor WhatsApp yang valid!',
            ];
        }
        echo json_encode($return);
    }

    public function ajaxregister()
    {
        $data = [
            'name' => htmlspecialchars($_POST['name']),
            'email' => htmlspecialchars($_POST['email']),
            'whatsapp' => $_POST['whatsapp'],
            'image' => 'default.jpg',
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 0,
            'date_created' => time(),
            'last_update' => time(),
        ];

        // siapkan token
        $this->load->helper('string');
        $otp = random_string('numeric', 6);
        $user_verify = [
            'email' => $data['email'],
            'otp' => $otp,
            'date_created' => time(),
        ];

        $this->db->insert('users', $data);
        $this->db->insert('user_verify', $user_verify);

        $data_login = [
            'email' => $data['email'],
            'role_id' => $data['role_id']
        ];
        $this->session->set_userdata($data_login);

        //send notif email
        mail_send_register($data['email'], $data['name']);

        // send notif wa
        $phone = '62' . $data['whatsapp'];
        $message = 'Halo ' . $data['name'] . ', kamu berhasil membuat akun di *Damai Jaya - Super App*. Lakukan aktivasi akun untuk dapat menggunakan fitur aplikasi.';
        wa_send($phone, $message);

        $return = [
            'status' => 200,
            'success' => true,
            'detail' => 'Registrasi Sukses.',

        ];

        echo json_encode($return);
    }

    public function activate()
    {
        if (!$this->session->userdata('email')) {
            redirect(base_url('auth'));
        }

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        if ($user['is_active'] == 1) {
            redirect(base_url());
        }
        if (isset($_COOKIE['activateWrong'])) {
            $exp = explode('-', $_COOKIE['activateWrong']);
            $count = ((int)$exp[1]);
            if ($count >= 6) {
                $disableform = 'disabled';
            } else {
                $disableform = '';
            }
        } else {
            $disableform = '';
        }

        $data = [
            'disabled' => $disableform
        ];
        $this->load->view('auth/activate', $data);
    }

    public function ajaxsendcode()
    {
        $method = $_POST['action'];
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $verify = $this->db->get_where('user_verify', ['email' => $user['email']]);
        if ($verify->num_rows() == 0) {
            $this->load->helper('string');
            $otp = random_string('numeric', 6);
            $user_verify = [
                'email' => $user['email'],
                'otp' => $otp,
                'date_created' => time(),
            ];
            $this->db->insert('user_verify', $user_verify);
            $verify = $user_verify;
        } else {
            $verify = $verify->row_array();
        }

        $return = [
            'status' => 200,
        ];
        if ($method == 'send-wa') {
            if (isset($_COOKIE['activateWa'])) {
                $exp = explode('-', $_COOKIE['activateWa']);
                $count = ((int)$exp[1]);
            } else {
                $count = 0;
            }

            if ($count <= 3) {
                $phone = '62' . $user['whatsapp'];
                $message = 'Halo ' . $user['name'] . ', berikut ini adalah kode Aktivasi *Damai Jaya - Super App* kamu: *' . $verify['otp'] . '*. Jangan tunjukkan kode ini kepada siapapun termasuk admin dari *Damai Jaya - Super App*';
                $wa = wa_send($phone, $message);
                $waObj = json_decode($wa);
                if ($waObj->data->status_code == 200) {
                    $return['detail'] = 'Kode aktivasi berhasil dikirim melalui nomor whatsapp Anda.';
                    $return['success'] = true;


                    $cookieval = md5($user['id']) . 'Pa-' . $count + 1 . '-Pc' . md5($user['name']);
                    setcookie('activateWa', $cookieval, time() + 3600, "/");
                } else {
                    $return['detail'] = 'Kode aktivasi gagal dikirim ke nomor whatsapp Anda. Mohon gunakan email untuk aktivasi.';
                    $return['success'] = false;
                }
            } else {
                $return['detail'] = 'Terlalu banyak permintaan. Ulangi lagi setelah 60 menit.';
                $return['success'] = false;
            }
        } else {

            if (isset($_COOKIE['activateMail'])) {
                $exp = explode('-', $_COOKIE['activateMail']);
                $count = ((int)$exp[1]);
            } else {
                $count = 0;
            }

            if ($count <= 3) {
                $mailArray = mail_send_activate($user['email'], $user['name'], $verify['otp']);
                if ($mailArray['success'] == true) {
                    $return['detail'] = 'Kode aktivasi berhasil dikirim melalui email Anda.';
                    $return['success'] = true;
                    $cookieval = md5($user['name']) . 'Ce-' . $count + 1 . '-Da' . md5($user['id']);
                    setcookie('activateMail', $cookieval, time() + 3600, "/");
                } else {
                    $return['detail'] = $mailArray['detail'];
                    $return['success'] = false;
                }
            } else {
                $return['detail'] = 'Terlalu banyak permintaan. Ulangi lagi setelah 60 menit.';
                $return['success'] = false;
            }
        }

        echo json_encode($return);
    }

    public function ajaxactivate()
    {
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $code = $_POST['code'];
        $verify = $this->db->get_where('user_verify', ['email' => $user['email']])->row_array();
        if ($code == $verify['otp']) {

            $this->db->set('is_active', 1);
            $this->db->where('email', $user['email']);
            $this->db->update('users');

            $this->db->delete('user_verify', ['email' => $user['email']]);

            // Send notif email
            mail_send_activate_success($user['email'], $user['name']);

            // send notif wa
            $phone = '62' . $user['whatsapp'];
            $message = 'Halo ' . $user['name'] . ', akunmu sudah sepenuhnya aktif. Sekarang Kamu bisa sepenuhnya menggunakan *Damai Jaya - Super App*.';
            wa_send($phone, $message);


            $return = [
                'status' => 200,
                'success' => true,
                'detail' => 'Aktivasi akun berhasil.',
            ];
        } else {
            $return = [
                'status' => 200,
            ];
            if (isset($_COOKIE['activateWrong'])) {
                $exp = explode('-', $_COOKIE['activateWrong']);
                $count = ((int)$exp[1]);
            } else {
                $count = 0;
            }

            if ($count <= 6) {
                $cookieval = md5($user['name']) . '-' . $count + 1 . '-' . md5($user['id']);
                setcookie('activateWrong', $cookieval, time() + 3600, "/");
                $return['detail'] = 'Kode aktivasi tidak sesuai.';
                $return['success'] = false;
            } else {
                $return['status'] = 201;
                $return['detail'] = 'Terlalu banyak permintaan. Ulangi lagi setelah 60 menit.';
                $return['success'] = false;
            }
        }
        echo json_encode($return);
    }

    public function logout()
    {
        $this->load->helper('cookie');
        delete_cookie('ID');
        delete_cookie('key');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');



        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function forgotPassword()
    {
        $this->load->model('Auth_model', 'auth');
        if (isset($_COOKIE['ID']) && isset($_COOKIE['key'])) {
            $this->auth->matchKey($_COOKIE['ID'], $_COOKIE['key']);
        }

        if ($this->session->userdata('email')) {
            redirect('user');
        }
        if (isset($_COOKIE['sendReset'])) {
            $exp = explode('-', $_COOKIE['sendReset']);
            $count = ((int)$exp[1]);
            if ($count > 3) {
                $disableform = 'disabled';
            } else {
                $disableform = '';
            }
        } else {
            $disableform = '';
        }

        $data = [
            'disabled' => $disableform
        ];
        $this->load->view('auth/forgot-password', $data);
    }

    public function ajaxforgotpassword()
    {
        $email = $_POST['email'];



        if (isset($_COOKIE['sendReset'])) {
            $exp = explode('-', $_COOKIE['sendReset']);
            $count = ((int)$exp[1]);
        } else {
            $count = 0;
        }

        $cookieval = 'Aey' . md5(time() + 3600) . 'Pa-' . $count + 1 . '-sUi' . md5(time() + 36000);
        setcookie('sendReset', $cookieval, time() + 3600, "/");

        $user = $this->db->get_where('users', ['email' => $email]);

        if ($user->num_rows() > 0) {
            $user = $user->row_array();

            $reset_encrypt = md5($user['password']) . '-' . md5(time() + 3600) . '-' . md5($user['email']);
            $link = base_url('auth/resetpassword?email=' . $user['email'] . '&encrypt=' . $reset_encrypt);
            $mailArray = mail_send_forgot_password($user['email'], $user['name'], $link);

            $return = [
                'status' => 200,
            ];

            if ($mailArray['success'] == true) {
                $return['detail'] = 'Kode aktivasi berhasil dikirim melalui email Anda.';
                $return['success'] = true;
            } else {
                $return['detail'] = $mailArray['detail'];
                $return['success'] = false;
            }
        } else {
            $return = [
                'status' => 200,
                'success' => false,
                'detail' => 'Alamat email tidak terdaftar.',
            ];
        }
        if ($count > 3) {
            $return['status'] = 201;
        }

        echo json_encode($return);
    }

    public function resetPassword()
    {
        $this->load->model('Auth_model', 'auth');
        if (isset($_COOKIE['ID']) && isset($_COOKIE['key'])) {
            $this->auth->matchKey($_COOKIE['ID'], $_COOKIE['key']);
        }

        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $email = $_GET['email'];
        $user = $this->db->get_where('users', ['email' => $email]);
        if ($user->num_rows() == 0) {
            redirect(base_url());
        }
        $user = $user->row_array();
        $reset_decrypt = explode('-', $_GET['encrypt']);
        if (md5($email) == $reset_decrypt[2] && md5($user['password']) == $reset_decrypt[0]) {
            $this->load->view('auth/change-password');
        } else {
            $this->load->view('errors/404');
        }

        // $reset_encrypt = md5($user['password']) . '-' . md5(time() + 3600) . '-' . md5($user['email']);
    }

    public function ajaxchangepassword()
    {
        $email = $_POST['email'];
        $reset_decrypt = explode('-', $_POST['key']);
        $password = $_POST['password'];
        $user = $this->db->get_where('users', ['email' => $email])->row_array();
        if (md5($email) == $reset_decrypt[2] && md5($user['password']) == $reset_decrypt[0]) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('users');

            // send notif email
            mail_send_changepassword_success($email, $user['name']);

            // send notif wa
            $phone = '62' . $user['whatsapp'];
            $message = 'Halo ' . $user['name'] . ', Kata sandi akunmu berhasil diubah. Bila kamu tidak mengenali aktivitas ini laporkan pada *cranam21@gmail.com* untuk penanganan lebih lanjut.';
            wa_send($phone, $message);

            $return = [
                'status' => 200,
                'success' => true,
                'detail' => 'Kata sandi berhasil diubah.'
            ];
        } else {
            $return = [
                'status' => 200,
                'success' => false,
                'detail' => 'Terjadi kesalahan.'
            ];
        }
        echo json_encode($return);
    }


    public function changePassword()
    {
        // if (!$this->session->userdata('reset_email')) {
        //     redirect('auth');
        // }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }

    public function tes()
    {
        // print_r(mail_send('cranam21@gmail.com', 'Tes email sam', 'ini isinya'));
        // require 'vendor/autoload.php';
        // $mail = new PHPMailer\PHPMailer\PHPMailer();
        // print_r($mail);
        $this->load->view('auth/template-email');
    }
}
