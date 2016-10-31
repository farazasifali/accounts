<?php
/* 
 * Author: Faraz Ali
 * Date: 27-Oct-2016
 * Time: 4:59 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->title = "Persons";
    }

    public function index()
    {
        $this->genratePagination($this->person_model, "Person/index", 'person_id');
        $this->listView("person/list");
    }
    
    public function add()
    {
        $this->title .= " Add";
        $data = $this->input->post();
        if(isset($data) && is_array($data) && !empty($data))
        {
            if($this->person_model->insert($data)){
                redirect(site_url('Person'));
            }
            $this->data['formData'] = $data;
        }
        $this->formView("person/form_add");
    }
    
    public function update($id = false){
        $this->title .= " Update";
        $data = $this->input->post();
        if(isset($data) && is_array($data) && !empty($data))
        {
            if($this->person_model->update($data, 'person_id', $id)){
                redirect(site_url('Person'));
            }
            $this->data['formData'] = $data;
        } else {
            if($id){
                $data = $this->person_model->get('person_id', $id);
                $this->data['formData'] = array('person_name' => $data[0]->person_name);
            } else {
                redirect(site_url('Person'));
            }
        }
        $this->formView("person/form_update");
    }

    public function delete()
    {
        $this->person_model->delete();
        redirect(site_url('person'));
    }
}