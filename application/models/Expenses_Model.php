<?php
/* 
 * Author: Faraz Ali
 * Date: 28-Oct-2016
 * Time: 4:31 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses_Model extends MY_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function insert($data){
        if(isset($data['amount']) && $data['amount']){
            parent::insert(array(
                "exp_cat_id" => $data['category'],
                "person_id" => $data['person'],
                "exp_desc" => $data['description'],
                "exp_amount" => $data['amount']
            ));
            setMessage('success', 'New expense has been added successfully');
            return true;
        } else {
            setMessage('error', 'Fill the form correctly.');
        }
        return false;
    }
    
    public function update($data, $coloum, $value){
        if(isset($data['amount']) && $data['amount']){
            $array = array(
                "exp_cat_id" => $data['category'],
                "person_id" => $data['person'],
                "exp_desc" => $data['description'],
                "exp_amount" => $data['amount']
            );
            parent::update($array, $coloum, $value);
            setMessage('success', 'Expense has been updated successfully');
            return true;
        } else {
            setMessage('error', 'Fill the form correctly.');
        }
        return false;
    }
    
    public function delete($coloum = 'exp_id', $value = false)
    {
        $data = $this->input->post();
        if(isset($data['id']) && is_array($data['id'])){
            foreach ($data['id'] as $value){
                parent::delete($coloum, $value);
                setMessage('success', 'Expense Successfully Deleted.');
            }
        } else {
            setMessage('error', 'Selection is Empty.');
        }
        return;
    }
}