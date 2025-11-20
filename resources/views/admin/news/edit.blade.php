@extends('layouts.admin')

@section('content')

    <h3>Edit News</h3>

    <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input name="title" class="form-control" value="{{ $news->title }}" required>
        </div>

        <div class="mb-3">
            <label>Body</label>
            <textarea name="body" class="form-control">{{ $news->body }}</textarea>
        </div>

        <hr>
        <h5>Existing Images</h5>

        @foreach($news->images as $img)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $img->path) }}" width="80">
                <label>
                    <input type="radio" name="preview" value="{{ $img->id }}"
                           @if($img->is_preview) checked @endif>
                    Preview
                </label>
            </div>
        @endforeach

        <hr>

        <div class="mb-3">
            <label>Add More Images</label>
            <input type="file" name="images[]" multiple class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

@endsection
