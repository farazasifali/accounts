<?php
/* 
 * Author: Faraz Ali
 * Date: 28-Oct-2016
 * Time: 4:31 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_Model extends MY_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function insert($data){
        if(isset($data['person_name']) && $data['person_name']){
            if($this->get('person_name', $data['person_name'])){
                setMessage('error', 'name must be unique.'); 
            } else {
                parent::insert(array(
                    "person_name" => $data['person_name']
                ));
                setMessage('success', 'New person has been added successfully');
                return true;
            }
        } else {
            setMessage('error', 'Name of a person is required.');
        }
        return false;
    }
    
    public function update($data, $coloum, $value){
        if(isset($data['person_name']) && $data['person_name']){
            if($this->get('person_name', $data['person_name'])){
                setMessage('error', 'can not update name must be unique.'); 
            } else {
                $array = array("person_name" => $data['person_name']);
                parent::update($array, $coloum, $value);
                setMessage('success', 'Person has been updated successfully');
                return true;
            }
        } else {
            setMessage('error', 'Name of a person is required.');
        }
        return false;
    }
    
    public function delete($coloum = 'person_id', $value = false)
    {
        $data = $this->input->post();
        if(isset($data['id']) && is_array($data['id'])){
            foreach ($data['id'] as $value){
                if($this->expenses_model->get('person_id', $value))
                {
                    setMessage('error', 'Connot delete because person have expenses');
                } else {
                    parent::delete($coloum, $value);
                    setMessage('success', 'Person Successfully Deleted.');
                }
            }
        } else {
            setMessage('error', 'Selection is Empty.');
        }
        return;
    }
    
    public function getName($id)
    {
        $data = $this->get('person_id', $id);
        if($data)
        {
            return $data[0]->person_name;
        }
        return 'deleted';
    }
}