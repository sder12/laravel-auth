@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div>
            <a href="{{ route('admin.projects.index') }}">Back to all</a>
        </div>
        <div class="mt-3">
            <h2>Edit </h2>
            <h4>{{ $project->title }}</h4>
        </div>
    </div>
@endsection
