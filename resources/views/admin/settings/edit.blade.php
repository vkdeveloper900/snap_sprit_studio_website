@extends('admin.layouts.app')

@section('title', 'Site Settings')

@section('content')
    <div class="settings-admin">
        <h1>Site Settings</h1>

        <form method="POST">
            @csrf
            @method('PUT')
            <!-- Settings Form Fields -->
        </form>
    </div>
@endsection
