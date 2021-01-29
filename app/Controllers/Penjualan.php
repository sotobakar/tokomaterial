<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PenjualanModel;

class Penjualan extends BaseController
{
  public function index()
  {
    $penjualan = new PenjualanModel();
    $data = [
      'list' => $penjualan->findAll(),
    ];
    session()->setFlashData('page', 'penjualan');
    session()->setFlashData('section', 'show_penjualan');
    return view('penjualan/list_penjualan', $data);
  }

  public function create()
  {
    $barang = new BarangModel();
    $data = [
      'list' => $barang->findAll()
    ];
    session()->setFlashData('page', 'penjualan');
    session()->setFlashData('section', 'create_penjualan');
    return view('penjualan/create_penjualan', $data);
  }

  public function store()
  {
    if (!$this->validate([
      'kode_penjualan' => 'required|alpha_numeric',
      'kode_barang' => 'required|alpha_numeric',
      'tanggal_transaksi' => 'required',
      'jumlah_terjual' => 'required|integer',
    ])) {
      return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    $form_data = $this->request->getPost();
    if (isset($form_data['submit'])) {
      $data = [
        'kode_penjualan' => $form_data['kode_penjualan'],
        'kode_barang' => $form_data['kode_barang'],
        'tanggal_transaksi' => $form_data['tanggal_transaksi'],
        'jumlah_terjual' => $form_data['jumlah_terjual'],
      ];
      $penjualan = new PenjualanModel();
      if ($penjualan->insert($data)) {
        session()->setFlashData('test', 'Penjualan berhasil dibuat');
        return redirect()->to(base_url(route_to('dashboard')));
      } else {
        session()->setFlashData('test_err', 'Penjualan gagal dibuat');
        return redirect()->to(base_url(route_to('dashboard')));
      }
    } else {
      echo "Not Found";
    }
  }
  //--------------------------------------------------------------------

}
