@extends('backEnd.layouts.app')

@section('title', 'Course Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Student Lists</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">#SL</th>
                                        <th class="text-center">Student Name</th>
                                        <th class="text-center">Student Id</th>
                                        <th class="text-center">Taken Course</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($advised_students as $advised_student)
                                    {{-- @dd($advised_student); --}}
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $advised_student->user->name }}</td>
                                            <td class="text-center">{{ $advised_student->user->user_id }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('course-list',$advised_student->student_id) }}" class="btn btn-primary m-1" target="_blank">
                                                    <i class="fas fa-file">&nbsp;</i>
                                                    Course list
                                                </a>
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
