@extends('backEnd.layouts.app')

@section('title', 'Role | AUB')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
@endsection


@section('content')
    <div class="section-body">
        <div class="form-row">
            <div class="col-12">
                <div class="card card-primary rounded-0 shadow-sm">
                    <div class="card-body text-center">
                        <h4 class="mb-0">{{ @$user? 'Edit' : 'Create' }} User</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header justify-content-between">
                        <a href="#" style="float: left"></a>
                        <a href="{{ route('users.index') }}" class="btn btn-danger btn-sm text-white"  style="float: right text-decoration: none;">
                            <i class="fa fa-arrow-circle-left"></i>
                            <span>Back to list</span>
                        </a>

                    </div>

                    <div class="card-body">
                        <form action="{{ isset($user) ? route('users.update',$user->id) : route('users.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            @isset($user)
                                @method('PUT')
                            @endisset
                            <div class="form-row align-items-center">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card-body" style="padding: 10px;">
                                                <h5 class="card-title">User Info</h5>
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?? old('name') }}" placeholder="Enter user name" autofocus>

                                                    @error('name')
                                                        <p class="p-2">
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        </p>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}" placeholder="Enter user email">

                                                    @error('email')
                                                        <p class="p-2">
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        </p>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter user password">

                                                    @error('password')
                                                        <p class="p-2">
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        </p>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="confirm_password">Confirm Password</label>
                                                    <input id="confirm_password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Re-Type password">

                                                    @error('password')
                                                        <p class="p-2">
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        </p>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" autofocus>
                                                        <option value="">Select Gender</option>
                                                        <option value="female" {{ @$user->gender == "female" ? 'selected' : ''}}>Female</option>
                                                        <option value="male" {{ @$user->gender == "male" ? 'selected' : ''}}>Male</option>
                                                        <option value="others" {{ @$user->gender == "others" ? 'selected' : ''}}>Other's</option>
                                                    </select>

                                                    @error('department')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="row" style="padding-left: 20px; padding-right: 20px;">
                                                    <div class="col-md-3" style="padding: 0px">
                                                        <div class="form-group">
                                                            <label for="gender">User Type</label><br>
                                                            <input type="radio" id="student" name="user_type" value="student" {{ (@$user->role_id == 3)? "checked" : "" }}> Student&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="radio" id="teacher" name="user_type" value="teacher" {{ (@$user->role_id == 2)? "checked" : "" }}> Teacher
                                                        </div>
                                                    </div>

                                                    <div class="col-md-9" style="padding: 0px; width: 100%" >
                                                        <div class="form-group" id="batch_data">
                                                            <label for="batch">Batch</label>
                                                            <select id="batch" class="form-control @error('batch') is-invalid @enderror" name="batch" autofocus>
                                                                <option value="">Select Batch</option>
                                                                @foreach($batchs as $batch)
                                                                <option value="{{ $batch->id }}" {{ @$user->batch_id == $batch->id ? 'selected' : ''}}>{{ $batch->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('batch')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>



                                        <div class="col-md-4">
                                            <div class="card-body" style="padding: 10px;">
                                                <h5 class="card-title">Select Roles and Status</h5>

                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select id="role" class="form-control select2 @error('role') is-invalid @enderror" name="role" autofocus>
                                                        <option value="">Select Role</option>
                                                        @foreach($roles as $role)
                                                        <option value="{{ $role->id }}" {{ @$user->role->id == $role->id ? 'selected' : ''}}>{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('role')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="department">Department</label>
                                                    <select id="department" class="form-control select2 @error('department') is-invalid @enderror" name="department" autofocus>
                                                        <option value="">Select Department</option>
                                                        @foreach($departments as $department)
                                                        <option value="{{ $department->id }}" {{ @$user->dept_id == $department->id ? 'selected' : ''}}>{{ $department->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('department')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="avatar">Avatar</label>
                                                    <input id="avatar" type="file" class="dropify form-control @error('avatar') is-invalid @enderror" name="avatar" data-default-file="{{ @$user ? $user->getFirstMediaUrl('avatar') : '' }}" data-height="190">

                                                    @error('avatar')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <div class="custom-control custom-switch" style="padding: 0px;">
                                                        <input type="checkbox" class="custom-control-input" name="status" id="status" {{ @$user->status == true ? 'checked' : ''}}>
                                                        <label class="custom-control-label" for="status" style="margin-left: 35px;">Status</label>
                                                    </div><br>

                                                    @error('status')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa {{ @$user? 'fa-arrow-circle-up' : 'fa-plus-circle' }}"></i>
                                                        <span>{{ @$user? 'Update User' : 'Save User' }}</span>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
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
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
    {{-- image --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        // $('.dropify').dropify();
        // $('.js-example-basic-single').select2();

        // $("#batch_data").hide();

        // $("#student").click(function(){
        //     $("#batch_data").show();
        // });

        // $("#teacher").click(function(){
        //     $("#batch_data").hide();
        // });

        $(document).ready(function () {
            $('.dropify').dropify();
            $('.js-example-basic-single').select2();

            // $("#batch_data").hide();

            if ($("#student").is(":checked")) {
                $('#batch_data').show();
            }
            else if ($("#teacher").is(":checked")) {
                $('#batch_data').hide();
            }

            $("#student, #teacher").change(function () {
                if ($("#student").is(":checked")) {
                    $('#batch_data').show();
                }
                else if ($("#teacher").is(":checked")) {
                    $('#batch_data').hide();
                }
            });
        });
    </script>
@endsection
