<nav class="sidebar sidebar-light sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <img  style="height: 40px; margin-left: 25px" src="{{ asset('assets/images/atom-logo.png') }}" alt="">
    </div>

    <button class="header-toggler px-md-0 me-md-3 d-md-none d-flex justify-content-end" style="margin-right: 10px; margin-top: 10px; color: #b8b8b8;" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
        <i class="fa-solid fa-chevron-left"></i>
    </button>

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link nav-item-content" href="index.html">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </a>
        </li>

        <li class="nav-title">Hotel Management</li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle nav-item-content" href="#">
                <i class="fa-solid fa-user"></i>
                Users
            </a>

            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/accordion.html">
                        <i class="fa-solid fa-users"></i>
                        All Users
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/breadcrumb.html">
                        <i class="fa-solid fa-users-slash"></i>
                        Banned users
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/cards.html">
                        <i class="fa-solid fa-comment-dots"></i>
                        Room Chatlogs
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/cards.html">
                        <i class="fa-solid fa-comments"></i>
                        Private Chatlogs
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-group">
            <a class="nav-link nav-group-toggle nav-item-content" href="#">
                <i class="fa-solid fa-basket-shopping"></i>
                Catalog
            </a>

            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/accordion.html">
                        <i class="fa-solid fa-users"></i>
                        Catalog pages
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/breadcrumb.html">
                        <i class="fa-solid fa-users-slash"></i>
                        Catalog items (WIP)
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/cards.html">
                        <i class="fa-solid fa-comment-dots"></i>
                        Items base (WIP)
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-group">
            <a class="nav-link nav-group-toggle nav-item-content" href="#">
                <i class="fa-solid fa-terminal"></i>
                Emulator
            </a>

            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/accordion.html">
                        <i class="fa-solid fa-users"></i>
                        Settings
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/breadcrumb.html">
                        <i class="fa-solid fa-users-slash"></i>
                        Texts
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link nav-item-content" href="index.html">
                <i class="fa-solid fa-newspaper"></i>
                Articles
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link nav-item-content" href="index.html">
                <i class="fa-solid fa-road-barrier"></i>
                Permissions
            </a>
        </li>

        <li class="nav-title">Website Management</li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle nav-item-content" href="#">
                <i class="fa-solid fa-fingerprint"></i>
                Access
            </a>

            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/accordion.html">
                        <i class="fa-solid fa-users"></i>
                        IP Whitelist
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/breadcrumb.html">
                        <i class="fa-solid fa-users-slash"></i>
                        IP Blacklist
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-group">
            <a class="nav-link nav-group-toggle nav-item-content" href="#">
                <i class="fa-solid fa-book"></i>
                Rules
            </a>

            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/accordion.html">
                        <i class="fa-solid fa-users"></i>
                        Categories
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/breadcrumb.html">
                        <i class="fa-solid fa-users-slash"></i>
                        Rules
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-group">
            <a class="nav-link nav-group-toggle nav-item-content" href="#">
                <i class="fa-solid fa-clipboard-user"></i>
                Staff
            </a>

            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/accordion.html">
                        <i class="fa-solid fa-users"></i>
                        Open positions
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/breadcrumb.html">
                        <i class="fa-solid fa-users-slash"></i>
                        Applications
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/breadcrumb.html">
                        <i class="fa-solid fa-users-slash"></i>
                        Teams
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-group">
            <a class="nav-link nav-group-toggle nav-item-content" href="#">
                <i class="fa-solid fa-magnifying-glass-dollar"></i>
                Rare values
            </a>

            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/accordion.html">
                        <i class="fa-solid fa-users"></i>
                        Categories
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-item-content" href="base/breadcrumb.html">
                        <i class="fa-solid fa-users-slash"></i>
                        Values
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link nav-item-content" href="index.html">
                <i class="fa-solid fa-gear"></i>
                Settings
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link nav-item-content" href="index.html">
                <i class="fa-solid fa-unlock"></i>
                Permissions
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link nav-item-content" href="index.html">
                <i class="fa-solid fa-shield-halved"></i>
                Wordfilter
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link nav-item-content" href="index.html">
                <i class="fa-solid fa-life-ring"></i>
                Support tickets
            </a>
        </li>
    </ul>
</nav>
