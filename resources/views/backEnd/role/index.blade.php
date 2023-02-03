@extends('backEnd.layouts.app')

@section('title', 'Role Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Roles Lists</h4>
                        @if (Auth::user()->hasPermission('roles.create'))
                            <div class="card-header-action">
                                <a class="btn btn-primary" href="{{ route('roles.create') }}">
                                    <i class="fas fa-plus">&nbsp;</i> Create Role
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">#SL</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Permissions</th>
                                        <th class="text-center">Updated At</th>
                                        @if (Auth::user()->hasPermission('roles.edit') || Auth::user()->hasPermission('roles.destroy'))
                                        <th class="text-center">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $role->name }}</td>
                                            <td class="text-center">
                                                @if($role->permissions->count() > 0)
                                                <span class="badge badge-info">{{ $role->permissions->count() }}</span>
                                                @else
                                                <span class="badge badge-warning">No permission found &#128546;</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $role->updated_at->diffForHumans() }}</td>
                                            @if (Auth::user()->hasPermission('roles.edit') || Auth::user()->hasPermission('roles.destroy'))
                                            <td class="text-center">
                                                @if (Auth::user()->hasPermission('roles.edit'))
                                                    <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-success btn-sm" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                @endif

                                                @if($role->deletable == true && Auth::user()->hasPermission('roles.destroy'))
                                                <button type="button" onclick="deleteData({{ $role->id }})" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fa fa-trash-alt"></i>
                                                    <span>Delete</span>
                                                </button>

                                                <form id="delete-form-{{ $role->id }}" method="POST" action="{{ route('roles.destroy',$role->id) }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                @endif
                                            </td>
                                            @endif
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
