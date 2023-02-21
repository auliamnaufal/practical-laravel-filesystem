<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FileUploadsController extends Controller
{
    public function store(Request $request): RedirectResponse
    {

        if (!$request->hasFile('file')) {
            return back()->with('error', 'File not found. Please retry');
        }

        $file = $request->file('file');

        if ($request->has('filename') && $request->filename != '') {
            $file = $file->storeAs(
                'files/',
                $request->filename . '.' . $file->getClientOriginalExtension(),
                $request->is_cloud == 'on' ? 's3' : 'public'
            );

        } else {
            $file = $file->store('files/', $request->is_cloud == 'on' ? 's3' : 'public');

        }


        return back();
    }
}
