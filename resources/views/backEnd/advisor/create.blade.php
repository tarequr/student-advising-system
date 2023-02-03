@extends('backEnd.layouts.app')

@section('title', 'Advising Panel | AUB')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Student Advising</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row align-items-center">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('advised.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6" style="width: 100%">
                                            <div class="form-group" id="batch_data">
                                                <label for="student">Student</label>
                                                <select id="student" class="form-control select2 @error('student') is-invalid @enderror"
                                                    name="student" required autofocus>
                                                    <option value="">Select Student</option>
                                                    @foreach ($students as $student)
                                                        <option value="{{ $student->id }}"> {{ $student->user_id }} </option>
                                                    @endforeach
                                                </select>

                                                @error('student')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4" style="width: 100%">
                                            <div class="form-group">
                                                <label for="semister">Semester</label>
                                                <select id="semister" class="form-control @error('semister') is-invalid @enderror"
                                                    name="semister" required autofocus>
                                                    <option value="">Select Semister</option>
                                                    @foreach ($semesters as $semester)
                                                    <option value="{{ $semester->currentSemester }}">{{ $semester->currentSemester }}</option>
                                                    @endforeach

                                                </select>

                                                @error('semister')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="text-left">SL</th>
                                                <th class="text-left">Course Code</th>
                                                <th class="text-left">Course Title</th>
                                                <th class="text-left">Faculty</th>
                                                <th class="text-left">Credit</th>
                                                <th class="text-left">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="course_id[]"
                                                            value="{{ $course->id }},{{ $course->credit }},{{ $course->amount }}"
                                                            title="Single Select" />
                                                    </td>
                                                    <td class="text-left">{{ $loop->index + 1 }}</td>
                                                    <td class="text-left"> {{ $course->code }}</td>
                                                    <td class="text-left">{{ $course->name }}</td>
                                                    <td class="text-left">{{ $course->user->name }}</td>
                                                    <td class="text-left"> {{ $course->credit }} </td>
                                                    <td class="text-left"> {{ $course->amount }} </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-arrow-circle-up"></i>
                                            <span>Save </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
