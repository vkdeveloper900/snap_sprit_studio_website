@extends('admin.layouts.app')

@section('title', 'Portfolio Management')

@section('content')
    <div class="portfolio-admin">
        <div class="header">
            <h1>Portfolio Items</h1>
            <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">Add New</a>
        </div>

        <table class="table">
            <!-- Portfolio List -->
        </table>
    </div>
@endsection
