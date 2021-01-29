<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PenjualanModel;

class Dashboard extends BaseController
{
  public function index()
  {
    // if (!logged_in()) {
    //   return redirect()->to(base_url(route_to('/')));
    // }
    $penjualan = new PenjualanModel();
    $barang = new BarangModel();
    if (in_groups('admin')) {
      $user_type = 'admin';
    } else {
      $user_type = 'member';
    }
    $jumlah_barang = $barang->countAll();
    $jumlah_penjualan = $penjualan->countAll();
    $where_month = "MONTH(tanggal_transaksi)=1";
    $penjualan_recent = $penjualan
      ->where($where_month)
      ->countAllResults();
    $context = [
      'username' => user()->username,
      'jumlah_barang' => $jumlah_barang,
      'jumlah_penjualan' => $jumlah_penjualan,
      'user_type' => $user_type,
      'penjualan_recent' => $penjualan_recent
    ];
    session()->setFlashData('page', 'dashboard');
    session()->remove('section');
    return view('admin/dashboard', $context);
  }
}
