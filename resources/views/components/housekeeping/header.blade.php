<header class="header header-light header-sticky mb-4" style="background-color: #125b98">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3 d-md-none" type="button"
                onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <i class="fa-solid fa-bars"></i>
        </button>

        <a class="header-brand d-md-none text-white" href="#">
            <img src="{{ asset('assets/images/atom-logo.png') }}" alt="">
        </a>

        <form class="d-none d-md-flex" role="search">
            <input class="form-control bg-light border-0" type="text" placeholder="Search for a user..."
                   aria-label="Search" aria-describedby="search-addon">
        </form>

        <div class="d-none d-md-flex">
            <button class="btn btn-danger text-white">
                <i class="fa-solid fa-right-from-bracket"></i>
            </button>
        </div>

    </div>
</header>
