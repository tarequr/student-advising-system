@extends('backEnd.layouts.app')

@section('title', 'Role | AUB')

@section('content')
    <div class="section-body">
        <div class="form-row">
            <div class="col-12">
                <div class="card card-primary rounded-0 shadow-sm">
                    <div class="card-body text-center">
                        <h4 class="mb-0">{{ @$role? 'Edit Role' : 'Create Role' }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header justify-content-between">
                        <a href="#" style="float: left"></a>
                        <a href="{{ route('roles.index') }}" class="btn btn-danger btn-sm text-white"  style="float: right text-decoration: none;">
                            <i class="fa fa-arrow-circle-left"></i>
                            <span>Back to list</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($role) ? route('roles.update',$role->id) : route('roles.store') }}" method="post">
                            @csrf

                            @isset($role)
                                @method('PUT')
                            @endisset
                            <div class="form-row align-items-center">
                                <h5 class="card-title">Manage Roles</h5>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Role Name</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name ?? old('name') }}" placeholder="Enter role name"  autofocus>

                                        @error('name')
                                            <p class="p-2">
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            </p>
                                        @enderror
                                    </div><br>

                                    <div class="text-center mb-2">
                                        <strong>Manage permissions for role</strong>

                                        @error('permissions')
                                            <p class="p-2">
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="select-all">
                                            <label class="custom-control-label" for="select-all">Select All</label>
                                        </div>
                                    </div>

                                    @forelse($modules->chunk(2) as $key=>$chunks)
                                        <div class="form-row">
                                            @foreach($chunks as $key => $module)
                                                <div class="col">
                                                    <h5>Module: {{ $module->name }}</h5>

                                                    @foreach($module->permissions as $key => $permission)
                                                        <div class="mb-3 ml-4">
                                                            <div class="custom-control custom-checkbox mb-2">
                                                                <input type="checkbox" class="custom-control-input"  id="permission-{{ $permission->id }}"
                                                                name="permissions[]" value="{{ $permission->id }}"

                                                                @isset($role)
                                                                    @foreach($role->permissions as $rPermission)
                                                                        {{ $permission->id == $rPermission->id ? 'checked' : '' }}
                                                                    @endforeach
                                                                @endisset

                                                                >

                                                                <label for="permission-{{ $permission->id }}" class="custom-control-label">{{ $permission->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    @empty
                                        <div class="row">
                                            <div class="col text-center">
                                                <strong>No module found.</strong>
                                            </div>
                                        </div>
                                    @endforelse

                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa {{ @$role? 'fa-arrow-circle-up' : 'fa-plus-circle' }}"></i>
                                            <span>{{ @$role? 'Update Role' : 'Save Role' }}</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#select-all').click(function (event){

        if (this.checked) {
            $(':checkbox').each(function(){
                this.checked = true;
            });

        } else {
            $(':checkbox').each(function(){
                this.checked = false;
            });
        }
        });
    </script>
@endsection
