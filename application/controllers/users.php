<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
  public function new_user() {
    $this->load->view('users/new');
  }

  public function create() {
    var_dump($this->input->post());
    die();
  }
}

//end of main controller
