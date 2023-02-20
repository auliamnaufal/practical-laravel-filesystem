<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadsController extends Controller
{
    public function store(Request $request) {
        return $request->file('file');
    }
}
