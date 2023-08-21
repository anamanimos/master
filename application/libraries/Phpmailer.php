<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Phpmailer
{
    public function __construct()
    {
        require 'vendor/autoload.php';
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
        $objMail = new PHPMailer\PHPMailer\PHPMailer();
        return $objMail;
    }
}
