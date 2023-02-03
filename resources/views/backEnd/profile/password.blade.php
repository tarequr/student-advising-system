@extends('backEnd.layouts.app')

@section('title', 'Password')

@section('content')
<div class="row justify-content-center">
    <div class="col-8 col-md-8 col-lg-8">
        <div class="card">
            <form method="post" action="{{ route('password_update') }}" class="needs-validation" enctype="multipart/form-data">
                @csrf

                <div class="card-header">
                  <h4>Edit Password</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label for="current_password">Current Password <span class="text-danger">*</span></label>
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="Enter your current password">

                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your new password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-12">
                            <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                            <input id="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Re-Type password">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-left">
                  <button class="btn btn-primary">Update password</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

