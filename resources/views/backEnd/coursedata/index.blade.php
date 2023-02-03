@extends('backEnd.layouts.app')

@section('title', 'Departments Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Course Lists</h4>
                        <div class="card-header-action">
                            <a class="btn btn-primary" href="{{ route('coursedata.create') }}">
                                <i class="fas fa-plus">&nbsp;</i> Create Course
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">#SL</th>
                                        <th class="text-center">Course Name</th>
                                        <th class="text-center"> Prequisite Course</th>
                                        <th class="text-center">Created At</th>
                                        {{-- <th class="text-center">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $department)
                                        @php
                                            $pre_name = App\Models\Course::where('id', $department->pre_name)->first()->name;
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $department->coursename->name }}</td>
                                            <td class="text-center">{{ $pre_name }}</td>
                                            <td class="text-center">{{ $department->created_at->diffForHumans() }}</td>
                                            {{-- <td class="text-center">
                                                <a href="{{ route('coursedata.edit', $department->id) }}"
                                                    class="btn btn-success btn-sm" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <button type="button" onclick="deleteData({{ $department->id }})"
                                                    class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fa fa-trash-alt"></i>
                                                    <span>Delete</span>
                                                </button>

                                                <form id="delete-form-{{ $department->id }}" method="POST"
                                                    action="{{ route('coursedata.destroy', $department->id) }}"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
