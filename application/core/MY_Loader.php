<?php
/* 
 * Author: Faraz Ali
 * Date: 27-Oct-2016
 * Time: 6:29 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader
{
    public function __construct() {
        parent::__construct();
    }
    
    public function template($view, $data = array(), $return = FALSE)
    {
        if($return)
        {
            $content = '';
            $content .= $this->view("common/header", $data, $return);
            $content .= $this->view("common/sidebar", $data, $return);
            $content .= $this->view($view, $data, $return);
            $content .= $this->view("common/footer", $data, $return);
            return $content;
        }
        $this->view("common/header", $data, $return);
        $this->view("common/sidebar", $data, $return);
        $this->view($view, $data, $return);
        $this->view("common/footer", $data, $return);
    }
}
