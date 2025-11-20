@extends('layouts.admin')

@section('content')

    <h3 class="mb-3">Add Menu</h3>

    <form method="POST" action="{{ route('admin.menu.store') }}">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Parent</label>
            <select name="parent_id" class="form-control">
                <option value="">None</option>
                @foreach($parents as $p)
                    <option value="{{ $p->id }}">{{ $p->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Order</label>
            <input name="order" type="number" value="0" class="form-control">
        </div>

        <button class="btn btn-success">Save</button>
    </form>

@endsection
