@extends('backEnd.layouts.app')

@section('title', 'Advisor Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>My result</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">Semister</th>
                                        <th class="text-center">Result</th>

                                    </tr>
                                </thead>
                                <tbody>

                                        <tr>
                                            <td class="text-center">{{ $myresult->semester }}</td>
                                            <td class="text-center">{{ $myresult->result}}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
