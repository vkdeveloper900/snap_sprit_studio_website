@extends('admin.layouts.app')

@section('title', 'Add Team Member')

@section('content')
    <div class="team-create">
        <h1>Add New Team Member</h1>

        <form method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Team Member Form Fields -->
        </form>
    </div>
@endsection
