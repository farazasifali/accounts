<?php
/* 
 * Author: Faraz Ali
 * Date: 27-Oct-2016
 * Time: 4:59 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends Controller {
    
    public function index()
    {
        $employee = array(
            "emp_name" => "Kashif",
            "emp_salary" => "12000",
            "emp_designation" => "Internee Developer",
            "emp_contact" => "1234567",
            "emp_address" => "ABC Street"
        );
        $this->load->template("Employee/view");
    }
    
}