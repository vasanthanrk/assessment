@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Companies</h4>
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
        <h5 class="card-header">Companies List <a href="{{route('admin.companies.create')}}" class="btn btn-primary">Add Company</a></h5>
        
        <div class="card-body">
            <div class="table-responsive text-nowrap" style="height: 400px;">
                <table class="table" id="example1">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>website</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$row->logo) }}" alt="" width="75px">
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->website }}</td>
                            <td class="pt_10 pb_10">
                                <a href="{{ route('admin.companies.edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('admin.companies.delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection