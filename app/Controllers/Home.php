<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home/home');
    }
    public function bookmark()
    {
        return view('bookmark');
    }

    public function forum()
    {
        return view('forum');
    }

    public function kategori()
    {
        return view('kategori');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function login()
    {
        return view('login');
    }
    
}
