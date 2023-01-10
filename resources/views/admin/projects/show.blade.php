@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="mt-5">
            <a href="{{ route('admin.projects.index') }}">Back to all</a>
        </div>
        <div>
            <h1 class="text-center mt-3">{{ $project->title }}</h1>

            <div class="d-flex justify-content-between mt-3">
                <h5>{{ $project->creation_year }}</h5>
                <p>{{ $project->slug }}</p>
            </div>

            <p class="mt-3">{{ $project->description }}</p>

            <div class="mt-3">
                <strong>Utilized programs:</strong>
                <span>{{ $project->utilized_programs }}</span>
            </div>
        </div>
    </div>
@endsection
