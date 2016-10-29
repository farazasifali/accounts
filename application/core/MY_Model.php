<?php
/* 
 * Author: Faraz Ali
 * Date: 28-Oct-2016
 * Time: 4:33 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    public $table;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function setTable($table)
    {
        $this->table = $table;
    }
    
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        if($this->db->affected_rows())
        {
            return $this->db->insert_id();
        }
        return false;
    }
    
    public function update($data, $column, $value)
    {
        $this->db->where($column, $value);
        $this->db->update($this->table, $data); 
        if($this->db->affected_rows())
        {
            return $value;
        }
        return false;
    }
    
    public function delete($column, $value)
    {
        $this->db->where($column, $value);
        $this->db->delete($this->table); 
        if($this->db->affected_rows())
        {
            return $value;
        }
        return false;
    }
}
