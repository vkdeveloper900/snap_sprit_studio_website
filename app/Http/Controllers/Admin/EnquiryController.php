<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        return view('admin.enquiries.index');
    }

    public function show($id)
    {
        return view('admin.enquiries.show');
    }

    public function update(Request $request, $id)
    {
        // Update enquiry status
    }

    public function destroy($id)
    {
        // Delete enquiry
    }
}
