<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bold" href="#">eUniversity</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage === 'home') ? 'active fw-bold' : ''; ?>"  aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage === 'major') ? 'active fw-bold' : ''; ?>"  aria-current="page" href="{{ route('majors.index') }}">Major</a>
                </li>
            </ul>
            <form class="d-flex ms-auto" role="search">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
