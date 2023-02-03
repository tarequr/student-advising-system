@extends('backEnd.layouts.app')

@section('title', 'Course Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Course Lists</h4>
                            <div class="card-header-action">
                                <a class="btn btn-primary" href="{{ route('courses.create') }}">
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
                                        <th class="text-center">Course Title</th>
                                        <th class="text-center">Course Code</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Faculty Name</th>
                                        <th class="text-center">Credit</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $course->name }}</td>
                                            <td class="text-center">{{ $course->code }}</td>
                                            <td class="text-center">{{ $course->department->name }}</td>
                                            <td class="text-center">{{ @$course->user->name }}</td>
                                            <td class="text-center">{{ $course->credit}}</td>
                                            <td class="text-center">{{ $course->amount }}</td>
                                            <td class="text-center">
                                                @if($course->status == true)
                                                    <span class="badge badge-success" style="padding: 4px">Active</span>
                                                @else
                                                    <span class="badge badge-danger" style="padding: 4px">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('courses.edit',$course->id) }}" class="btn btn-success btn-sm" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <button type="button" onclick="deleteData({{ $course->id }})" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fa fa-trash-alt"></i>
                                                    <span>Delete</span>
                                                </button>

                                                <form id="delete-form-{{ $course->id }}" method="POST" action="{{ route('courses.destroy',$course->id) }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
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
