<?php

namespace App\Controllers;

use App\Models\EbookModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new EbookModel();
        $userId = session('user.id');

        $data['tugas'] = $model->where('user_id', $userId)->orderBy('created_at', 'DESC')->findAll();
        return view('dashboard/index', $data);
    }
}
