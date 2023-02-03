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
                        <h4>Student Result</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row align-items-center">
                            <div class="table-responsive">
                                @if (Auth::user()->hasPermission('result.store'))

                                <form method="POST" action="{{ route('result.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6" style="width: 100%">
                                            <div class="form-group" id="batch_data">
                                                <label for="student">Student</label>
                                                <select id="student"
                                                    class="form-control select2 @error('student') is-invalid @enderror"
                                                    name="student" required autofocus>
                                                    <option value="">Select Student</option>
                                                    @foreach ($students as $student)
                                                        <option value="{{ $student->user_id }}"> {{ $student->user_id }}
                                                        </option>
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
                                                <select id="semister"
                                                    class="form-control @error('semister') is-invalid @enderror"
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

                                        <div class="form-group">
                                            <label for="result">Result</label>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="result"
                                                placeholder="Enter Result" autofocus>

                                            @error('result')
                                                <p class="p-2">
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                </p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-arrow-circle-up"></i>
                                            <span>Save </span>
                                        </button>
                                    </div>
                                </form>
                                  @endif
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-left">SL</th>
                                            <th class="text-left">Student Id</th>
                                            <th class="text-left">Semester</th>
                                            <th class="text-left">Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td class="text-left">{{ $loop->index + 1 }}</td>
                                                <td class="text-left"> {{ $course->student_id }}</td>
                                                <td class="text-left">{{ $course->semester }}</td>
                                                <td class="text-left"> {{ $course->result }} </td>

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
    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
