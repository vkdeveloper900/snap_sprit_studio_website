@extends('admin.layouts.app')

@section('title', 'Testimonials Management')

@section('content')
    <div class="testimonials-admin">
        <div class="header">
            <h1>Testimonials</h1>
            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Add New</a>
        </div>

        <table class="table">
            <!-- Testimonials List -->
        </table>
    </div>
@endsection
