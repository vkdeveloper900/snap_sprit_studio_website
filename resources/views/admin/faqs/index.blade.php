@extends('admin.layouts.app')

@section('title', 'FAQ Management')

@section('content')
    <div class="faqs-admin">
        <div class="header">
            <h1>FAQs</h1>
            <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">Add New</a>
        </div>

        <table class="table">
            <!-- FAQs List -->
        </table>
    </div>
@endsection
