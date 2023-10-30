<?php

namespace App\Models;

use CodeIgniter\Model;

class IdWebModel extends Model
{
    protected $table            = 'menu';
    protected $primaryKey       = 'id_menu';
    protected $returnType       = 'object';
    protected $allowedFields    = [];
}
