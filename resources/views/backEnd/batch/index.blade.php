@extends('backEnd.layouts.app')

@section('title', 'Batchs Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Batch Lists</h4>
                            <div class="card-header-action">
                                <a class="btn btn-primary" href="{{ route('batchs.create') }}">
                                    <i class="fas fa-plus">&nbsp;</i> Create Batch
                                </a>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">#SL</th>
                                        <th class="text-center">Batch Number</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($batchs as $batch)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $batch->name }}</td>
                                            <td class="text-center">{{ $batch->created_at->diffForHumans() }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('batchs.edit',$batch->id) }}" class="btn btn-success btn-sm" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <button type="button" onclick="deleteData({{ $batch->id }})" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fa fa-trash-alt"></i>
                                                    <span>Delete</span>
                                                </button>

                                                <form id="delete-form-{{ $batch->id }}" method="POST" action="{{ route('batchs.destroy',$batch->id) }}" style="display: none;">
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
