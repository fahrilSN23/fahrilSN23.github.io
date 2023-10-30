<?php

namespace App\Models;

use CodeIgniter\Model;

class DownloadModel extends Model
{
    protected $table            = 'download';
    protected $primaryKey       = 'id_download';
    protected $returnType       = 'object';
    protected $allowedFields    = [];
}
