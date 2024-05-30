@extends('layouts.admin')
@section('content')
    <h3>{{ $project->name }}</h3>
    <small class="my-1"><strong>Slug</strong>: {{ $project->slug }}</small>
    <div class="my-2"><strong>Made for</strong>: {{ $project->client_name }}</div>
    @if ($project->client_name)
        <p class="my-3"><strong>Summary of this project</strong>: {{ $project->summary }}</p>
    @endif
    <div class="d-flex flex-column">
        <small><strong>Created at</strong>: {{ $project->created_at }}</small>
        <small><strong>Last updated at</strong>: {{ $project->updated_at }}</small>
    </div>
@endsection
