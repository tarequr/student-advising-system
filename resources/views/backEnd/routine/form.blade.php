@extends('backEnd.layouts.app')

@section('title', 'Routine | AUB')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-6 col-md-6 col-lg-6">
        <div class="card">
            <form method="post" action="{{ route('routines.store') }}" class="needs-validation" enctype="multipart/form-data">
                @csrf

                <div class="card-header">
                  <h4 class="mb-0">Create Routine</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-12 col-12">
                            <label for="department">Department</label>
                            <select id="department" class="form-control select2 @error('department') is-invalid @enderror" name="department" autofocus>
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>

                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12 col-12">
                            <label for="semester">Semester</label>
                            <select id="semester" class="form-control @error('semester') is-invalid @enderror" name="semester" required autofocus>
                                <option value="">Select Semister</option>
                                @foreach ($semesters as $semester)
                                <option value="{{ $semester->currentSemester }}">{{ $semester->currentSemester }}</option>
                                @endforeach
                            </select>

                            @error('semester')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12 col-12">
                            <label for="routine">Routine</label>
                            <input id="routine" type="file" class="dropify form-control @error('routine') is-invalid @enderror" name="routine" data-height="190">

                            @error('routine')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="card-footer text-left">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i>
                    <span>Save Routine</span>
                </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

    <script>
        $('.dropify').dropify();
    </script>
@endsection
