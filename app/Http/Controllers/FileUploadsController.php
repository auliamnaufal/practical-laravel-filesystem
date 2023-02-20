<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadsController extends Controller
{
    public function store(Request $request) {

        if (!$request->hasFile('file')) {
            return back()->with('error', 'File not found. Please retry');
        }

        $path = $request->file('file')->store('files');

        return $path;
    }
}
