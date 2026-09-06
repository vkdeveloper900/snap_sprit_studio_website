@extends('admin.layouts.app')

@section('title', 'Create Service')

@section('content')
    <div class="service-create">
        <h1>Create New Service</h1>

        <form method="POST">
            @csrf
            <!-- Service Form Fields -->
        </form>
    </div>
@endsection
