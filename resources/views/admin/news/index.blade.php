@extends('layouts.admin')

@section('content')

    <h3>News List</h3>

    <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">Add News</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Preview</th>
            <th>Actions</th>
        </tr>

        @foreach($news as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    @if($item->previewImage)
                        <img src="{{ asset('storage/' . $item->previewImage->path) }}" width="60">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.news.destroy', $item) }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

@endsection
