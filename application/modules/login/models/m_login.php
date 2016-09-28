<?php
class M_login extends MY_Model {

  function login($username, $password)
    {
      $this->db->select('username, password ,nama, auid');
      $this->db->from('user');
      $this->db->where('username', $username);
      $this->db->where('password', $password);
      $this->db->limit(1);
     
      $query = $this->db->get();

      if($query->num_rows()==1) {
        $result = $query->result();
       return $result;
      } else {
        return false;
      }
    }

  function getdata($username){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('username', $username);
    return $this->db->get();
  }   
}
?>