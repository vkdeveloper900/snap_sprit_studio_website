@extends('admin.layouts.app')

@section('title', 'Add Testimonial')

@section('content')
    <div class="testimonial-create">
        <h1>Add New Testimonial</h1>

        <form method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Testimonial Form Fields -->
        </form>
    </div>
@endsection
