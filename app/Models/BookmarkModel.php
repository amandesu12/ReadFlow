<?php

namespace App\Models;

use CodeIgniter\Model;

class BookmarkModel extends Model
{
    protected $table = 'bookmarks';
    protected $allowedFields = ['user_id', 'ebook_id', 'task_id'];
    public $timestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

}
