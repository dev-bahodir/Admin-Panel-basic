@extends('layouts.front')

@section('content')

    <h2 class="mb-3">{{ $news->title }}</h2>

    @if($news->previewImage)
        <img src="{{ asset('storage/' . $news->previewImage->path) }}"
             class="mb-4" width="100%" style="max-height:300px; object-fit:cover;">
    @endif

    <p>{{ $news->body }}</p>

    <hr>

    <h4>Rasmlar</h4>

    <div class="row">
        @foreach($news->images as $img)
            <div class="col-md-3 mb-3">
                <img src="{{ asset('storage/' . $img->path) }}"
                     class="img-fluid" style="object-fit:cover; height:120px;">
            </div>
        @endforeach
    </div>

@endsection
