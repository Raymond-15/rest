<?php


defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Barang extends RestController
{

  function __construct()
  {
    // Construct the parent class
    parent::__construct();
  }

  public function index_get()
  {
    $id = $this->get('id');
    if ($id) {
      $this->response([
        'status' => TRUE,
        'message' => 'id ada'
      ], RestController::HTTP_OK);
    } else {
      $this->response([
        'status' => TRUE,
        'message' => 'Success'
      ], RestController::HTTP_OK);
    }
    // Users from a data store e.g. database
  }
}
  
  /* End of file Barang.php */
