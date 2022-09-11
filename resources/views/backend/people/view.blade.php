@extends('layouts.backend_master')

@section('title', 'People')

@section('master_content')
    <div class="card pt-3">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <h3>View People</h3>
                <div>
                    <a href="{{ route('admin.people.index') }}" class="btn btn-success">Back</a>
                </div>
            </div>
            <hr>
            <br>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $people->name }}</td>
                </tr>
                <tr>
                    <th>Section</th>
                    <td>{{ $people->category->name }}</td>
                </tr>
                <tr>
                    <th>Seb-section</th>

                    <td>{{ $people->sub->name ?? "NULL" }}</td>

                </tr>
                <tr>
                    <th>Level Three:</th>

                    <td>{{ $people->level_three->name ?? "NULL" }}</td>

                </tr>
                
                <tr>
                    <th>Email</th>

                    <td>{{ $people->email }}</td>

                </tr>
                <th>Phone</th>

                  <td>{{ $people->phone }}</td>

                <tr>
                <tr>
                    <th>Designation</th>

                    <td>{{ $people->designation }}</td>
        
                <tr>
                    
                </tr>
                <tr>
                    
                </tr>
            </table>

        </div>
    </div>
@stop