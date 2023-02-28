<?php

namespace App\Controllers;

class RoutePrivate extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Página privada'
        ];

        return view('pages/private', $data);
    }
}
