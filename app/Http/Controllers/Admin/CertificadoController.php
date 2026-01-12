<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CertificadoController extends Controller
{
    public function index()
    {
        return view('admin.certificados.index');
    }
}
