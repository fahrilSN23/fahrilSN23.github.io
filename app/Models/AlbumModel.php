<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table            = 'album';
    protected $primaryKey       = 'id_album';
    protected $returnType       = 'object';
    protected $allowedFields    = [];
}
