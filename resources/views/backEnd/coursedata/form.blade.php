@extends('backEnd.layouts.app')

@section('title', 'Course Data | AUB')

@section('content')
    <div class="section-body">
        <div class="form-row">
            <div class="col-12">
                <div class="card card-primary rounded-0 shadow-sm">
                    <div class="card-body text-center">
                        <h4 class="mb-0">{{ @$department ? 'Edit' : 'Create' }} Department</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header justify-content-between">
                        <a href="#" style="float: left"></a>
                        <a href="{{ route('coursedata.index') }}" class="btn btn-danger btn-sm text-white"
                            style="float: right text-decoration: none;">
                            <i class="fa fa-arrow-circle-left"></i>
                            <span>Back to list</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($department) ? route('coursedata.update', $department->id) : route('coursedata.store') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf

                            @isset($department)
                                @method('PUT')
                            @endisset
                            <div class="form-row align-items-center">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body" style="padding: 10px;">
                                                <h5 class="card-title">Course Info</h5>
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Course">Course</label>
                                                            <select id="Course"
                                                                class="form-control select2 @error('course') is-invalid @enderror"
                                                                name="name" autofocus>
                                                                <option value=""></option>
                                                                @foreach ($courses as $course)
                                                                    <option value="{{ $course->id }}">
                                                                        {{ $course->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('course')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Course">Prequisite Course</label>
                                                            <select id="Course"
                                                                class="form-control select2 @error('course') is-invalid @enderror"
                                                                name="pre_name" autofocus>
                                                                <option value=""></option>
                                                                @foreach ($courses as $course)
                                                                    <option value="{{ $course->id }}">
                                                                        {{ $course->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('course')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>




                                                </div>
                                            </div>
                                            <div class="col-md-11" style="margin-left: 10px;">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary"
                                                        style="margin-top: 10px;">
                                                        <i
                                                            class="fa {{ @$department ? 'fa-arrow-circle-up' : 'fa-plus-circle' }}"></i>
                                                        <span>{{ @$department ? 'Update Course' : 'Save Course' }}</span>
                                                    </button>
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
