<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        return view('admin.team.index');
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        // Store team member
    }

    public function edit($id)
    {
        return view('admin.team.edit');
    }

    public function update(Request $request, $id)
    {
        // Update team member
    }

    public function destroy($id)
    {
        // Delete team member
    }
}
