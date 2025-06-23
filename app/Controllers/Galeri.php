<?php

namespace App\Controllers;

use App\Models\EbookModel;

class Galeri extends BaseController
{
    public function index()
    {
        $model = new EbookModel();
        $data['tugas'] = $model->orderBy('created_at', 'DESC')->findAll();

        return view('galeri/index', $data);
    }
    public function detail($id)
    {
        $model = new EbookModel();
        $data['tugas'] = $model->find($id);

        if (!$data['tugas']) {
            return redirect()->to('/galeri')->with('error', 'Tugas tidak ditemukan.');
        }

        return view('galeri/detail', $data);
    }
   public function cari()
    {
        $keyword = $this->request->getGet('q');

        $model = new EbookModel();
        $data['tugas'] = $model
            ->like('title', $keyword)
            ->orLike('description', $keyword)
            ->findAll();

        $data['keyword'] = $keyword;

        return view('galeri/index', $data);
    }

}
