<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function generateKey($userid)
    {
        $user = $this->db->get_where('user', ['id' => $userid])->row_array();
        return md5($user['password']) . '-' . md5($user['email']) . '-' . md5($user['id']);
    }

    public function matchKey($userid, $key)
    {
        $user = $this->db->get_where('user', ['id' => $userid])->row_array();
        $trustedkey = md5($user['password']) . '-' . md5($user['email']) . '-' . md5($user['id']);
        if ($trustedkey == $key) {
            $data = [
                'email' => $user['email'],
                'role_id' => $user['role_id']
            ];
            $this->session->set_userdata($data);
        }
    }
}
