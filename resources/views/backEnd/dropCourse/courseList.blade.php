@extends('backEnd.layouts.app')

@section('title', 'Course Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4> Course Lists</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">Course Title</th>
                                        <th class="text-center">Course Code</th>
                                        <th class="text-center">Credit</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp

                                    @isset($advisedcourses)
                                        @foreach ($advisedcourses as $course)
                                        {{-- @dd($course); --}}
                                            <tr>
                                                <td class="text-center">{{ $course->course->name }}</td>
                                                <td class="text-center">{{ $course->course->code }}</td>
                                                <td class="text-center">{{ $course->credit }}</td>
                                                <td class="text-center">{{ $course->fee }}</td>
                                                <td class="text-center">
                                                    <button type="button" onclick="deleteData({{ $course->id }})" class="btn btn-danger btn-sm" title="Delete">
                                                        <i class="fa fa-trash-alt"></i>
                                                        <span>Delete</span>
                                                    </button>

                                                    <form id="delete-form-{{ $course->id }}" method="POST" action="{{ route('course-destroy',$course->id) }}" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
