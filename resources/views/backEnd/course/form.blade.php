@extends('backEnd.layouts.app')

@section('title', 'Course | AUB')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('content')
    <div class="section-body">
        <div class="form-row">
            <div class="col-12">
                <div class="card card-primary rounded-0 shadow-sm">
                    <div class="card-body text-center">
                        <h4 class="mb-0">{{ @$course? 'Edit' : 'Create' }} Course</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header justify-content-between">
                        <a href="#" style="float: left"></a>
                        <a href="{{ route('courses.index') }}" class="btn btn-danger btn-sm text-white"  style="float: right text-decoration: none;">
                            <i class="fa fa-arrow-circle-left"></i>
                            <span>Back to list</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($course) ? route('courses.update',$course->id) : route('courses.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            @isset($course)
                                @method('PUT')
                            @endisset
                            <div class="form-row align-items-center">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5 class="card-title">Course Info</h5>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Course Title</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $course->name ?? old('name') }}" placeholder="Enter title" autofocus>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="code">Course Code</label>
                                                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ $course->code ?? old('code') }}" placeholder="Enter code" autofocus>

                                                    @error('code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="department">Department</label>
                                                    <select id="department" class="form-control select2 @error('department') is-invalid @enderror" name="department" autofocus>
                                                        <option value=""></option>
                                                        @foreach($departments as $department)
                                                        <option value="{{ $department->id }}" {{ @$course->dept_id == $department->id ? 'selected' : ''}}>{{ $department->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('department')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="batch">Teacher</label>
                                                    <select id="batch" class="form-control select2 @error('teacher') is-invalid @enderror" name="teacher" autofocus>
                                                        <option value=""></option>
                                                        @foreach($teachers as $teacher)
                                                        <option value="{{ $teacher->id }}" {{ @$course->teacher_id == $teacher->id ? 'selected' : ''}}>{{ $teacher->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('teacher')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="credit">Course credit</label>
                                                    <select id="credit" class="form-control @error('credit') is-invalid @enderror" name="credit" autofocus>
                                                        <option value="">please select</option>
                                                        <option value="1.5" {{ @$course->credit == 1.5 ? 'selected' : ''}}>1.5</option>
                                                        <option value="3" {{ @$course->credit == 3 ? 'selected' : ''}}>3</option>
                                                    </select>

                                                    @error('credit')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="amount">Course amount</label>
                                                    <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ $course->amount ?? old('amount') }}" placeholder="Enter course amount" autofocus>

                                                    @error('code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch" style="padding: 0px;">
                                                        <input type="checkbox" class="custom-control-input" name="status" id="status" {{ @$course->status == true ? 'checked' : 'checked'}}>
                                                        <label class="custom-control-label" for="status" style="margin-left: 35px;">Status</label>
                                                    </div><br>

                                                    @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">
                                                        <i class="fa {{ @$course? 'fa-arrow-circle-up' : 'fa-plus-circle' }}"></i>
                                                        <span>{{ @$course? 'Update Course' : 'Save Course' }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
