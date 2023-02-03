@extends('backEnd.layouts.app')

@section('content')
    <div class="section-body">
        @php
            $roles       = \App\Models\Role::all()->count();
            $teachers    = \App\Models\User::where('role_id',2)->count();
            $stdnts      = \App\Models\User::where('role_id',3)->count();
            $departments = \App\Models\Department::all()->count();
            $batches     = \App\Models\Batch::all()->count();
            $courses     = \App\Models\Course::all()->count();
            $batches     = \App\Models\Batch::all()->count();
            $adviseds    = \App\Models\Advised::all()->count();
        @endphp

        @if (Auth::user()->role_id != 1)
            <div class="row justify content center">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-body" style="padding: 60px 25px;">
                            <p>Hey, <b>{{ Auth::user()->name }}</b></p>
                            <h1 style="color: cadetblue;">WELCOME TO AUB</h1>
                        </div>
                    </div>
                </div>
            </div>
        @else


        <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Role's</h5>
                                        <h1 class="mb-3 font-24 text-right col-green">{{ $roles }}</h1>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="{{ asset('backEnd/assets/img/banner/1.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Teacher's</h5>
                                        <h1 class="mb-3 font-24 text-right col-green">{{ $teachers }}</h1>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="{{ asset('backEnd/assets/img/banner/1.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Student's</h5>
                                        <h1 class="mb-3 font-24 text-right col-green">{{ $stdnts }}</h1>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="{{ asset('backEnd/assets/img/banner/1.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Department's</h5>
                                        <h1 class="mb-3 font-24 text-right col-green">{{ $departments }}</h1>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="{{ asset('backEnd/assets/img/banner/1.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Batche's</h5>
                                        <h1 class="mb-3 font-24 text-right col-green">{{ $batches }}</h1>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="{{ asset('backEnd/assets/img/banner/1.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Course's</h5>
                                        <h1 class="mb-3 font-24 text-right col-green">{{ $courses }}</h1>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="{{ asset('backEnd/assets/img/banner/1.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Advise's</h5>
                                        <h1 class="mb-3 font-24 text-right col-green">{{ $adviseds }}</h1>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="{{ asset('backEnd/assets/img/banner/1.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Recent Students</h4>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $user)
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

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
