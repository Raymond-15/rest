<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_m extends CI_Model
{

  public function get($id = null)
  {
    if ($id === null) {
      $hasil = $this->db->get('barang_kategori')->result_array();
    } else {
      $hasil = $this->db->get_where('barang_kategori', ['id_kategori' => $id])->row_array();
    }
    return $hasil;
  }

  public function delete($id)
  {
    $this->db->delete('barang_kategori', ['id_kategori' => $id]);
    return $this->db->affected_rows();
  }

  public function create($data)
  {
    $this->db->insert('barang_kategori', $data);
    return $this->db->affected_rows();
  }

  public function update($data, $id)
  {
    $this->db->update('barang_kategori', $data, ['id_kategori' => $id]);
    return $this->db->affected_rows();
  }
}
  
  /* End of file Kategori_m.php */
