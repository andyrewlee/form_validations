<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
  public function new_user() {
    $this->load->view('users/new');
  }

  public function create() {
    $this->load->model('User');
    $result = $this->User->validate($this->input->post());

    if($result == "valid") {
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
