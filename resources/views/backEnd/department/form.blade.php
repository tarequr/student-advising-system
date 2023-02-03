@extends('backEnd.layouts.app')

@section('title', 'Department | AUB')

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
                        <a href="{{ route('departments.index') }}" class="btn btn-danger btn-sm text-white"
                            style="float: right text-decoration: none;">
                            <i class="fa fa-arrow-circle-left"></i>
                            <span>Back to list</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($department) ? route('departments.update', $department->id) : route('departments.store') }}"
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
                                                <h5 class="card-title">Department Info</h5>
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ $department->name ?? old('name') }}"
                                                        placeholder="Enter department name" autofocus>

                                                    @error('name')
                                                        <p class="p-2">
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-11" style="margin-left: 10px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">
                                                    <i
                                                        class="fa {{ @$department ? 'fa-arrow-circle-up' : 'fa-plus-circle' }}"></i>
                                                    <span>{{ @$department ? 'Update Department' : 'Save Department' }}</span>
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
