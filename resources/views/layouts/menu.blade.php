<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
    <a href="" class="nav-link {{ Request::is('users') ? 'active' : ''}}">
        <i class="nav-icon fas fa-users-cog"></i>
        <p>Users</p>
    </a>
    <a href="{{ route('inventory') }}" class="nav-link {{ Request::is('inventory') ? 'active' : ''}}">
        <i class="nav-icon fas fa-clipboard-list"></i>
        <p>Inventory</p>
    </a>
    <a href="" class="nav-link {{ Request::is('orders') ? 'active' : ''}}">
        <i class="nav-icon fas fa-clipboard-check"></i>
        <p>Orders</p>
    </a>
</li>
