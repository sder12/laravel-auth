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

                <form action="">

                    {{-- Title --}}
                    <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input class="form-control" id="title" type="text" name="title">
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>

                    {{-- Programs --}}
                    <div class="mb-3">
                        <label class="form-label" for="utilized_programs">Utilized programs & technology</label>
                        <input class="form-control" type="text" id="utilized_programs" name="utilized_programs">
                    </div>

                    {{-- Year --}}
                    <div class="mb-3">
                        <label class="form-label" for="creation_year">Year of creation</label>
                        <input class="form-control" id="creation_year" type="number" min="1990" max="2030"
                            value="2020" name="creation_year">
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
