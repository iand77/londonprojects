<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model {

	public $id;
	public $name;
    public $password;
    public $email;
    public $last_updated;
    public $created;
    
	public function get_last_ten_registered_users()
	{
		$query = $this->db->get('user', 10);
       	return $query->result();
	}

	public function create_user($name, $email, $password)
    {
    	$this->name = $name;
        $this->email = $email;
        $this->password = $this->_hash_password($password);
        
        return $this->db->insert('user', $this);
    }

    public function update_user($id, $name, $email, $password)
    {
    	$this->name = $name;
    	$this->email = $email;
    	$this->password = $password;
    	
        return $this->db->update('user', $this, array('id' => $id));
    }
    
    public function authenticate($email, $password)
    {
    	$this->db->from('user');
    	$this->db->where('email', $email);
    	$row = $this->db->get()->row();
    	if ($row)
    	{
    		if ($this->_verify_password_hash($password, $row->password)) 
    		{
    			return $row;
    		}
    	}
    	return false;
    }
    
    public function get_user_by_email($email)
    {
    	$this->db->from('user');
    	$this->db->where('email', $email);
    	return $this->db->get()->row();
    }
    
    public function get_user_by_id($id)
    {
    	$this->db->from('user');
    	$this->db->where('id', $id);
    	return $this->db->get()->row();
    }
    
    private function _hash_password($password) {
    	return password_hash($password, PASSWORD_BCRYPT);
    }
    
    private function _verify_password_hash($password, $hash) {
    	return password_verify($password, $hash);
    }

}