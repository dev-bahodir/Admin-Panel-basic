@extends('layouts.admin')

@section('content')

    <h3 class="mb-3">Edit Menu</h3>

    <form method="POST" action="{{ route('admin.menu.update', $menu) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input name="title" value="{{ $menu->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Parent</label>
            <select name="parent_id" class="form-control">
                <option value="">None</option>
                @foreach($parents as $p)
                    <option value="{{ $p->id }}" @if($menu->parent_id == $p->id) selected @endif>
                        {{ $p->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Order</label>
            <input name="order" type="number" value="{{ $menu->order }}" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

@endsection
