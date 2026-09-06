@extends('admin.layouts.app')

@section('title', 'Add FAQ')

@section('content')
    <div class="faq-create">
        <h1>Add New FAQ</h1>

        <form method="POST">
            @csrf
            <!-- FAQ Form Fields -->
        </form>
    </div>
@endsection
