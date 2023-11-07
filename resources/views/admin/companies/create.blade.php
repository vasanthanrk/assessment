@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Create Companies</h4>
    @if(!empty(session('success')))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(!empty(session('error')))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card">
        <h5 class="card-header">Companies</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.companies.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12 col-md-4 order-1 appent_row">
                    <div class="row row_inputs">
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="mb-3">
                                <label class="form-label">Name *</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="mb-3">
                                <label class="form-label">Website</label>
                                <input type="text" class="form-control" name="website" value="{{ old('website') }}">
                                @error('website')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="mb-3">
                                <label class="form-label source_lable">Photo (Max upload size 2MB, 100 X 100) *</label>
                                <input type="file" class="logo" name="logo"/>
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1 col-md-12 col-6 mb-4">
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end col-lg-2 col-md-12 col-6 mb-4">
                            <div class="mt-4">
                                <a href="{{ route('admin.companies.index') }}" class="btn btn-warning">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection