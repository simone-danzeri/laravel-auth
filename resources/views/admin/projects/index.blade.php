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
                        <div class="my-1">
                            <a class="btn btn-primary" href="{{ route('admin.projects.show', ['project' => $project->id]) }}">View</a>
                        </div>
                        <div class="my-1">
                            <a class="btn btn-warning" href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">Edit</a>
                        </div>
                        <div class="my-1">
                            <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
