<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        return view('admin.faqs.index');
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        // Store FAQ
    }

    public function edit($id)
    {
        return view('admin.faqs.edit');
    }

    public function update(Request $request, $id)
    {
        // Update FAQ
    }

    public function destroy($id)
    {
        // Delete FAQ
    }
}
