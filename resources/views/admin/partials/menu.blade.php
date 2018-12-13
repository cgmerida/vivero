<li class="nav-item">
    <a class='sidebar-link' href="{{ route('admin.dash') }}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>

@can('users.index')
<li class="nav-item">
    <a class='sidebar-link' href="{{ route('users.index') }}">
        <span class="icon-holder">
            <i class="c-red-500 ti-user"></i>
        </span>
        <span class="title">Usuarios</span>
    </a>
</li>
@endcan

@can('roles.index')
<li class="nav-item">
    <a class='sidebar-link' href="{{ route('roles.index') }}">
        <span class="icon-holder">
            <i class="c-yellow-800 ti-panel"></i>
        </span>
        <span class="title">Roles</span>
    </a>
</li>
@endcan

@can('plants.index')
<li class="nav-item">
    <a class='sidebar-link' href="{{ route('plants.index') }}">
        <span class="icon-holder">
            <i clas s="c-green-500 fa fa-envira"></i>
        </span>
        <span class="title">Plantas</span>
    </a>
</li>
@endcan