<?php
/* 
 * Author: Faraz Ali
 * Date: 27-Oct-2016
 * Time: 4:59 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses extends Controller {
    
    public function __construct() {
        parent::__construct();
        $this->title = "Expenses";
    }

    public function index()
    {
        $this->genratePagination($this->expenses_model, "Expenses/index", 'exp_id');
        $this->listView("expenses/list");
    }
    
    public function add()
    {
        $this->title .= " Add";
        $data = $this->input->post();
        if(isset($data) && is_array($data) && !empty($data))
        {
            if($this->expenses_model->insert($data)){
                redirect(site_url('Expenses'));
            }
            $this->data['formData'] = $data;
        }
        $this->data['expense_categories'] = $this->expenses_category_model->get_all();
        $this->data['expense_persons'] = $this->person_model->get_all();
        $this->formView("expenses/form_add");
    }
    
    public function update($id = false){
        $this->title .= " Update";
        $data = $this->input->post();
        if(isset($data) && is_array($data) && !empty($data))
        {
            if($this->expenses_model->update($data, 'exp_id', $id)){
                redirect(site_url('Expenses'));
            }
            $this->data['formData'] = $data;
        } else {
            if($id){
                $data = $this->expenses_model->get('exp_id', $id);
                $this->data['formData'] = array(
                    'exp_id' => $data[0]->exp_id,
                    'category' => $data[0]->exp_cat_id,
                    'person' => $data[0]->person_id,
                    'description' => $data[0]->exp_desc,
                    'amount' => $data[0]->exp_amount,
                );
            } else {
                redirect(site_url('Expenses'));
            }
        }
        $this->data['expense_categories'] = $this->expenses_category_model->get_all();
        $this->data['expense_persons'] = $this->person_model->get_all();
        $this->formView("expenses/form_update");
    }

    public function delete()
    {
        $this->expenses_model->delete();
        redirect(site_url('Expenses'));
    }
    
    public function expensesCategory()
    {
        $this->title .= " Categories";
        echo "Category";
    }
    
}