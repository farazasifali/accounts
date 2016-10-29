<?php
/* 
 * Author: Faraz Ali
 * Date: 28-Oct-2016
 * Time: 5:25 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller
{
    //Properties That Contain Meta Deta
    public  $title = "", //Title Of Page
            $description = "", //Meta Description Of Page
            $keywords = "", //Meta Keywords Of Page
            $author = ""; //Meta Author Data
    
    //Properties That Contain Model Instances Of Application
    public  $user_model, //User Model instance
            $employee_model, //Employee Model instance
            $expenses_model, //Expenses Model instance
            $expenses_category_model, //Expenses Category Model instance
            $person_model, //Person Model instance
            $transaction_model, //Transaction Model instance
            $vendor_model, //Vendor Model instance
            $purchase_model, //Purchase Model instance
            $purchase_item_model, //Purchase Item Model instance
            $purchase_variant_model; //Purchase Variant Model instance
    
    //Properties That Contain Library Instances Of Application
    public  $auth; //Login User Auth Instance
            
    //Properties That Contain All Data For View
    public  $data = array(); // View Data Array
    
    public function __construct() {
        parent::__construct();
        $this->init();
    }
    
    //Fuction That Initialize Application Data
    private function init()
    {
        $this->loadModels();
        $this->assignTables();
        $this->loadLibraries();
        
        //Check Is User Is Login
        if(!$this->auth->is_login())
        {
            $this->auth->getLogin();
        }
    }
    
    //Function That Load And Store All Models Instances
    private function loadModels()
    {
        $models = array(
            "Employee_Model",
            "Expenses_Model",
            "Expenses_Category_Model",
            "Person_Model",
            "Transaction_Model",
            "User_Model",
            "Vendor_Model",
            "Purchase_Model",
            "Purchase_Item_Model",
            "Purchase_Variant_Model"
        );
        foreach($models as $model)
        {
            $this->load->model($model);
        }
        $this->assignModelInstance();
    }
    
    //Function That Assign Model Instance To Properties
    private function assignModelInstance()
    {
        $this->employee_model = new Employee_Model();
        $this->expenses_model = new Expenses_Model();
        $this->expenses_category_model = new Expenses_Category_Model();
        $this->person_model = new Person_Model();
        $this->transaction_model = new Transaction_Model();
        $this->user_model = new User_Model();
        $this->vendor_model = new Vendor_Model();
        $this->purchase_model = new Purchase_Model();
        $this->purchase_item_model = new Purchase_Item_Model();
        $this->purchase_variant_model = new Purchase_Variant_Model();
    }
    
    //Function That Assign Database Tables To Models
    private function assignTables()
    {
        $this->employee_model->setTable('employee');
        $this->expenses_model->setTable('expenses');
        $this->expenses_category_model->setTable('expenses_category');
        $this->person_model->setTable('persons');
        $this->transaction_model->setTable('transactions');
        $this->user_model->setTable('users');
        $this->vendor_model->setTable('vandor');
        $this->purchase_model->setTable('purchase');
        $this->purchase_item_model->setTable('purchase_item');
        $this->purchase_variant_model->setTable('purchase_variants');
    }
    
    //Function That Load Libraries And Assign Instance To Properties
    private function loadLibraries()
    {
        $this->load->library("Auth_Library");
        $this->auth = new Auth_Library();
    }
}