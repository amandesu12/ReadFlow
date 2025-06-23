<?php

namespace App\Controllers;
use App\Models\UserModel;

class Profil extends BaseController
{
    public function index()
    {
        $userId = session('user.id');
        $model = new UserModel();
        $data['user'] = $model->find($userId);

        return view('profil/index', $data);
    }
    public function edit()
    {
        $userId = session('user.id');
        $model = new \App\Models\UserModel();

        $data['user'] = $model->find($userId); // ambil data user untuk edit

        return view('profil/edit', $data); // view form edit profil
    }

    public function update()
    {
        $userId = session('user.id');
        $model = new UserModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'bio'  => $this->request->getPost('bio'),
        ];

        // ✅ Perhatikan: TANPA "s"
        $file = $this->request->getFile('profile_pic');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('profile_pics', $newName);

            // ✅ Harus cocok dengan nama kolom di database
            $data['profile_pic'] = $newName;
        }

        $model->update($userId, $data);

        return redirect()->to('/profil')->with('success', 'Profil berhasil diperbarui!');
    }

}
