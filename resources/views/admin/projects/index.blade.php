@extends('layouts.admin')
@section('content')
    <h1 class="mb-4">Projects List</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Name</th>
                <th>Slug</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->created_at }}</td>
                    {{-- qui tutte le actions --}}
                    <td>
                        <div>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">View</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
