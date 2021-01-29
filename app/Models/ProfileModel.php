<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
  protected $table = 'profiles';

  protected $primaryKey = 'id';

  protected $allowedFields = ['id', 'name', 'age', 'jenis_kelamin', 'no_hp', 'bio'];
}
