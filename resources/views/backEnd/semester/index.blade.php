@extends('backEnd.layouts.app')

@section('title', 'Semester Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Current Semester</h4>
                            <div class="card-header-action">
                                <a class="btn btn-primary" href="{{ route('semesters.create') }}">
                                    <i class="fas fa-plus">&nbsp;</i> Create Semester
                                </a>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">#SL</th>
                                        <th class="text-center">Department Name</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semesters as $semester)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ ucwords($semester->currentSemester) }}</td>
                                            <td class="text-center">{{ $semester->created_at->diffForHumans() }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('semesters.edit',$semester->id) }}" class="btn btn-success btn-sm" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <button type="button" onclick="deleteData({{ $semester->id }})" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fa fa-trash-alt"></i>
                                                    <span>Delete</span>
                                                </button>

                                                <form id="delete-form-{{ $semester->id }}" method="POST" action="{{ route('semesters.destroy',$semester->id) }}"
                                                    style="display: none;">
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
