<?php
/* 
 * Author: Faraz Ali
 * Date: 28-Oct-2016
 * Time: 4:31 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses_Category_Model extends MY_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getName($id)
    {
        $data = $this->get('exp_cat_id', $id);
        if($data)
        {
            return $data[0]->exp_cat_name;
        }
        return 'deleted';
    }
}