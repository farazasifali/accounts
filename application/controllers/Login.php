<?php
/* 
 * Author: Faraz Ali
 * Date: 27-Oct-2016
 * Time: 4:59 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    private $auth, $user_model;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->library('Auth_Library');
        $this->auth = new Auth_Library();
        $this->user_model = new User_Model();
    }

    public function index()
    {
        if($this->auth->is_login())
        {
            redirect(site_url());
        }
        $this->load->view("login/login");
    }
    
    public function authanticate()
    {
        $data = $this->input->post();
        $username = isset($data['username']) && $data['username'] ? $data['username'] : false;
        $password = isset($data['password']) && $data['password'] ? md5($data['password']) : false;
        
        if($username && $password)
        {
            $row = $this->user_model->getUserLogin($username, $password);
            if($row)
            {
                $this->auth->loginSuccess($row);
            }
        }
        $this->auth->loginFail($username, $password);
    }
    
    public function logout()
    {
        $this->auth->logout();
    }
}