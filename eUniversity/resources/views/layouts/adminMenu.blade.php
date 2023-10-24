<div class="head d-flex align-items-center" style="height:5rem;">
    <nav class="ps-3 navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand fw-light" href="#">Artwork</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentPage === 'home') ? 'active fw-bold' : ''; ?>" id="home" aria-current="page" href={{ route("home") }}>Home</a>
                    </li>
                    <li class="nav-item">
                    </li>
                    <li class="nav-item"></li>
                    <a class="nav-link <?php echo ($currentPage === 'artist') ? 'active fw-bold' : ''; ?>" id="artist" href={{ route("artworks.index") }}>Artist</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <button type="button" class="btn btn-warning text-blue ms-auto me-5" data-bs-toggle="modal" data-bs-target="#modalLogout">Log Out</button>
    <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="Modal-Logout" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Đăng xuất ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form action="../progress/login/logout.php" name="logoutForm" method="post">
                        <button type="submit" name="logout" class="btn btn-primary">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>