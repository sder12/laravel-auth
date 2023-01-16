@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col col-8">

                {{-- TITLE --}}
                <div class="mb-3 pb-2 border-bottom border-warning  border-2">
                    <span class="d-block mb-2"> MODIFY: </span>
                    <h4> {{ $project->title }}</h4>
                </div>

                @include('partials.errors')

                <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input class="form-control  @error('title') is-invalid @enderror" id="title" type="text"
                            name="title" value="{{ $project->title }}">

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- IMAGE --}}
                    <div class="mb-3">
                        <label class="form-label" for="cover_img">Image</label>
                        <input class="form-control @error('cover_img') is-invalid @enderror" id="cover_img" type="file"
                            name="cover_img">

                        @error('cover_img')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- Preview dell'immagine esistente --}}
                        {{-- <div class="mt-3" style="max-height: 200px">
                            <img id="image_preview" src="{{ asset('storage/' . $post->cover_image) }}"
                                alt="{{ 'Cover image di ' . $post->title }}">
                        </div> --}}
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="3">{{ $project->description }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Programs --}}
                    {{-- <div class="mb-3">
                        <label class="form-label" for="utilized_programs">Utilized programs & technology</label>
                        <input class="form-control @error('utilized_programs') is-invalid @enderror" type="text"
                            id="utilized_programs" name="utilized_programs" value="{{ $project->utilized_programs }}">

                        @error('utilized_programs')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}

                    {{-- Year --}}
                    <div class="mb-3">
                        <label class="form-label" for="creation_year">Year of creation</label>
                        <input class="form-control  @error('creation_year') is-invalid @enderror" id="creation_year"
                            type="number" min="1990" max="2030" value="{{ $project->creation_year }}"
                            name="creation_year">

                        @error('creation_year')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- BTN --}}
                    <div class="mb-3 pt-2">
                        <button type="submit" class="btn btn-warning">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
