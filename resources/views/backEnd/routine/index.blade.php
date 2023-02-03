@extends('backEnd.layouts.app')

@section('title', 'Routine Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Routine Lists</h4>
                        <div class="card-header-action">
                            <a class="btn btn-primary" href="{{ route('routines.create') }}">
                                <i class="fas fa-plus">&nbsp;</i> Create Routine
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">#SL</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Semester</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($routines as $routine)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $routine->department->name }}</td>
                                            <td class="text-center">{{ $routine->semester }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('routines.show',$routine->id) }}" class="btn btn-success btn-sm" title="Download">
                                                    <i class="fa fa-download"></i>
                                                    <span>Download</span>
                                                </a>
                                                <button type="button" onclick="deleteData({{ $routine->id }})" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fa fa-trash-alt"></i>
                                                    <span>Delete</span>
                                                </button>

                                                <form id="delete-form-{{ $routine->id }}" method="POST" action="{{ route('routines.destroy',$routine->id) }}" style="display: none;">
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
