<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadsController extends Controller
{
    public function store(Request $request) {

        if (!$request->hasFile('file')) {
            return back()->with('error', 'File not found. Please retry');
        }

        $file = $request->file('file');

        if ($request->has('filename')) {
            $file = $file->storeAs(
                'files',
                $request->filename . '.' . $file->getClientOriginalExtension());

        } else {
            $file = $file->store('files');

        }

        return $file;
    }
}
