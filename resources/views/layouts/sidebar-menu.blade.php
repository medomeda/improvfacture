<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview {{ setOpenMenu(['admin.roles*', 'admin.permissions*', 'admin.users*']) }}">
            <a href="#"
                class="nav-link {{ setActiveMenu(['admin.roles*', 'admin.permissions*', 'admin.users*']) }}">
                <i class="nav-icon fa fa-users"></i>
                <p>
                    Comptes
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ setActiveMenu(['admin.roles*']) }}">
                        <i class="fas fa-user-secret nav-icon"></i>
                        <p>Roles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.permissions.index') }}"
                        class="nav-link {{ setActiveMenu(['admin.permissions*']) }}">
                        <i class="fas fa-users-cog nav-icon"></i>
                        <p>Permissions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ setActiveMenu(['admin.users*']) }}">
                        <i class="fas fa-users nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview {{ setOpenMenu(['admin.products*']) }}">
            <a href="#"
                class="nav-link {{ setActiveMenu(['admin.products*']) }}">
                <i class="nav-icon fa fa-users"></i>
                <p>
                    IMPROVFACTURE
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ setActiveMenu(['admin.categories*']) }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="nav-link {{ setActiveMenu(['admin.products*']) }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Articles</p>
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="nav-item has-treeview {{ setOpenMenu(['admin.societes*']) }}">
            <a href="#"
                class="nav-link {{ setActiveMenu(['admin.societes*']) }}">
                <i class="nav-icon fa fa-cogs"></i>
                <p>
                    BRVM
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a class="nav-link {{ setActiveMenu(['admin.settings*']) }}"
                        href="{{ route('admin.settings.index') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ratios</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActiveMenu(['admin.societes*']) }}"
                        href="{{ route('admin.societes.index') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sociétés</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActiveMenu(['admin.reports*']) }}"
                        href="{{ route('admin.reports.index') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Rapports</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActiveMenu(['admin.audits*']) }}"
                        href="{{ route('admin.audits.index') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Audits</p>
                    </a>
                </li>
            </ul>
        </li>

        <li
            class="nav-item has-treeview {{ setOpenMenu(['admin.attachments*', 'admin.settings*', 'admin.audits*', 'admin.reports*']) }}">
            <a href="#"
                class="nav-link {{ setActiveMenu(['admin.attachments*', 'admin.settings*', 'admin.audits*', 'admin.reports*']) }}">
                <i class="nav-icon fa fa-cogs"></i>
                <p>
                    Administration
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a class="nav-link {{ setActiveMenu(['admin.settings*']) }}"
                        href="{{ route('admin.settings.index') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Paramètres</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActiveMenu(['admin.attachments*']) }}"
                        href="{{ route('admin.attachments.index') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fichiers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActiveMenu(['admin.reports*']) }}"
                        href="{{ route('admin.reports.index') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Rapports</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActiveMenu(['admin.audits*']) }}"
                        href="{{ route('admin.audits.index') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Audits</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>

</nav>
