<?php

namespace App\Controllers;

use App\Models\EbookModel;

class Tugas extends BaseController
{
    public function upload()
    {
        return view('tugas/upload');
    }

    public function uploadPost()
    {
        // Validasi file tugas (PDF)
        $file = $this->request->getFile('file');
        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'File tidak valid!');
        }

        // Simpan file PDF
        $filePDF = $this->request->getFile('file');
        $newName = $filePDF->getRandomName();
        $filePDF->move('uploads', $newName);

        // Simpan file cover (jika ada)
        $fileCover = $this->request->getFile('cover');
        $coverName = null;
        if ($fileCover && $fileCover->isValid() && !$fileCover->hasMoved()) {
            $coverName = $fileCover->getRandomName();
            $fileCover->move('covers', $coverName); // Folder "covers" harus dibuat manual di public/
        }

        // Simpan ke database
        $model = new EbookModel();
        $model->insert([
            'user_id'     => session('user.id'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'file'        => $newName,
            'cover'       => $coverName // <- ini tambahan
        ]);

        return redirect()->to('/dashboard')->with('success', 'Tugas berhasil diunggah!');
}

    public function edit($id)
    {
        $model = new EbookModel();
        $data['tugas'] = $model->where('id', $id)
            ->where('user_id', session('user.id'))
            ->first();
    
        if (!$data['tugas']) {
            return redirect()->to('/dashboard')->with('error', 'Tugas tidak ditemukan.');
        }
    
        return view('tugas/edit', $data);
    }
    
    public function update($id)
{
    $model = new EbookModel();
    
    // Pastikan data hanya milik user yg sedang login
    $existing = $model->where('id', $id)->where('user_id', session('user.id'))->first();
    if (!$existing) {
        return redirect()->to('/dashboard')->with('error', 'Tugas tidak ditemukan.');
    }

    // Ambil data dari form
    $data = [
        'title'       => $this->request->getPost('title'),
        'description' => $this->request->getPost('description'),
    ];

    // Cek apakah ada cover baru
    $fileCover = $this->request->getFile('cover');
    if ($fileCover && $fileCover->isValid() && !$fileCover->hasMoved()) {
        $coverName = $fileCover->getRandomName();
        $fileCover->move('covers', $coverName);
        $data['cover'] = $coverName;
    }

    // Update data lengkap
    $model->update($id, $data);

    return redirect()->to('/dashboard')->with('success', 'Tugas berhasil diperbarui!');
}

    
    public function delete($id)
    {
        $model = new EbookModel();
        $data = $model->where('id', $id)->where('user_id', session('user.id'))->first();
    
        if (!$data) {
            return redirect()->to('/dashboard')->with('error', 'Tugas tidak ditemukan.');
        }
    
        // hapus file fisik
        $filePath = FCPATH . 'uploads/' . $data['file'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    
        // hapus data
        $model->delete($id);
    
        return redirect()->to('/dashboard')->with('success', 'Tugas berhasil dihapus.');
    }
}
