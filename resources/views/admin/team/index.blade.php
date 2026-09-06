@extends('admin.layouts.app')

@section('title', 'Team Management')

@section('content')
    <div class="team-admin">
        <div class="header">
            <h1>Team Members</h1>
            <a href="{{ route('admin.team.create') }}" class="btn btn-primary">Add New</a>
        </div>

        <table class="table">
            <!-- Team Members List -->
        </table>
    </div>
@endsection
