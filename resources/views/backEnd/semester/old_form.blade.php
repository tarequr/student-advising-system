@extends('backEnd.layouts.app')

@section('title', 'Semester | AUB')

@section('content')
    <div class="section-body">
        <div class="form-row">
            <div class="col-12">
                <div class="card card-primary rounded-0 shadow-sm">
                    <div class="card-body text-center">
                        <h4 class="mb-0">{{ @$semester? 'Edit' : 'Create' }} Semester</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header justify-content-between">
                        <a href="#" style="float: left"></a>
                        <a href="{{ route('semesters.index') }}" class="btn btn-danger btn-sm text-white"  style="float: right text-decoration: none;">
                            <i class="fa fa-arrow-circle-left"></i>
                            <span>Back to list</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($semester) ? route('semesters.update',$semester->id) : route('semesters.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            @isset($semester)
                                @method('PUT')
                            @endisset

                            <div class="form-row align-items-center">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body" style="padding: 10px;">
                                                <h5 class="card-title">Semester Info</h5>
                                                <div class="form-group">
                                                    <label for="batch">Semester</label>

                                                    <select id="batch" class="form-control @error('semester') is-invalid @enderror" name="semester" autofocus>
                                                        <option value="">Select Semester</option>
                                                        <option value="summer" {{ @$semester->currentSemester == "summer" ? 'selected' : '' }}>Summer</option>
                                                        <option value="spring" {{ @$semester->currentSemester == "spring" ? 'selected' : '' }}>Spring</option>
                                                        <option value="fall" {{ @$semester->currentSemester == "fall" ? 'selected' : '' }}>Fall</option>
                                                    </select>

                                                    @error('semester')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-11" style="margin-left: 10px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">
                                                    <i class="fa {{ @$semester? 'fa-arrow-circle-up' : 'fa-plus-circle' }}"></i>
                                                    <span>{{ @$semester? 'Update Semester' : 'Save Semester' }}</span>
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
