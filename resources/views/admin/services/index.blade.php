@extends('admin.layouts.app')

@section('title', 'Services Management')

@section('content')
    <div class="services-admin">
        <div class="header">
            <h1>Services</h1>
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add New</a>
        </div>

        <table class="table">
            <!-- Services List -->
        </table>
    </div>
@endsection
