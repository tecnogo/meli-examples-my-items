<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('activas') ? 'active' : '' }}" href="{{ url('activas') }}">
            Activas ({{ $active_count }})
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('pausadas') ? 'active' : '' }}" href="{{ url('pausadas') }}">
            Pausadas ({{ $paused_count }})
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('todas') ? 'active' : '' }}" href="{{ url('todas') }}">
            Todas ({{ $all_count }})
        </a>
    </li>
</ul>
