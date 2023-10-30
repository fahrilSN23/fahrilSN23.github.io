<?php

namespace App\Models;

use CodeIgniter\Model;

class InfoModel extends Model
{
    protected $table            = 'sekilasinfo';
    protected $primaryKey       = 'id_sekilasinfo';
    protected $returnType       = 'object';
    protected $allowedFields    = [];
}
