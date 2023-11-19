
</head>
<body>
    <div class="menu-tool w-100">
        <header class="">
            <div class="w-75 pt-2 d-flex justify-content-between align-items-center mx-auto">
                <div id="logo" class="">
                    <a href="./?controller=index"">
                        <img src="./view/img/logo.jpg" alt="Logo" class="logo-img">
                    </a>
                </div>
                <div id="icon-user btn-group">
                    <a href="#" id="icon-user1" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: white;">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><button class="dropdown-item" type="button">Đăng xuất</button></li>
                    </ul>
                </div>
                <a href="./?controller=login&action=logout" class="text-light">Đăng xuất</a>
            </div>
        </header>
        <div style="background-color: antiquewhite; width: 100%; height: 60px;">
            <nav class="d-flex justify-content-evenly">
                <div>
                    <a href="./?controller=viecQuanTrong&action=index">Việc quan trọng cần làm</a>
                </div>
                <div>
                    <a href="./?controller=viecQuanTrong&action=danhGia">Đánh giá hôm nay</a>
                </div>
                <div>
                    <a href="./?controller=mucTieuThang&action=index">Mục tiêu tháng</a>
                </div>
                <div>
                    <a href="./?controller=motThangNhinLai&action=index">Một tháng nhìn lại</a>
                </div>
                <div>
                    <a href="./?controller=dieuBietOn&action=index">Điều biết ơn mỗi ngày</a>
                </div>
                <div>
                    <a href="./?controller=camXuc&action=index">Biểu đồ cảm xúc của tôi</a>
                </div>
                <div>
                    <a href="./?controller=thoiQuen&action=index">Những thói quen tôi muốn có</a>
                </div>
            </nav>
        </div>
    </div>