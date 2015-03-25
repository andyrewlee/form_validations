<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
  public function new_user() {
    $this->load->view('users/new');
  }

  public function create() {
    $this->load->model('User');

    $this->load->library('form_validation');
    $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password_confirmation]');
    $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required');

    if($this->form_validation->run()) {
      $id = $this->User->create($this->input->post());
      $success[] = 'Welcome! Registration was successful!';
      $this->session->set_flashdata('success', $success);
      redirect('/users/show/' . $id);
    } else {
      $errors = array(validation_errors());
      $this->session->set_flashdata('errors', $errors);
      redirect('/');
    }
  }

  public function show($id) {
    $this->load->model('User');

    $data['user'] = $this->User->find($id);
    $this->load->view('users/show', $data);
  }
}

//end of users controller
