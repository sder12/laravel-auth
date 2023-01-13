@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h3 class="text-center">Projects</h3>

        <div class="row justify-content-center">
            <div class="col-8">


                {{-- MESSAGE FROM CONTROLLER --}}
                @if (session('message'))
                    <div class="alert alert-warning mt-3">
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
                            <th scope="col">Image</th>
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
                                    @if ($project->cover_img)
                                        <span>image</span>
                                    @else
                                        <span>NO-image</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('admin.projects.show', $project->slug) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    {{-- 1. CANCELLAZIONE IMMEDIATA --}}
                                    {{-- <form class="d-inline-block"
                                        action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form> --}}

                                    {{-- 2. CANCELLAZIONE CON BOOSTRAP MODAL IN OGNI ELEMENTO, SEMPLICE MA CODICE NON OTTIMALE --}}
                                    <!-- Button trigger modal -->
                                    {{-- <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-project-{{ $project->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Modal della conferma prima della cancellazione -->
                                    <div class="modal fade" id="delete-project-{{ $project->id }}" tabindex="-1"
                                        aria-labelledby="delete-label-{{ $project->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title fs-5" id="delete-label-{{ $project->id }}">
                                                        Are you sure you want to cancel {{ $project->title }}?</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No</button>
                                                    <form class="d-inline-block"
                                                        action="{{ route('admin.projects.destroy', $project->slug) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf

                                                        <button class="btn btn-danger">
                                                            Yes, cancel
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> --}}

                                    {{-- 3. CANCELLAZIONE OTTIMALE CON app.js e nuovo parials --}}
                                    <form class="d-inline-block"
                                        action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger delete-btn"
                                            data-project-title="{{ $project->title }}">
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
    {{-- 3. CANCELLAZIONE OTTIMALE --}}
    @include('partials.delete-modal')
@endsection
