<?php


defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Kategori extends RestController
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Kategori_m', 'kat_m');
  }

  public function index_get()
  {
    $id = $this->get('id');
    if ($id === null) {
      $kategori = $this->kat_m->get();
    } else {
      $kategori = $this->kat_m->get($id);
    }
    if ($kategori) {
      # code...
      $this->set_response([
        'status' => true,
        'data'   => $kategori,
        'message' => 'Success'
      ], RestController::HTTP_OK);
    } else {
      $this->set_response([
        'status' => false,
        'message' => 'Data not found'
      ], RestController::HTTP_NOT_FOUND);
    }
  }

  public function index_delete()
  {
    $id = $this->delete('id');

    if ($id === null) {
      $this->set_response([
        'status' => false,
        'message' => 'Provide id'
      ], RestController::HTTP_BAD_REQUEST);
    } else {
      if ($this->kat_m->delete($id) > 0) {
        $this->set_response([
          'status' => true,
          'message' => 'data berhasil dihapus'
        ], RestController::HTTP_NOT_FOUND);
      } else {
        $this->set_response([
          'status' => false,
          'message' => 'id tidak ditemukan'
        ], RestController::HTTP_NOT_FOUND);
      }
    }
  }

  public function index_post()
  {
    $post = $this->post();
    $data = [
      'id_kategori' => uniqid(),
      'nama_kat' => $post['nama_kategori']
    ];

    if ($this->kat_m->create($data) > 0) {
      $this->set_response([
        'status' => true,
        'message' => 'berhasil tambah kategori'
      ], RestController::HTTP_CREATED);
    } else {
      $this->set_response([
        'status' => false,
        'message' => 'gagal tambah kategori'
      ], RestController::HTTP_BAD_REQUEST);
    }
  }

  public function index_put()
  {
    $id = $this->put('id');
    $put = $this->put();
    $data = [
      'nama_kat' => $put['nama_kategori']
    ];

    if ($this->kat_m->update($data, $id) > 0) {
      $this->set_response([
        'status' => true,
        'message' => 'berhasil ubah kategori'
      ], RestController::HTTP_OK);
    } else {
      $this->set_response([
        'status' => false,
        'message' => 'gagal ubah kategori'
      ], RestController::HTTP_BAD_REQUEST);
    }
  }
}
/** End of file Kategori.php **/
