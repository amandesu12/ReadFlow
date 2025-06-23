<?php

namespace App\Controllers;

use CodeIgniter\Controller as BaseController;

class Home extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    /**
     * Display the home page with recent tasks and statistics.
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function index()
{
    $model = new \App\Models\EbookModel();

    // 1 data terakhir
    $data['terakhir'] = $model->orderBy('id', 'DESC')->limit(5)->findAll();

    // Beberapa data rilis terbaru (misalnya 4)
    $data['terbaru'] = $model->orderBy('created_at', 'DESC')->limit(5)->findAll();

    // Top 5 uploader
    $data['uploaders'] = $model->select('users.name, COUNT(ebooks.id) as jumlah')
                               ->join('users', 'users.id = ebooks.user_id')
                               ->groupBy('users.id')
                               ->orderBy('jumlah', 'DESC')
                               ->findAll(5);

    // Rekomendasi 5 data terbaru
    $data['recommendations'] = $model->orderBy('id', 'DESC')->limit(5)->findAll();

    return view('home', $data);
}

    /**
     * Display the about page.
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function about()
    {
        return view('about');

    }
    public function developer()
    {
        return view('developer');
    }

}
