@extends('admin.layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span>Companies</span>
                            <h3 class="card-title text-nowrap mb-1">5</h3>
                            <a href="{{route('admin.companies.index')}}" class="btn btn-sm btn-outline-primary">View Companies</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection