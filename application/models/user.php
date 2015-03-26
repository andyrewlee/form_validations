<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
  public function create($post) {
    $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at)
              VALUES (?,?,?,?,?,?)";
    $values = array($post['first_name'], $post['last_name'], $post['email'],
                    md5($post['password']), date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
    $id = $this->db->insert_id($this->db->query($query, $values));
    return $id;
  }

  public function find($id) {
    return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
  }

  public function validate($post) {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password_confirmation]');
    $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required');

    if($this->form_validation->run()) {
      return "valid";
    } else {
      return array(validation_errors());
    }
  }
}
