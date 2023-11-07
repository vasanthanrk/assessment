@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Create Employee</h4>
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
        <h5 class="card-header">Employee</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.employees.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12 col-md-4 order-1 appent_row">
                    <div class="row row_inputs">
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="mb-3">
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="mb-3">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="mb-3">
                                <label class="form-label">Company</label>
                                <select class="form-control" name="company">
                                    <option value="">Select Company</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}" {{$company->id == old('company')?'selected':''}}>{{$company->name}}</option>
                                    @endforeach
                                </select>
                                @error('company')
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
                                <a href="{{ route('admin.employees.index') }}" class="btn btn-warning">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection