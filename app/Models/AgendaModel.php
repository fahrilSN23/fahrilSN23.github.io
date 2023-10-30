<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table            = 'agenda';
    protected $primaryKey       = 'id_agenda';
    protected $returnType       = 'object';
    protected $allowedFields    = [];
}
