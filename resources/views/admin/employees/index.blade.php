@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Employees</h4>
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
        <h5 class="card-header">Employees List <a href="{{route('admin.employees.create')}}" class="btn btn-primary">Add Employee</a></h5>
        
        <div class="card-body">
            <div class="table-responsive text-nowrap" style="height: 400px;">
                <table class="table" id="example1">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                            <td>{{ $row->company_data->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td class="pt_10 pb_10">
                                <a href="{{ route('admin.employees.edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('admin.employees.delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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