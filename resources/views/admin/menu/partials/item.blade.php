<li>
    {{ $menu->title }}

    <a href="{{ route('admin.menu.edit', $menu) }}" class="ms-2">Edit</a>

    <form action="{{ route('admin.menu.destroy', $menu) }}"
          method="POST"
          style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger">Delete</button>
    </form>

    @if($menu->children->count())
        <ul class="ms-4">
            @foreach($menu->children as $child)
                @include('admin.menu.partials.item', ['menu' => $child])
            @endforeach
        </ul>
    @endif
</li>
