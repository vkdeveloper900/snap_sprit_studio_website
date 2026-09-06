@extends('admin.layouts.app')

@section('title', 'Edit Team Member')

@section('content')
    <div class="team-edit">
        <h1>Edit Team Member</h1>

        <form method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Team Member Form Fields -->
        </form>
    </div>
@endsection
