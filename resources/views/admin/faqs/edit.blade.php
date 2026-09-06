@extends('admin.layouts.app')

@section('title', 'Edit FAQ')

@section('content')
    <div class="faq-edit">
        <h1>Edit FAQ</h1>

        <form method="POST">
            @csrf
            @method('PUT')
            <!-- FAQ Form Fields -->
        </form>
    </div>
@endsection
