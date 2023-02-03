@extends('backEnd.layouts.app')

@section('title', 'Advisor Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Advisor Lists</h4>
                            <div class="card-header-action">
                                <a class="btn btn-primary" href="{{ route('advised.create') }}">
                                    <i class="fas fa-plus">&nbsp;</i> Create Advisor
                                </a>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">#SL</th>
                                        <th class="text-center">Teacher</th>
                                        <th class="text-center">Student</th>
                                        <th class="text-center">Credit</th>
                                        <th class="text-center">Semister</th>
                                        <th class="text-center">Course</th>
                                        <th class="text-center">Fee</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($advisors as $advisor)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $advisor->teacher_id }}</td>
                                            <td class="text-center">{{ $advisor->student_id}}</td>
                                            <td class="text-center">{{ $advisor->credit }}</td>
                                            <td class="text-center">{{ $advisor->semister }}</td>
                                            <td class="text-center">{{ $advisor->course_id }}</td>
                                            <td class="text-center">{{ $advisor->fee }}</td>
                                            <td class="text-center"></td>
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
