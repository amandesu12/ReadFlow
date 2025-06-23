<?php

namespace App\Models;

use CodeIgniter\Model;

class EbookModel extends Model
{
    protected $table = 'ebooks';
    protected $allowedFields = ['user_id', 'title', 'description', 'file', 'cover'];
    protected $useTimestamps = true;

}
