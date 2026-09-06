@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
    <div class="testimonial-edit">
        <h1>Edit Testimonial</h1>

        <form method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Testimonial Form Fields -->
        </form>
    </div>
@endsection
