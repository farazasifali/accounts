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
    
    public function get($column, $value)
    {
        $this->db->where($column, $value);
        $result = $this->db->get($this->table);
        if($result->num_rows() > 0)
        {
            return $result->result();
        }
        return false;
    }
    
    public function get_all()
    {
        $result = $this->db->get($this->table);
        return $result->result();
    }
    
    public function count_all()
    {
        return $this->db->count_all($this->table);
    }
    
    public function paginate($offset, $limit, $orderBy)
    {
        $this->db->limit($limit, $offset);
        $this->db->order_by($orderBy, "desc");
        $result = $this->db->get($this->table);
        if($result->num_rows() > 0)
        {
            return $result->result();
        }
        return false;
    }
}
