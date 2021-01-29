<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
  protected $table = 'penjualan';

  protected $primaryKey = 'id';

  protected $allowedFields = ['kode_penjualan', 'kode_barang', 'nama_barang', 'satuan', 'tanggal_transaksi', 'jumlah_terjual'];
}
