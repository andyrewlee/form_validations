<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
  public function create($post) {
    $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at)
              VALUES (?,?,?,?,?,?)";
    $values = array($post['first_name'], $post['last_name'], $post['email'],
                    md5($post['password']), date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
    return $this->db->query($query, $values);
  }

  public function find($id) {
    return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
  }
}
