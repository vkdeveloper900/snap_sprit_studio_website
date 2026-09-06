<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('admin.portfolio.index');
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        // Store portfolio item
    }

    public function edit($id)
    {
        return view('admin.portfolio.edit');
    }

    public function update(Request $request, $id)
    {
        // Update portfolio item
    }

    public function destroy($id)
    {
        // Delete portfolio item
    }
}
