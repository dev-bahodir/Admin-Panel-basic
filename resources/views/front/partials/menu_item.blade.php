<li class="nav-item dropdown">

    @if($menu->children->count())
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            {{ $menu->title }}
        </a>

        <ul class="dropdown-menu">
            @foreach($menu->children as $child)
                @include('front.partials.menu_item', ['menu' => $child])
            @endforeach
        </ul>

    @else
        <a class="nav-link" href="#">{{ $menu->title }}</a>
    @endif

</li>
