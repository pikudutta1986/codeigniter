<?php

namespace App\Controllers;

class PageController extends BaseController
{
    public function home()
    {
        return view('pages/home');
    }

    public function products()
    {
        return view('pages/products');
    }

    public function contact()
    {
        return view('pages/contact');
    }

    public function login()
    {
        return view('pages/login');
    }

    public function cart()
    {
        return view('pages/cart');
    }

    public function checkout()
    {
        return view('pages/checkout');
    }
}
