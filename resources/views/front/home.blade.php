@extends('layouts.front')

@section('content')

    <h3 class="mb-4">Yangiliklar</h3>

    <div class="row">

        @foreach($news as $item)
            <div class="col-md-4 mb-3">
                <div class="card">

                    @if($item->previewImage)
                        <img src="{{ asset('storage/' . $item->previewImage->path) }}"
                             class="card-img-top" height="180" style="object-fit:cover;">
                    @endif

                    <div class="card-body">
                        <h5>{{ $item->title }}</h5>
                        <a href="{{ route('news.detail', $item) }}" class="btn btn-primary mt-2">Batafsil</a>
                    </div>

                </div>
            </div>
        @endforeach

    </div>

    <div class="mt-4">
        {{ $news->links() }}
    </div>

@endsection
