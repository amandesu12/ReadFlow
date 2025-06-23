<?php

namespace App\Controllers;
use App\Models\BookmarkModel;

class Bookmark extends BaseController
{
    public function index()
    {
        $userId = session('user.id');
        $db = \Config\Database::connect();

        $builder = $db->table('bookmarks');
        $builder->select('bookmarks.ebook_id, ebooks.*, users.name as uploader');
        $builder->join('ebooks', 'ebooks.id = bookmarks.ebook_id');
        $builder->join('users', 'users.id = ebooks.user_id');
        $builder->where('bookmarks.user_id', $userId);

        $query = $builder->get();

        $data['tugas'] = $query->getResultArray();
        return view('bookmark/index', $data);
    }


    public function tambah($id)
    {
    $userId = session('user.id');
    $model = new BookmarkModel();

    // Cek duplikat
    $cek = $model->where(['user_id' => $userId, 'ebook_id' => $id])->first();
    if (!$cek) {
        $model->insert([
            'user_id' => $userId,
            'ebook_id' => $id,
        ]);
    }

    return redirect()->back()->with('success', 'Tugas telah ditandai.');
    }

    public function hapus($id)
    {
        // Cek apakah bookmark ini milik user yang sedang login
        // Validasi ID
        $model = new BookmarkModel();
        $model->where('user_id', session('user.id'))
            ->where('ebook_id', $id) // ✅ sesuai dengan struktur tabel
            ->delete();


        return redirect()->to('/bookmark')->with('success', 'Bookmark berhasil dihapus!');
    }
}
