@extends('admin.layouts.app')

@section('title', 'Create Portfolio Item')

@section('content')
    <div class="portfolio-create">
        <h1>Create New Portfolio Item</h1>

        <form method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Portfolio Form Fields -->
        </form>
    </div>
@endsection
