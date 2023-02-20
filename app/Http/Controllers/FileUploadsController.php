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

        if ($request->has('is_public') && $request->is_public === 'on') {
            if ($request->has('filename') && $request->filename != '') {
                $file = $file->storeAs(
                    'files',
                    $request->filename . '.' . $file->getClientOriginalExtension(),
                    'public'
                );

            } else {
                $file = $file->store('files', 'public');

            }

        } else {
            if ($request->has('filename') && $request->filename != '') {
                $file = $file->storeAs(
                    'files',
                    $request->filename . '.' . $file->getClientOriginalExtension()
                );

            } else {
                $file = $file->store('files');

            }

        }


        return back();
    }
}
