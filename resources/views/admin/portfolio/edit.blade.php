@extends('admin.layouts.app')

@section('title', 'Edit Portfolio Item')

@section('content')
    <div class="portfolio-edit">
        <h1>Edit Portfolio Item</h1>

        <form method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Portfolio Form Fields -->
        </form>
    </div>
@endsection
