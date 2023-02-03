@extends('backEnd.layouts.app')

@section('title', 'Course Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Previous Record</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">#SL</th>
                                        <th class="text-center">Student name</th>
                                        <th class="text-center">Student Id</th>
                                        <th class="text-center">Semester</th>
                                        <th class="text-center">Course Title</th>
                                        <th class="text-center">Course Code</th>
                                        {{-- <th class="text-center">Department</th>
                                        <th class="text-center">Faculty Name</th>
                                        <th class="text-center">Credit</th>
                                        <th class="text-center">Amount</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                    @foreach ($course->advisedCourses as $c)
                                    {{-- @dd($c->semister); --}}
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $course->user->name }}</td>
                                            <td class="text-center">{{ $course->user->user_id }}</td>
                                            <td class="text-center">{{ $c->semister }}</td>
                                            <td class="text-center">{{ $c->course->name }}</td>
                                            <td class="text-center">{{ $c->course->code }}</td>
                                            {{-- <td class="text-center">{{ $course->department->name }}</td> --}}
                                            {{-- <td class="text-center">{{ @$course->user->name }}</td> --}}
                                            {{-- <td class="text-center">{{ $course->credit}}</td> --}}
                                            {{-- <td class="text-center">{{ $course->amount }}</td> --}}


                                        </tr>
                                    @endforeach
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
