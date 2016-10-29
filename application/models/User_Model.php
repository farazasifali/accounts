<?php
/* 
 * Author: Faraz Ali
 * Date: 28-Oct-2016
 * Time: 4:31 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends MY_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getUserLogin($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = '$username' AND user_password = '$password'";
        $result = $this->db->query($sql);
        if($result->num_rows() == 1)
        {
            return $result->first_row();
        }
        return FALSE;
    }
    
}