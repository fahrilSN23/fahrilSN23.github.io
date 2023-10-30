<?php

namespace App\Models;

use CodeIgniter\Model;

class IdWebModel extends Model
{
    protected $table            = 'identitas';
    protected $primaryKey       = 'id_identitas';
    protected $returnType       = 'object';
    protected $allowedFields    = [];
}
