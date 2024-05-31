@extends('layouts.admin')
@section('content')
    <h2>New Project</h2>
    <form class="my-4" method="POST" action="{{ route('admin.projects.store') }}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Title</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Client Name</label>
            <input type="text" class="form-control" id="client_name" name="client_name">
          </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea class="form-control" id="summary" rows="10" name="summary"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
