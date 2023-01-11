@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h3 class="text-center">Projects</h3>

        <div class="row justify-content-center">
            <div class="col-8">


                {{-- MESSAGE FROM CONTROLLER --}}
                @if (session('message'))
                    <div class="alert alert-success mt-3">
                        {{ session('message') }}
                    </div>
                @endif

                {{-- Add new proj --}}
                <div class="text-end">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-dark text-end">
                        <i class="fa-regular fa-square-plus"></i>
                    </a>
                </div>

                {{-- TABLE --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Programs</th>
                            <th scope="col">Creation year</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->title }}</th>
                                <td>{{ $project->utilized_programs }}</td>
                                <td>{{ $project->creation_year }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('admin.projects.show', $project->slug) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form class="d-inline-block" action="">
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
