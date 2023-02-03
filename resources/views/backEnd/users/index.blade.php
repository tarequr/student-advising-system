@extends('backEnd.layouts.app')

@section('title', 'User Lists | AUB')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Users Lists</h4>
                        @if (Auth::user()->hasPermission('users.create'))
                            <div class="card-header-action">
                                <a class="btn btn-primary" href="{{ route('users.create') }}">
                                    <i class="fas fa-plus">&nbsp;</i> Create User
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
                                        <th class="text-center">E-mail</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Joined At</th>
                                        @if (Auth::user()->hasPermission('users.edit') || Auth::user()->hasPermission('users.destroy'))
                                        <th class="text-center">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="form-row">
                                                    <div class="col-sm">
                                                        <img  width="40" class="rounded-circle" src="{{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : config('app.placeholder').'160.png' }}" alt="User Avatar">
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="widget-heading">{{ $user->name }}</div>
                                                            <div class="widget-subheading opacity-7">
                                                                @if($user->role)
                                                                    <span class="badge badge-info" style="padding: 4px">{{ $user->role->name }}</span>
                                                                @else
                                                                    <span class="badge badge-warning" style="padding: 4px">No role found :(</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $user->email }}</td>
                                            <td class="text-center">
                                                @if($user->status == true)
                                                    <span class="badge badge-success" style="padding: 4px">Active</span>
                                                @else
                                                    <span class="badge badge-danger" style="padding: 4px">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $user->created_at->diffForHumans() }}</td>
                                            @if (Auth::user()->hasPermission('users.edit') || Auth::user()->hasPermission('users.destroy'))
                                            <td class="text-center">
                                                @if (Auth::user()->hasPermission('users.edit'))
                                                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-success btn-sm" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                @endif

                                                @if(($user->role_id != 1)  && Auth::user()->hasPermission('users.destroy'))
                                                <button type="button" onclick="deleteData({{ $user->id }})" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fa fa-trash-alt"></i>
                                                    <span>Delete</span>
                                                </button>

                                                <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('users.destroy',$user->id) }}" style="display: none;">
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
