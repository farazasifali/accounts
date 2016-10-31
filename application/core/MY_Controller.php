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
    public  $title = "Accounts", //Title Of Page
            $description = "Daily Expense Manager", //Meta Description Of Page
            $keywords = "", //Meta Keywords Of Page
            $author = "Faraz A."; //Meta Author Data
    
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
    public  $data = array(), // Stores Data for view Array
            $view = ''; // Stores HTML Data for view Array
    
    public function __construct() {
        parent::__construct();
        $this->init();
        $this->output->enable_profiler(TRUE);
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
        $this->expenses_category_model->setTable('expense_category');
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
    
    /*
     * Function That load Template for listing data
     */
    public function listView($view){
        $this->view .= $this->load->view($view, $this->data, TRUE);
        $this->view .= $this->load->view("template/list-foot", $this->data, TRUE);
        $this->load->template("template/page");
    }
    
    /*
     * Function That load Template for from
     */
    public function formView($view){
        $this->view .= $this->load->view($view, $this->data, TRUE);
        $this->load->template("template/page");
    }
    
    /*
     * Function that create pagination
     * @param $totalrows, $perpageItem, $currentpage, base_url, $extraparameters if exists
     * @return pagination html as string
     */
    public function pagination($totalRows, $perPage, $currentPage, $base_url, $extraParameter = FALSE)
    {
        $totalPages = ceil($totalRows/$perPage);
        $output = false;
        if($totalPages >= $currentPage)
        {
            $output = "<ul class='pagination'>";

            if($currentPage > 1)
            {
                if($extraParameter)
                {
                    $url = $base_url.'?page='.($currentPage-1).'&per_page='.$perPage."&".$extraParameter;
                } else {
                    $url = $base_url.'?page='.($currentPage-1).'&per_page='.$perPage;
                }

                $output .= "<li class='prev'><a href='$url'>«</a></li>";
            }

            $counterI = $i = 1;

            if($currentPage%5 == 0)
            {
                $i = $currentPage - 2;
            } else {
                if($currentPage >= 5)
                {
                    $i = $currentPage - 2;
                }
            }

            for($i; $i <= $totalPages; $i++)
            {
                if($counterI <= 5 )
                {
                    if($extraParameter)
                    {
                        $url = $base_url.'?page='.$i.'&per_page='.$perPage."&".$extraParameter;
                    } else {
                        $url = $base_url.'?page='.$i.'&per_page='.$perPage;
                    }

                    if($i == $currentPage)
                    {
                        $output .= "<li class='active'><a href='$url'>$i</a></li>";
                    } else {
                        $output .= "<li><a href='$url'>$i</a></li>";
                    }
                }
                $counterI++;

            }
            if($currentPage < $totalPages)
            {
                if($extraParameter)
                {
                    $url = $base_url.'?page='.($currentPage+1).'&per_page='.$perPage."&".$extraParameter;
                } else {
                    $url = $base_url.'?page='.($currentPage+1).'&per_page='.$perPage;
                }
                $output .= "<li class='next'><a href='$url'>»</a></li>";
            }

            $output .= "</ul>";
        }
        return $output;
    }
    
    /*
     * Function that genrate pagination
     * and sets data to global view array
     * @param $model of table, $route Controller/method, $extraparameters if any
     */
    public function genratePagination($model, $route, $orderBy, $extraParameters = FALSE)
    {
        $page = isset($_GET['page']) && (int)($_GET['page']) ? $_GET['page'] : 1;
        $per_page = isset($_GET['per_page']) && (int)($_GET['per_page']) ? $_GET['per_page'] : 10;
        
        $this->data['total_records'] = $model->count_all();
        if($this->data['total_records'])
        {
            $baseUrl = site_url($route);
            $offset = (($page - 1) * $per_page);
            $this->data['showing'] = ((($per_page * $page) - $per_page) + 1).' - '.(($per_page * $page) > $this->data['total_records'] ? $this->data['total_records'] : ($per_page * $page)).' of '.$this->data['total_records'];
            $this->data['records'] = $model->paginate($offset, $per_page, $orderBy);
            $this->data["pagination"] = $this->pagination($this->data['total_records'], $per_page, $page, $baseUrl, $extraParameters);
        }
    }
}