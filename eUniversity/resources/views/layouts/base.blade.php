<header class="head">
    <div class="container bg-white d-flex justify-content-between align-items-center">
        <div class="logo-head d-flex align-items-center">
            <a href="#"><img src={{ asset('img/logo-removebg-preview.png') }} style="width:10em;height:6rem;"></a>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-black <?php echo ($currentPage === 'index') ? 'active fw-bold' : ''; ?>" aria-current="page" href="<?=DOMAIN.'/public/index.php'?>">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black <?php echo ($currentPage === 'login') ? 'active fw-bold' : ''; ?>">Đăng nhập</a>
                </li>
            </ul>
        </div>
        <form action="" method="get" class="form-group row">
            <div class="col-auto"><input type="text" class="form-control " placeholder="Nội dung tìm kiếm"></div>
            <div class="col-auto"><button class="btn btn-success">Tìm kiếm</button></div>
        </form>
    </div>
</header>