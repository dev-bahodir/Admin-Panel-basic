@extends('layouts.admin')

@section('content')

    <h3 class="mb-3">Menu List</h3>

    <a href="{{ route('admin.menu.create') }}" class="btn btn-primary mb-3">
        Add Menu
    </a>

    <ul>
        @foreach($menus as $menu)
            @include('admin.menu.partials.item', ['menu' => $menu])
        @endforeach
    </ul>

@endsection
