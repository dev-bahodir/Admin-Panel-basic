@extends('layouts.admin')

@section('content')

    <h3>Add News</h3>

    <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Body</label>
            <textarea name="body" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Images (multiple)</label>
            <input type="file" name="images[]" multiple class="form-control">
        </div>

        <div class="mb-3">
            <label>Preview Image Index</label>
            <input type="number" name="preview" value="0" class="form-control">
        </div>

        <button class="btn btn-success">Save</button>
    </form>

@endsection
