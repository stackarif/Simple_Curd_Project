@extends('layouts.backend_master')

@section('title', 'People')

@section('master_content')
    <div class="card pt-3">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h3>Manage People</h3>
                <div>
                    <a href="{{ route('admin.people.create') }}" class="btn btn-success">Add New Product</a>
                </div>
            </div>
            <table class="table table-bordered" id="productTable">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Designation</th>
                    <th>Main section</th>
                    <th>Section</th>
                    <th>Sub-section</th>
                    <th class="text-center">Actions</th>
                </tr>
                <tbody>
                    @foreach ($peoples as $people)
                        <tr>
                            <td>{{ $people->id }}</td>
                            <td>{{ $people->name }}</td>
                            <td>{{ $people->email }}</td>
                            <td>{{ $people->phone }}</td>
                            <td>{{ $people->designation }}</td>
                            <td>{{ $people->category->name ?? "NULL"}} </td>
                            <td>{{ $people->sub->name ?? "NULL" }}</td>
                            <td>{{ $people->level_three->name ?? "NULL" }}</td>
                           
                            <td class="text-center">
                                <a href="{{ route('admin.people.view', $people->slug) }}"
                                    class="btn btn-sm btn-success">View</a>
                                <a href="{{ route('admin.people.edit', $people->slug) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('admin.people.delete', $people->slug) }}"
                                    class="btn btn-sm btn-danger">Delete</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   
@stop

@push('js')
    <script>
        $('#productTable').DataTable();
    </script>
@endpush