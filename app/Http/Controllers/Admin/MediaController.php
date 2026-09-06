<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        return view('admin.media.index');
    }

    public function upload(Request $request)
    {
        // Handle file upload
    }

    public function destroy($id)
    {
        // Delete media
    }
}
