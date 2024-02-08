<nav>
    <div class="sidebar-top">
        <h3 class="hide">PMS</h3>
    </div>
    <div class="search">
        <i class='bx bx-search'></i>
        <input type="text" class="hide" placeholder="Quick Search ...">
    </div>
    <div class="sidebar-links">
        <ul>
            <div class="active-tab"></div>
            <li class="tooltip-element" data-tooltip="0">
                <a href="#" class="active" data-active="0">
                    <div class="icon">
                        <i class='bx bx-tachometer'></i>
                        <i class='bx bxs-tachometer'></i>
                    </div>
                    <span class="link hide">Dashboard</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="1">
                <a href="{{ route('admin.products.index') }}" data-active="1">
                    <div class="icon">
                        <i class='bx bx-folder'></i>
                        <i class='bx bxs-folder'></i>
                    </div>
                    <span class="link hide">Products</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="2">
                <a href="{{ route('admin.categories.index') }}" data-active="2">
                    <div class="icon">
                        <i class='bx bx-message-square-detail'></i>
                        <i class='bx bxs-message-square-detail'></i>
                    </div>
                    <span class="link hide">Category</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="3">
                <a href="{{ route('admin.stocks.index') }}" data-active="3">
                    <div class="icon">
                        <i class='bx bx-bar-chart-square'></i>
                        <i class='bx bxs-bar-chart-square'></i>
                    </div>
                    <span class="link hide">Stocks</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-footer">
        <div class="admin-user tooltip-element" data-tooltip="1">
            <div class="admin-profile hide">
                <div class="admin-info">
                    <h3>Akshay</h3>
                </div>
            </div>

                <a class="admin-info" href="{{ route('logout') }}"><span>Logout  </span>  <i class='bx bx-log-out'></i></a>

        </div>
    </div>
</nav>
