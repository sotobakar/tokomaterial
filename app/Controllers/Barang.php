<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
  public function index()
  {
    $barang = new BarangModel();
    $data = [
      'list' => $barang->findAll(),
    ];
    session()->setFlashData('page', 'barang');
    session()->setFlashData('section', 'show_barang');
    return view('barang/list_barang', $data);
  }

  public function create()
  {
    session()->setFlashData('page', 'barang');
    session()->setFlashData('section', 'create_barang');
    return view('barang/create_barang');
  }

  public function store()
  {
    if (!$this->validate([
      'kode_barang' => 'required|alpha_numeric',
      'nama_barang' => 'required|alpha_numeric_space',
      'satuan' => 'required|alpha_space',
      'harga' => 'required|integer',
      'stok' => 'required|integer',
    ])) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    $form_data = $this->request->getPost();
    if (isset($form_data['submit'])) {
      $data = [
        'kode_barang' => $form_data['kode_barang'],
        'nama_barang' => $form_data['nama_barang'],
        'satuan' => $form_data['satuan'],
        'harga' => $form_data['harga'],
        'stok' => $form_data['stok'],
      ];
      $barang = new BarangModel();
      if ($barang->insert($data)) {
        session()->setFlashData('test', 'Barang berhasil dibuat');
        return redirect()->to(base_url(route_to('dashboard')));
      } else {
        session()->setFlashData('test_err', 'Barang gagal dibuat');
        return redirect()->to(base_url(route_to('dashboard')));
      }
    } else {
      echo "Not Found";
    }
  }

  public function edit($id)
  {
    $barang = new BarangModel();
    $data = [
      'barang' => $barang->find($id),
    ];
    session()->setFlashData('page', 'barang');
    session()->setFlashData('section', 'show_barang');
    return view('barang/edit_barang', $data);
  }

  public function update($id)
  {
    if (!$this->validate([
      'kode_barang' => 'required|alpha_numeric',
      'nama_barang' => 'required|alpha_numeric_space',
      'satuan' => 'required|alpha_space',
      'harga' => 'required|integer',
      'stok' => 'required|integer',
    ])) {
      return redirect()->back()->with('errors', $this->validator->getErrors());
    }
    $form_data = $this->request->getPost();
    if (isset($form_data['submit'])) {
      $data = [
        'kode_barang' => $form_data['kode_barang'],
        'nama_barang' => $form_data['nama_barang'],
        'satuan' => $form_data['satuan'],
        'harga' => $form_data['harga'],
        'stok' => $form_data['stok'],
      ];
      $barang = new BarangModel();
      if ($barang->update($id, $data)) {
        session()->setFlashData('test', 'Barang berhasil diupdate');
        return redirect()->to(base_url(route_to('dashboard')));
      } else {
        session()->setFlashData('test_err', 'Barang gagal diupdate');
        return redirect()->to(base_url(route_to('dashboard')));
      }
    } else {
      echo "Not Found";
    }
  }

  public function delete($id)
  {
    $barang = new BarangModel();

    // Check
    if ($barang->find($id)) {
      $barang->delete($id);
      session()->setFlashData('test', 'Barang berhasil dihapus');
      return redirect()->to(base_url(route_to('dashboard/barang')));
    } else {
      session()->setFlashData('test_err', 'Barang gagal dihapus');
      return redirect()->to(base_url(route_to('dashboard/barang')));
    }
  }

  //--------------------------------------------------------------------

}
