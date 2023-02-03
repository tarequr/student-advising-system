@extends('backEnd.layouts.app')

@section('title', 'Batch | AUB')

@section('content')
    <div class="section-body">
        <div class="form-row">
            <div class="col-12">
                <div class="card card-primary rounded-0 shadow-sm">
                    <div class="card-body text-center">
                        <h4 class="mb-0">{{ @$batch? 'Edit' : 'Create' }} Batch</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header justify-content-between">
                        <a href="#" style="float: left"></a>
                        <a href="{{ route('batchs.index') }}" class="btn btn-danger btn-sm text-white"  style="float: right text-decoration: none;">
                            <i class="fa fa-arrow-circle-left"></i>
                            <span>Back to list</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($batch) ? route('batchs.update',$batch->id) : route('batchs.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            @isset($batch)
                                @method('PUT')
                            @endisset
                            <div class="form-row align-items-center">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body" style="padding: 10px;">
                                                <h5 class="card-title">Batch Info</h5>
                                                <div class="form-group">
                                                    <label for="name">Batch Number</label>
                                                    <input id="name" type="number" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $batch->name ?? old('name') }}" placeholder="Enter batch number" autofocus>

                                                    @error('name')
                                                        <p class="p-2">
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-11" style="margin-left: 10px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">
                                                    <i class="fa {{ @$batch? 'fa-arrow-circle-up' : 'fa-plus-circle' }}"></i>
                                                    <span>{{ @$batch? 'Update Batch' : 'Save Batch' }}</span>
                                                </button>
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

