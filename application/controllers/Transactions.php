<?php
/* 
 * Author: Faraz Ali
 * Date: 27-Oct-2016
 * Time: 4:59 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends Controller {
    
    public function index()
    {
        $this->load->template("transactions/view");
    }
    
}