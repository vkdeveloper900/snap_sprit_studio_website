@extends('admin.layouts.app')

@section('title', 'Edit Service')

@section('content')
    <div class="service-edit">
        <h1>Edit Service</h1>

        <form method="POST">
            @csrf
            @method('PUT')
            <!-- Service Form Fields -->
        </form>
    </div>
@endsection
