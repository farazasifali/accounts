<?php
/* 
 * Author: Faraz Ali
 * Date: 27-Oct-2016
 * Time: 4:59 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends Controller {
    
    public function index()
    {
        $this->title = "All Persons";
        $this->genratePagination($this->person_model, "Person/index");
        $this->load->template("person/view", $this->data);
    }
}