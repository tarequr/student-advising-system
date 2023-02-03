@extends('backEnd.layouts.app')

@section('title', 'Course Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>My Course Lists</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">Course Title</th>
                                        <th class="text-center">Course Code</th>
                                        <th class="text-center">Semester</th>
                                        <th class="text-center">Credit</th>
                                        <th class="text-center">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp

                                    @isset($advisedcourses)
                                        @foreach ($advisedcourses as $course)
                                            <tr>
                                                <td class="text-center">{{ $course->course->name }}</td>
                                                <td class="text-center">{{ $course->course->code }}</td>
                                                <td class="text-center">{{ $course->semister }}</td>
                                                <td class="text-center">{{ $course->credit }}</td>
                                                <td class="text-center">{{ $course->fee }}</td>
                                                @php
                                                    $i = $i + $course->fee;
                                                @endphp
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                            <h1>
                                Total Amount : @php  echo $i; @endphp
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
